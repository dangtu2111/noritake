<?php
namespace App\Http\Controllers\Ajax;

use App\Models\Cart;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\UserVoucher;
use App\Services\CartService;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use App\Models\PromotionProductVariant;
use App\Http\Controllers\FontendController;
use App\Repositories\WishlistRepository;
use Illuminate\Support\Facades\Auth;

class CartController extends FontendController
{
    protected $cartService;
    protected $wishlistRepository;
    protected $cartRepository;
    protected $productRepository;

    public function __construct(
        CartService $cartService,
        CartRepository $cartRepository,
        WishlistRepository $wishlistRepository,
        ProductRepository $productRepository,
    ) {
        $this->cartService = $cartService;
        $this->cartRepository = $cartRepository;
        $this->wishlistRepository = $wishlistRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        // Đặt lại total_discount nếu không có mã khuyến mãi
        if (!session()->has('promotions') || empty(session('promotions'))) {
            session()->put('total_discount', 0);
            session()->forget('shipping_fee');
        }
        $carts = $this->cartService->all();
        $userPromotion = Promotion::first();
        $attributesByCartItem = $this->cartService->findAttributesByCode();
        $productNews = $this->productRepository->getLimit(
            ['productVariant', 'productCatalogues', 'productVariant.attributes'],
            [
                ['publish', '=', 1],
                ['created_at', 'DESC']
            ],
            4
        );
        $countCart = $this->cartService->countProductIncart();


        return view('frontend.cart.index', compact(

            'carts',
            'countCart',
            'productNews',
            'userPromotion',
            'attributesByCartItem'
        ));
    }
    public function submitNote(Request $request)
    {
        // Kiểm tra nếu trường 'note' tồn tại trong request
        if ($request->has('note')) {
            // Lưu giá trị 'note' vào session
            $request->session()->put('note', $request->note);
        }
        
        // Redirect đến route 'order.checkout' sau khi lưu vào session
        return redirect()->route('order.checkout');
    }


