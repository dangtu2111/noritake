<?php

namespace App\Http\Controllers\Fontend;

use App\Classes\Momo;
use App\Classes\Vnpay;
use App\Classes\Paypal;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\UserVoucher;
use App\Models\Promotion;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;
use App\Repositories\OrderRepository;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Controllers\FontendController;

use App\Repositories\ProductRepository;

class OrderController extends FontendController
{
    protected $momo;
    protected $vnpay;
    protected $paypal;
    protected $cartService;
    protected $orderService;
    protected $orderRepository;
    protected $productRepository;

    public function __construct(
        Momo $momo,
        Vnpay $vnpay,
        Paypal $paypal,
        CartService $cartService,
        OrderService $orderService,
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
    ) {
        $this->momo = $momo;
        $this->vnpay = $vnpay;
        $this->paypal = $paypal;
        $this->cartService = $cartService;
        $this->orderService = $orderService;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    public function view_order(Request $request)
    { {
        $attributesByOderItem = $this->orderService->findAttributesByCode();
            $order_all = $this->orderService->paginateOrderFontend($request);
            $order_pending = $this->orderService->paginateOrderPending($request);
            $order_confirmed = $this->orderService->paginateOrderConfirmed($request);
            $order_shipping = $this->orderService->paginateOrderShipping($request);
            $order_canceled = $this->orderService->paginateOrderCanceled($request);
            $order_completed = $this->orderService->paginateOrderCompleted($request);
            return view('fontend.account.view_order', compact(
                'order_all',
                'order_pending',
                'order_confirmed',
                'order_shipping',
                'order_canceled',
                'order_completed',
                'attributesByOderItem',
            ));
        }
    }

    public function selectmethod(Request $request){
  
        $validatedData = $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:15',
            'province_id'   => 'required|integer',
            'district_id'   => 'required|integer',
            'ward_id'       => 'required|string',
            'province_name' => 'required|string|max:255',
            'district_name' => 'required|string|max:255',
            'ward_name'     => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'total_amount'  => 'required|numeric|min:0'
        ]);
        $validatedData['note'] = session('note', '');
        
        session()->put('order_data', $validatedData);
        session()->forget('note');
        return view('frontend.order.paymentmethod');
    }
    public function checkout(Request $request)
    {
        $title='Checkout';
        $carts = $this->cartService->all();
        
        $cart_id = $carts  ? $carts->id : null;
        $order = $this->cartService->getOrderByCartId($cart_id);
        $arrayIdChecked = session('array_id', []);
        
        $attributesByCartItem = $this->cartService->findAttributesByCode();
        $promotions = session('promotions', []); // Danh sách mã khuyến mãi

        foreach ($promotions as $promotion) {
            $promotionCode = $promotion['code']; // Lấy code từ session
            $userId = auth()->id(); // Lấy ID người dùng hiện tại
    
            // Lấy promotion_id từ bảng Promotion
            $promotionId = Promotion::where('code', $promotionCode)->value('id');
    
            if ($promotionId) {
                // Gọi hàm updateIsUsed để cập nhật trạng thái mã khuyến mãi
                $this->updateIsUsed($promotionId, $userId);
            }
        }
        $user = auth()->user();
        // Truyền dữ liệu vào view
        return view('frontend.order.checkout', compact(
            'order',
            'attributesByCartItem',
            'user',
            'title'
        ));
    }
    public function updateIsUsed($promotionId, $userId)
    {
        // Tìm UserVoucher và cập nhật isUsed thành 0
        $updated = UserVoucher::where('promotion_id', $promotionId)
            ->where('user_id', $userId)
            ->update(['isUsed' => 0]);
    }

    public function store(StoreOrderRequest $request)
    {
        
        $order = $this->orderService->create($request);
        if ($order['payment_method'] !== 'cod') {
            $response = $this->paymentMethod($order);
            if ($response) {
                if ($response['resultCode'] == 0) {
                    return redirect()->away($response['url']);
                }
                $this->orderService->updateQuantitySoldProduct($order);
                $this->cartService->destroyCartItem($request);
               
                flash()->success('Đặt hàng thành công');
                return redirect()->route('order.success');
            }
            flash()->error('Thất bại. Đã có lỗi xảy ra vui lòng thử lại!');
            return redirect()->back();
        } else {
            $this->orderService->updateQuantitySoldProduct($order);
            $this->orderService->sendMail($order);
            // xóa cart sao khi thanh toán hành tất 
            $this->cartService->destroyCartItem($request);
            //update số lượng và đã bán
            flash()->success('Đặt hàng thành công');
            return view('frontend.order.success',compact('order'));
        }
    }

    public function paymentMethod($order = null)
    {
        $reponse = null;
        switch ($order->payment_method) {
            case 'vnpay':
                $response = $this->vnpay->payment($order);
                break;
            case 'momo':
                $response = $this->momo->payment($order);
                break;
            case 'paypal':
                $response = $this->paypal->payment($order);
                break;
        }
        return $response;
    }
    public function success()
    {
        $order = $this->orderRepository->findOrderFirst(
            [
                ['customer_id', '=', Auth::id()]
            ],
            [],
            [
                ['created_at', 'desc']
            ]
        );
        // $order = Order::where('customer_id', Auth::id())
        //     ->orderBy('created_at', 'desc')->first(['code']);
        return view('fontend.order.success', compact('order'));
    }
    public function failed()
    {
        $order = $this->orderRepository->findOrderFirst(
            [
                ['customer_id', '=', Auth::id()]
            ],
            [],
            [
                ['created_at', 'desc']
            ]
        );
        return view('fontend.order.failed', compact('order'));
    }

    public function detail($id)
    {
        $order = $this->orderRepository->findById($id);
        $attributesByOderItem = $this->orderService->findAttributesByCode();
        return view('fontend.account.order_detail', compact(
            'order',
            'attributesByOderItem',
        ));
    }
}
