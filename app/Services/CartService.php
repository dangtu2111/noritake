<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use App\Models\Promotion;
use App\Models\UserVoucher;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductVariantRepository;
use App\Services\Interfaces\CartServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * interface  UserService
 * @package App\Services
 */

class CartService implements CartServiceInterface
{
    protected $cartRepository;
    protected $productRepository;
    protected $productVariantRepository;
    public function __construct(
        ProductRepository $productRepository,
        ProductVariantRepository $productVariantRepository,
        CartRepository $cartRepository,
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->productVariantRepository = $productVariantRepository;
    }

    public function all()
    {
        return $this->cartRepository->all(
            ['cartItems', 'cartItems.productVariants', 'cartItems.products'],
            [
                ['user_id', Auth::id()],
            ]
        );
    }

    public function countProductIncart()
    {
        $carts = $this->cartRepository->all(
            ['cartItems', 'cartItems.productVariants', 'cartItems.products'],
            [
                ['user_id', Auth::id()],
            ]
        );
        $count = 0;
        if ($carts) {
            $cart = Cart::with('cartItems.products', 'cartItems.productVariants')->find($carts->id);
            foreach ($cart->cartItems as $item) {
                if ($item->products || $item->productVariants) {
                    $count++;
                }
            }
        }
        return $count;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            // Lấy dữ liệu từ request
            $payload = $request->input();

            // Tìm sản phẩm theo product_id
            $product = $this->productRepository->findById($payload['product_id']);

            // Tạo hoặc lấy giỏ hàng của người dùng
            $cartByUser = Cart::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            // Xác định giá (giá giảm nếu có, nếu không thì lấy giá gốc)
            $price = $product->del != 0 ? $product->del : $product->price;

            // Dữ liệu để lưu vào CartItem
            $data = [
                'cart_id' => $cartByUser->id,
                'product_id' => $product->id,
                'quantity' => $payload['quantity'],
                'price' => str_replace('.', '', $price), // Loại bỏ dấu chấm trong giá
            ];

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $cartItem = CartItem::where('cart_id', $cartByUser->id)
                ->where('product_id', $product->id)
                ->first();

            // Nếu đã có, tăng số lượng; nếu chưa, tạo mới
            if ($cartItem) {
                $cartItem->quantity += $data['quantity'];
                $cartItem->save();
            } else {
                CartItem::create($data);
            }

            DB::commit();
            return true; // Trả về true khi thành công
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage(); // In lỗi ra để debug
            return false;
        }
    }


    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $cart = $this->cartRepository->all(
                ['cartItems', 'cartItems.productVariants', 'cartItems.products'],
                [
                    ['user_id', Auth::id()],
                ]
            );
            if ($cart) {

                $payload = $request->input();
                $carItem_id=$payload['cartItem_id'];
                $quantity=$payload['quantity'];
                $cartItem = CartItem::findOrFail($carItem_id);
                $cartItem->update(['quantity' => $quantity]);
                // loop qua các item trong giỏ hàng 
                // foreach ($cart->cartItems as $item) {
                //     // 
                //     // product_variant_id tồn tại trong payload (request)
                //     // if ($payload['product_variant_id'] && $item->productVariants && $item->productVariants->id == $payload['product_variant_id']) {
                //     //     // Cập nhật
                //     //     $quantity = $payload['quantity'];
                //     //     $item->update(['quantity' => $quantity]);
                //     // } elseif ($payload['product_id'] && $item->products && $item->products->id == $payload['product_id']) {
                //     //     $quantity = $payload['quantity'];
                //     //     $item->update(['quantity' => $quantity]);
                //     // }
                // }

            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {

            $id = $request->input('id_cart_item');
    
            if (!$id) {
                throw new \Exception('Thiếu ID của mục trong giỏ hàng');
            }

            $cartItem = CartItem::findOrFail($id); // Tự động ném ngoại lệ nếu không tìm thấy
            $cartItem->delete();

            DB::commit();
            
            return redirect()->back()->with('success', 'Đã xóa mục khỏi giỏ hàng');

        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function clear(Request $request)
    {
        DB::beginTransaction();
        try {
            $cartId = $request->input('cart_id');
            $cart = Cart::where('user_id', Auth::id())->first();
            
            if ($cart) {
                $cart->delete();
                DB::commit();

                app('App\Services\CartService')->clearPromotionsSession();

                return response()->json(['success' => true]);
            } else {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Cart not found.']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    public function destroyCartItem(Request $request)
    {
        DB::beginTransaction();
        try {
            $cart = Cart::where('user_id', Auth::id())->with('cartItems')->first();
            if ($cart) {
                // Lấy mảng ID từ session
                $arrayIdChecked = session('array_id', []);

                if (!empty($arrayIdChecked)) {
                    // xóa trong bảng
                    CartItem::whereIn('id', $arrayIdChecked)
                        ->where('cart_id', $cart->id)
                        ->delete();

                    // xóa session lưu id đc chọn và promotion
                    session()->forget('array_id');
                    session()->forget('promotions');

                    DB::commit();
                }
            }

            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Cart not found.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function findAttributesByCode()
    {
        $carts = $this->all();
        $attributesByCartItem = [];
        if (isset($carts->cartItems) && count($carts->cartItems) > 0) {
            foreach ($carts->cartItems as $cartItem) {
                if ($cartItem->productVariants) {
                    $codeIds = explode(',', $cartItem->productVariants->code);
                    $attributes = Attribute::whereIn('id', $codeIds)->get();
                    //lấy dúng attribut của cartitem đó 
                    $attributesByCartItem[$cartItem->id] = $attributes;
                }
            }
        }
        return $attributesByCartItem;
    }

    public function getOrderByCartId($request)
    {
        $array_ids = session('array_id', []);
        $array_id = collect($array_ids)->flatten(1)->all();
        $order = CartItem::with('products', 'productVariants', 'productVariants.attributes')
            ->whereIn('id', $array_id)->get();
        return $order;
    }

    public function clearPromotionsSession()
    {
        try {
            // Kiểm tra xem có mã giảm giá trong session không
            if (!session()->has('promotions')) {
                return redirect()->back()->with('error', 'Không có mã giảm giá nào để xóa.');
            }

            // Xóa mã giảm giá khỏi session
            session()->forget('promotions');

            // Lấy lại các sản phẩm trong giỏ hàng từ session
            $cartItems = session()->get('cart', []);

            // Kiểm tra nếu giỏ hàng trống
            if (empty($cartItems)) {
                return redirect()->back()->with('error', 'Giỏ hàng trống, không thể cập nhật tổng số tiền.');
            }

            // Tính lại tổng số tiền trong giỏ hàng
            $total = 0;
            foreach ($cartItems as $item) {
                // Cộng lại số tiền cho mỗi sản phẩm trong giỏ hàng mà không có mã giảm giá
                $total += $item['price'] * $item['quantity'];
            }

            // Cập nhật tổng số tiền mới vào session
            session()->put('cart_total', $total);

            return redirect()->back()->with('success', 'Xóa mã giảm giá thành công.');
        } catch (\Exception $e) {
            // Ghi lỗi chi tiết vào log

            // Thông báo lỗi cho người dùng
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa voucher. Vui lòng thử lại sau.');
        }
    }

    public function calculateCartTotal($cartId)
    {
        // Tính tổng giá dựa trên cart_items
        return CartItem::where('cart_id', $cartId)->sum('price');
    }
}