    public function checkStock(Request $request)
    {
        $productId = $request->input('id');
      
        $stockInfo = $this->productRepository->checkStock($productId);
        
        if (!$stockInfo) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $stockInfo,
        ]);
    }

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'code' => 11,
                'message' => 'Vui lòng đăng nhập trước khi sử dụng chức năng.',
                'redirect' => route('auth.login'),
            ], 401);
        }
        try {
            // dd($request->all());
            $carts = $this->cartService->create($request);
            $cart = $this->cartService->all();

            
            return response()->json([
                'code' => 10,
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
                'carts' => $carts,
                'cartItem' => $cart->cartItems,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 11,
                'message' => 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.',
            ], 500);
        }
    }
    public function sessionOrderByCartId(Request $request)
    {
        $arrayIdChecked = $request->input('array_id', []);
        if (!is_array($arrayIdChecked)) {
            $arrayIdChecked = array_filter([$arrayIdChecked]); //xóa value rống
        }
        // luu lại sesion id
        session(['array_id' => $arrayIdChecked]);
        return response()->json([
            'code' => 10,
            'data' => $arrayIdChecked
        ]);
    }
    
    public function getOrderByCartId()
    {
        $arrayId = session('array_id', []);
        $cart = $this->cartService->all();
        return response()->json(data: [
            'code' => 10,
            'array_id' => $arrayId,
            'cartItem' => $cart->cartItems,
        ]);
    }
    public function clearSessionId(Request $request)
    {
        $arrayId = session()->forget('array_id');
        return response()->json([
            'code' => 10,
            'array_id' => $arrayId,
            
        ]);
    }

    public function updateCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'code' => 11,
                'message' => 'Vui lòng đăng nhập trước khi sử dụng chức năng.',
                'redirect' => route('auth.login'),
            ], 401);
        }
        try {
            $updated = $this->cartService->update($request);
            if ($updated) {
                return response()->json([
                    'code' => 10,
                ]);
            } else {
                return response()->json([
                    'code' => 11,
                    'message' => 'Không thể cập nhật giỏ hàng.',
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 11,
                'message' => 'Có lỗi xảy ra khi cập nhật giỏ hàng.',
            ], 500);
        }
    }

    public function destroyCart(Request $request)
    {
        if (!Auth::check()) {
            flash()->error('Bạn cần đăng nhập để sử dụng chức năng.');
            return redirect()->route('auth.login');
        }

        

        try {
            $destroy = $this->cartService->destroy($request);

            if ($destroy) {
                return response()->json([
                    'code' => 10,
                    'message' => 'Sản phẩm đã được xóa.',
                ]);
            } else {
                return response()->json([
                    'code' => 11,
                    'message' => 'Có lỗi xảy ra!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 11,
                'message' => 'Có lỗi xảy ra!',
            ]);
        }
    }

    public function clearCart(Request $request)
    {
        if (!Auth::check()) {
            flash()->error('Bạn cần đăng nhập để sử dụng chức năng.');
            return redirect()->route('auth.login');
        }

        try {
            $clear = $this->cartService->clear($request);
            if ($clear) {
                return response()->json([
                    'code' => 10,
                    'message' => 'Giỏ hàng đã được xóa',
                    'redirect' => 'back'
                ]);
            } else {
                return response()->json([
                    'code' => 11,
                    'message' => 'Có lỗi xảy ra!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 11,
                'message' => 'Có lỗi xảy ra!'
            ]);
        }
    }
    public function LoadOrderByCartId(Request $request)
    {
        if (!Auth::check()) {
            flash()->error('Bạn cần đăng nhập để sử dụng chức năng.');
            return redirect()->route('auth.login');
        }

        try {
            $order = $this->cartService->getOrderByCartId($request);
            $attributesByCartItem = $this->cartService->findAttributesByCode();
            if ($order) {
                $html = view('fontend.cart.partial.order_cart', [
                    'order' => $order,
                    'attributesByCartItem' => $attributesByCartItem,
                ])->render(); // gửi qua ajax render ra blade k reload  
                return response()->json([
                    'code' => 10,
                    'order' => $order,
                    'html' => $html,
                ]);
            } else {
                return response()->json([
                    'code' => 11,
                    'message' => 'Có lỗi xảy ra!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 11,
                'message' => 'Có lỗi xảy ra!'
            ]);
        }
    }
    






    public function applyPromotion(Request $request)
    {
        $promotionCode = $request->input('promotion_code');
        $promotions = session()->get('promotions', []);

       
        $userPromotion = Promotion::where('code', $promotionCode)->first();

        if (!$userPromotion) {
            flash()->error('Mã không tồn tại!');
            return redirect()->back()->with('error', '');
        }
    
        $userVoucher = UserVoucher::where('promotion_id', $userPromotion->id)
            ->where('user_id', Auth::id())
            ->first();
    
        if ($userVoucher && $userVoucher->isUsed == 0) {
            flash()->error('Mã khuyến mãi này đã được sử dụng.');
            return redirect()->back()->with('error', 'Mã khuyến mãi này đã được sử dụng.');
        }
        //

        if (in_array($promotionCode, array_column($promotions, 'code'))) {
            flash()->error('Mã khuyến mãi này đã được áp dụng trước đó.');
            return redirect()->back();
        }

        if (count($promotions) >= 2) {
            flash()->error('Không thể áp dụng quá 2 mã khuyến mãi.');
            return redirect()->back();
        }

        $userPromotion = Promotion::where('code', $promotionCode)->first();
        if (!$userPromotion) {
            flash()->error('Mã không tồn tại!');
            return redirect()->back()->with('error', '');
        }

        $cart = Cart::where('user_id', Auth::id())->first();
        if (!$cart) {
            flash()->error('không tìm thấy giỏ hàng của bạn');
            return redirect()->back();
        }

        $cartTotal = $cart->cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        if ($cartTotal < $userPromotion->minimum_amount) {
            flash()->error('Tổng đơn hàng không đủ để áp dụng mã khuyến mãi này.');
            return redirect()->back();
        }

        // Lưu original_price nếu chưa có trước khi áp dụng giảm giá
        // foreach ($cart->cartItems as $item) {
        //     if (is_null($item->original_price)) {
        //         $item->original_price = $item->price;
        //         $item->save();
        //     }
        // }

        $totalDiscount = session()->get('total_discount', 0);
        $canApplyPromotion = false;
        // New condition: Prevent applying same type if already applied
        if (in_array($userPromotion->apply_for, array_column($promotions, 'apply_for'))) {
            flash()->error('Không thể áp dụng nhiều mã giảm giá cùng loại.');

            return redirect()->back();
        }

        if ($userPromotion->apply_for === 'specific_products') {
            if (in_array('all', array_column($promotions, 'apply_for'))) {
                flash()->error('Không thể áp dụng mã cho sản phẩm cụ thể khi đã có mã giảm giá toàn bộ.');

                return redirect()->back();
            }

            $promotionProducts = PromotionProductVariant::where('promotion_id', $userPromotion->id)
                ->pluck('product_id')
                ->toArray();

            foreach ($cart->cartItems as $item) {
                if (in_array($item->product_id, $promotionProducts)) {
                    $discountAmount = min($item->price, $userPromotion->discount);
                    $item->price -= $discountAmount;
                    $totalDiscount += $discountAmount;
                    $canApplyPromotion = true;
                }
            }

            if (!$canApplyPromotion) {
                flash()->error('Không có sản phẩm nào trong giỏ hàng đủ điều kiện.');

                return redirect()->back();
            }
        } elseif ($userPromotion->apply_for === 'all') {
            if (in_array('specific_products', array_column($promotions, 'apply_for'))) {
                flash()->error('Không thể áp dụng mã cho toàn bộ khi đã có mã sản phẩm cụ thể.');

                return redirect()->back();
            }

            session()->put('discount', $userPromotion->discount);
            $totalDiscount += $userPromotion->discount;
            $canApplyPromotion = true;
        } elseif ($userPromotion->apply_for === 'freeship') {
            if (in_array('freeship', array_column($promotions, 'apply_for'))) {
                flash()->error('Đã có mã miễn phí vận chuyển.');
                return redirect()->back();
            }

            session()->put('shipping_fee', 0);
            $canApplyPromotion = true;
        }

        if ($canApplyPromotion) {
            $promotions[] = [
                'code' => $userPromotion->code,
                'apply_for' => $userPromotion->apply_for,
                'discount' => $userPromotion->discount
            ];
            session()->put('promotions', $promotions);
            session()->put('total_discount', $totalDiscount);

            flash()->success('Mã giảm giá đã được áp dụng thành công.');
            return redirect()->back();
        }

        flash()->error('Không thể áp dụng mã giảm giá.');
        return redirect()->back();
    }

    public function removeVoucher($promotionCode)
    {
        $promotions = session()->get('promotions', []);
        $promotionIndex = array_search($promotionCode, array_column($promotions, 'code'));

        if ($promotionIndex !== false) {
            unset($promotions[$promotionIndex]);
            session()->put('promotions', array_values($promotions));

            $cart = Cart::where('user_id', Auth::id())->first();

            $totalDiscount = 0;
            $shippingFee = 25000; // Đặt lại phí vận chuyển mặc định

            foreach ($promotions as $promotion) {
                $promotionInfo = Promotion::where('code', $promotion['code'])->first();
                if (!$promotionInfo) continue;

                if ($promotion['apply_for'] === 'specific_products') {
                    $promotionProducts = PromotionProductVariant::where('promotion_id', $promotionInfo->id)
                        ->pluck('product_id')
                        ->toArray();

                    foreach ($cart->cartItems as $item) {
                        if (in_array($item->product_id, $promotionProducts)) {
                            $discountAmount = min($item->price, $promotion['discount']);
                            $item->price -= $discountAmount;
                            $item->save();
                            $totalDiscount += $discountAmount;
                        }
                    }
                } elseif ($promotion['apply_for'] === 'all') {
                    $totalDiscount += $promotion['discount'];
                } elseif ($promotion['apply_for'] === 'freeship') {
                    $shippingFee = 0;
                }
            }

            session()->put('total_discount', $totalDiscount);
            session()->put('shipping_fee', $shippingFee);

            flash()->success('Mã giảm giá đã được xóa thành công.');
            return redirect()->back();
        }

        flash()->error('Không tìm thấy mã giảm giá.');
        return redirect()->back();
    }
}
