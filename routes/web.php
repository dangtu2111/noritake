<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\AttributeCatalogueController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Ajax\AttributeController as AjaxAttributeController;
use App\Http\Controllers\Ajax\ProductController as AjaxProductController;
use App\Http\Controllers\Ajax\SearchController as AjaxSearchController;
use App\Http\Controllers\Ajax\CartController as AjaxCartController;
use App\Http\Controllers\Ajax\WishlistController as AjaxWishlistController;
use App\Http\Controllers\Ajax\OrderController as AjaxOrderController;
use App\Http\Controllers\Ajax\MenuController as AjaxMenuController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostCatalogueController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProductCatalogueController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Fontend\FPromotionController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\SystemController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Fontend\UserController as FontendUserController;
use App\Http\Controllers\Fontend\ProductController as FontendProductController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Controllers\Fontend\OrderController as FontendOrderController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Fontend\PostController as FontendPostController;
use App\Http\Controllers\Fontend\ShopController;
use App\Http\Controllers\Backend\PromotionController;
use App\Http\Controllers\PromotionEmailController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Fontend\MomoController;
use App\Http\Controllers\Fontend\VnpayController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Backend\RevenueController;
use App\Http\Controllers\Backend\HomeViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeComponentController;
use App\Http\Controllers\StaticViewController;
// 
use App\Http\Controllers\Backend\ContactController;



//FONTEND 
Route::get('/', [HomeController::class, 'index'])->name('home_index.index');
Route::get('home', [HomeController::class, 'index'])->name('home.index');
Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('product/category/{id}', [ShopController::class, 'productIncategory'])->where(['id' => '[0-9]+'])->name('product.category');
Route::get('product/brand/{id}', [ShopController::class, 'productInBrand'])->where(['id' => '[0-9]+'])->name('product.brand');
Route::get('product/filter', [ShopController::class, 'productFilter'])->name('product.filter');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('product/detail/{slug}', [FontendProductController::class, 'detail'])->name('product.detail');
Route::get('search', [AjaxSearchController::class, 'search'])->name('search');
//Page orther
Route::get('faq', [HomeController::class, 'faq'])->name('home.faq');
Route::get('/he-thong-cua-hang', [HomeController::class, 'showForm'])->name('home.contact');
Route::post('/contact/send', [HomeController::class, 'send'])->name('contact.send');
Route::get('terms_and_conditions', [HomeController::class, 'terms_and_conditions'])->name('home.terms_and_conditions');
Route::get('return_and_warranty_policy', [HomeController::class, 'return_and_warranty_policy'])->name('home.return_and_warranty_policy');
Route::get('about_us', [HomeController::class, 'about_us'])->name('home.about_us');
Route::get('security_center', [HomeController::class, 'security_center'])->name('home.security_center');


// AJAX
//SEARCH SUGGESTION
Route::get('/ajax/search/suggestion', [AjaxSearchController::class, 'suggestion'])->name('ajax.search.suggestions');
Route::get('/ajax/search/modal', [AjaxSearchController::class, 'modalSearch'])->name('ajax.search.modal');
// ATTRIBUTE 
Route::get('/ajax/attribute/getAttribute', [AjaxAttributeController::class, 'getAttribute'])->name('ajax.attribute.getAttribute');
Route::get('/ajax/attribute/loadAttribute', [AjaxAttributeController::class, 'loadAttribute'])->name('ajax.attribute.loadAttribute');
Route::get('ajax/product/loadVariant', [AjaxProductController::class, 'loadVariant'])->name('ajax.loadVariant');
//Static page

// CART AJAX

Route::post('/ajax/cart/addToCart', [AjaxCartController::class, 'addToCart'])->name('ajax.cart.addToCart');
Route::post('/ajax/cart/updateCart', [AjaxCartController::class, 'updateCart'])->name('ajax.cart.updateCart');
Route::get('/ajax/cart/LoadOrderByCartId', [AjaxCartController::class, 'LoadOrderByCartId'])->name('ajax.cart.LoadOrderByCartId');
Route::post('/ajax/cart/sessionOrderByCartId', [AjaxCartController::class, 'sessionOrderByCartId'])->name('ajax.cart.sessionOrderByCartId');
Route::get('/ajax/cart/getOrderByCartId', [AjaxCartController::class, 'getOrderByCartId'])->name('ajax.cart.getOrderByCartId');
Route::post('/ajax/cart/clearSessionId', [AjaxCartController::class, 'clearSessionId'])->name('ajax.cart. ');
Route::delete('/ajax/cart/destroyCart', [AjaxCartController::class, 'destroyCart'])->name('ajax.cart.destroyCart');
Route::delete('/ajax/cart/clearCart', [AjaxCartController::class, 'clearCart'])->name('ajax.cart.clearCart');
Route::post('/ajax/cart/checkStock', [AjaxCartController::class, 'checkStock'])->name('ajax.inventory.checkStock');
//MENU AJAX
Route::post('/ajax/menu/drag', [AjaxMenuController::class, 'drag'])->name('ajax.menu.drag');
// WISHLIST AJAX
Route::post('/ajax/wishlist/toggle', [AjaxWishlistController::class, 'toggle'])->name('ajax.wishlist.toggle');
// POST
Route::group(['prefix' => 'post'], function () {
    Route::get('page', [FontendPostController::class, 'index'])->name('post.page');
    Route::get('category/{id}', [FontendPostController::class, 'postInCategory'])->where(['id' => '[0-9]+'])->name('post.category');
    Route::get('detail/{slug}', [FontendPostController::class, 'detail'])->name('post.detail');
});

// FONTEND REQUIRED LOGIN
Route::middleware(['auth'])->group(function () {

    // PROFILE USER
    Route::get('/profile', [FontendUserController::class, 'profile'])->name('profile.user');
    Route::get('/address', [FontendUserController::class, 'address'])->name('address.user');
    Route::get('/profile/change-pass', [FontendUserController::class, 'changeViewProfile'])->name('profile.change-view');
    Route::post('/profile/change-pass', [FontendUserController::class, 'changeSubmitProfile'])->name('profile.change-submit');
    Route::get('/confirm-password-change/{token}', [FontendUserController::class, 'confirmPasswordChange'])->name('confirm.password.change');
    Route::get('/profile/edit', [FontendUserController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/edit', [FontendUserController::class, 'updateProfile'])->name('profile.update');

    // account 
    Route::group(['prefix' => 'account'], function () {
        Route::get('info', [FontendUserController::class, 'info'])->name('account.info');
        Route::get('view_order', [FontendOrderController::class, 'view_order'])->name('account.order');
        Route::get('view_promotion', [FPromotionController::class, 'view_promotion'])->name('account.promotions');
        Route::get('/view_promotion/{id}', [FPromotionController::class, 'show'])->name('account.promotion.show');
        Route::get('order/detail/{id}', [FontendOrderController::class, 'detail'])->where(['id' => '[0-9]+'])->name('account.order.detail');
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('index', [AjaxCartController::class, 'index'])->name('cart.index');

        Route::post('/apply-discount', [AjaxCartController::class, 'applyPromotion'])->name('cart.applyDiscount');
        Route::post('/submit-note', [AjaxCartController::class, 'submitNote'])->name('cart.submitNote');
        Route::post('/remove-voucher/{voucherId}', [AjaxCartController::class, 'removeVoucher'])->name('cart.removeVoucher');
    });

    //promotion
    Route::get('/promotion', [FPromotionController::class, 'index'])->name('promotion.home_index');
    Route::post('/receive/{promotion}', [FPromotionController::class, 'receivePromotion'])->name('promotion.receive');
    Route::post('/apply-discount', [FPromotionController::class, 'checkDiscount'])->name('promotion.checkDiscount');

    // ORDER 
    Route::group(['prefix' => 'order'], function () {
        Route::get('checkout', [FontendOrderController::class, 'checkout'])->name('order.checkout');
        Route::post('payment_method', [FontendOrderController::class, 'selectmethod'])->name('order.paymentmethod');
        Route::post('store', [FontendOrderController::class, 'store'])->name('store.order');
        Route::get('success', [FontendOrderController::class, 'success'])->name('order.success');
        Route::get('failed', [FontendOrderController::class, 'failed'])->name('order.failed');
    });
    // WISHLIST
    Route::group(['prefix' => 'wishlist'], function () {
        Route::get('index', [AjaxWishlistController::class, 'index'])->name('wishlist.index');
    });

    // PAYMENT VNPAY
    Route::get('return/vnpay', [VnpayController::class, 'vnpayReturn'])->name('vnpay.return');
    Route::get('return/vnpay_ipn', [VnpayController::class, 'vnpayIpn'])->name('vnpay.ipn');

    // PAYMENT momo
    Route::get('return/momo', [MomoController::class, 'momoReturn'])->name('momo.return');
    Route::get('return/momo_ipn', [MomoController::class, 'momoIpn'])->name('momo.ipn');

    //ĐÁNH GIÁ SẢN PHẨM
    Route::get('/producreview', [ProductReviewController::class, 'index']);
    Route::get('/information', [ProductReviewController::class, 'view_order']);
    Route::get('/producreview-data/{slug}', [ProductReviewController::class, 'data']);
    Route::post('/producreview/create/{slug}', [ProductReviewController::class, 'create']);
    Route::post('/producreview/like', [ProductReviewController::class, 'like']);
    Route::get('/producreview/like-data/{slug}', [ProductReviewController::class, 'likedata']);
    Route::get('/product/check/{slug}', [ProductReviewController::class, 'checkIfRated']);
    Route::post('/producreview-delete', [ProductReviewController::class, 'delete']);
    Route::post('/producreview-update', [ProductReviewController::class, 'update']);

    // BÌNH LUẬN BÀI VIẾT
    Route::get('/view-content', [ContentController::class, 'view_content']);
    Route::get('/view-content-data', [ContentController::class, 'data']);
    Route::post('/view-content-create', [ContentController::class, 'create']);
    Route::post('/view-content-delete', [ContentController::class, 'delete']);
    Route::post('/view-content-update', [ContentController::class, 'update']);
    Route::post('/content/like', [ContentController::class, 'like']);
    Route::get('/content/like-data', [ContentController::class, 'likedata']);
    Route::get('/content/check', [ContentController::class, 'checkIfRated']);
    Route::get('/comments', [ContentController::class, 'loadCommentsPage']);

});
//Gửi thắc mắc
Route::group(['prefix' => 'contact'], function () {
    Route::post('create', [ContactController::class, 'create'])->name('user.contact.create');
});

//BACKEND
Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    
    // usercatalogue
    Route::group(['prefix' => 'user/catalogue'], function () {
        Route::get('index', [UserCatalogueController::class, 'index'])->name('user.catalogue.index');
        Route::get('create', [UserCatalogueController::class, 'create'])->name('user.catalogue.create');
        Route::post('store', [UserCatalogueController::class, 'store'])->name('user.catalogue.store');
        Route::get('update/{slug}', [UserCatalogueController::class, 'update'])->name('user.catalogue.update');
        Route::post('edit/{slug}', [UserCatalogueController::class, 'edit'])->name('user.catalogue.edit');
        Route::get('delete/{id}', [UserCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.catalogue.delete');
        Route::delete('destroy/{id}', [UserCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.catalogue.destroy');
    });

    // users 
    Route::group(['prefix' => 'user/'], function () {
        Route::get('index', [UserController::class, 'index'])->name('user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('update/{id}', [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.update');
        Route::post('edit/{id}', [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.edit');
        Route::get('detail/{id}', [UserController::class, 'detail'])->where(['id' => '[0-9]+'])->name('user.detail');
        // Route::get('delete/{id}', [UserController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.delete');
        // Route::delete('destroy/{id}', [UserController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.destroy');
    });

    // attribute catalogue
    Route::group(['prefix' => 'attribute/catalogue'], function () {
        Route::get('index', [AttributeCatalogueController::class, 'index'])->name('attribute.catalogue.index');
        Route::get('create', [AttributeCatalogueController::class, 'create'])->name('attribute.catalogue.create');
        Route::post('store', [AttributeCatalogueController::class, 'store'])->name('attribute.catalogue.store');
        Route::get('update/{slug}', [AttributeCatalogueController::class, 'update'])->name('attribute.catalogue.update');
        Route::post('edit/{slug}', [AttributeCatalogueController::class, 'edit'])->name('attribute.catalogue.edit');
        Route::get('delete/{id}', [AttributeCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])->name('attribute.catalogue.delete');
        Route::delete('destroy/{id}', [AttributeCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('attribute.catalogue.destroy');
    });

    // attribute
    Route::group(['prefix' => 'attribute'], function () {
        Route::get('index', [AttributeController::class, 'index'])->name('attribute.index');
        Route::get('create', [AttributeController::class, 'create'])->name('attribute.create');
        Route::post('store', [AttributeController::class, 'store'])->name('attribute.store');
        Route::get('update/{slug}', [AttributeController::class, 'update'])->name('attribute.update');
        Route::post('edit/{slug}', [AttributeController::class, 'edit'])->name('attribute.edit');
        Route::get('delete/{id}', [AttributeController::class, 'delete'])->where(['id' => '[0-9]+'])->name('attribute.delete');
        Route::delete('destroy/{id}', [AttributeController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('attribute.destroy');
    });

    // product catalogue
    Route::group(['prefix' => 'product/catalogue'], function () {
        Route::get('index', [ProductCatalogueController::class, 'index'])->name('product.catalogue.index');
        Route::get('create', [ProductCatalogueController::class, 'create'])->name('product.catalogue.create');
        Route::post('store', [ProductCatalogueController::class, 'store'])->name('product.catalogue.store');
        Route::get('update/{slug}', [ProductCatalogueController::class, 'update'])->name('product.catalogue.update');
        Route::post('edit/{slug}', [ProductCatalogueController::class, 'edit'])->name('product.catalogue.edit');
        Route::get('delete/{id}', [ProductCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])->name('product.catalogue.delete');
        Route::delete('destroy/{id}', [ProductCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('product.catalogue.destroy');
    });

    //brand
    Route::group(['prefix' => 'brand'], function () {
        Route::get('index', [BrandController::class, 'index'])->name('brand.index');
        Route::get('create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('update/{slug}', [BrandController::class, 'update'])->name('brand.update');
        Route::post('edit/{slug}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->where(['id' => '[0-9]+'])->name('brand.delete');
        Route::delete('destroy/{id}', [BrandController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('brand.destroy');
    });

    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('index', [ProductController::class, 'index'])->name('product.index');
        Route::get('create', [ProductController::class, 'create'])->name('product.create');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::get('update/{slug}', [ProductController::class, 'update'])->name('product.update');
        Route::post('edit/{slug}', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->where(['id' => '[0-9]+'])->name('product.delete');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('product.destroy');
    });

    //promotion_dashboar
    Route::group(['prefix' => 'dashboard/promotion'], function () {
        Route::get('index', [PromotionController::class, 'index'])->name('promotions.index');
        Route::get('create', [PromotionController::class, 'create'])->name('promotions.create');
        Route::get('edit/{id}', [PromotionController::class, 'edit'])->where(['id' => '[0-9]+'])->name('promotions.edit');
        Route::put('update/{id}', [PromotionController::class, 'update'])->where(['id' => '[0-9]+'])->name('promotion.update');
        Route::get('show/{id}', [PromotionController::class, 'show'])->where(['id' => '[0-9]+'])->name('promotions.show'); // sửa lại thành detail
        Route::post('store', [PromotionController::class, 'store'])->name('promotions.store');
        Route::get('confirm-delete/{id}', [PromotionController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('promotions.confirm_delete');
        Route::delete('delete/{id}', [PromotionController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('promotions.destroy');
        Route::delete('bulkdeleteAll', [PromotionController::class, 'bulkDeleteAll'])->name('promotions.bulkdeleteAll');
    });

    //post catalogues
    Route::group(['prefix' => 'post/catalogue'], function () {
        Route::get('index', [PostCatalogueController::class, 'index'])->name('post.catalogue.index');
        Route::get('create', [PostCatalogueController::class, 'create'])->name('post.catalogue.create');
        Route::post('store', [PostCatalogueController::class, 'store'])->name('post.catalogue.store');
        Route::get('update/{slug}', [PostCatalogueController::class, 'update'])->name('post.catalogue.update');
        Route::post('edit/{slug}', [PostCatalogueController::class, 'edit'])->name('post.catalogue.edit');
        Route::get('delete/{id}', [PostCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])->name('post.catalogue.delete');
        Route::delete('destroy/{id}', [PostCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('post.catalogue.destroy');
    });

    //posts
    Route::group(['prefix' => 'post'], function () {
        Route::get('index', [PostController::class, 'index'])->name('post.index');
        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('store', [PostController::class, 'store'])->name('post.store');
        Route::get('update/{slug}', [PostController::class, 'update'])->name('post.update');
        Route::post('edit/{slug}', [PostController::class, 'edit'])->name('post.edit');
        Route::get('delete/{id}', [PostController::class, 'delete'])->where(['id' => '[0-9]+'])->name('post.delete');
        Route::delete('destroy/{id}', [PostController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('post.destroy');
    });


    // order //
    Route::group(['prefix' => 'order'], function () {
        Route::get('index', [OrderController::class, 'index'])->name('order.index');
        Route::get('detail/{id}', [OrderController::class, 'detail'])->where(['id' => '[0-9]+'])->name('order.detail');
        Route::post('process_cancele/{id}', [OrderController::class, 'process_cancele'])->where(['id' => '[0-9]+'])->name('order.process_cancele');
    });

    //Banner 
    Route::group(['prefix' => 'banner'], function () {
        Route::get('index', [BannerController::class, 'index'])->name('banner.index');
        Route::get('create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('update/{id}', [BannerController::class, 'update'])->name('banner.update');
        Route::post('edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::get('delete/{id}', [BannerController::class, 'delete'])->where(['id' => '[0-9]+'])->name('banner.delete');
        Route::delete('destroy/{id}', [BannerController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('banner.destroy');
    });

    //Contact
    Route::group(['prefix' => 'contact'], function () {
        Route::get('index', [ContactController::class, 'index'])->name('contact.index');
        Route::get('admin/contacts/{id}', [ContactController::class, 'show'])->name('contact.show');
        Route::delete('admin/contacts/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
    });
    //Email request
    Route::group(['prefix' => 'email'], function () {
        Route::get('index', [PromotionEmailController::class, 'index'])->name('email.index');
    });
    //System
    Route::group(['prefix' => 'system'], function () {
        Route::get('index', [SystemController::class, 'index'])->name('system.index');
        Route::post('store', [SystemController::class, 'store'])->name('system.store');
    });
    // Manage menu
    Route::group(['prefix' => 'menu'], function () {
        Route::get('index', [MenuController::class, 'index'])->name('menu.index');
        Route::get('create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('store', [MenuController::class, 'store'])->name('menu.store');
        Route::get('edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::get('{id}/children', [MenuController::class, 'children'])->name('menu.children');
        Route::post('saveChildren', [MenuController::class, 'saveChildren'])->name('menu.save.children');
        Route::post('update', [MenuController::class, 'update'])->name('menu.update');
        // Route::get('{id}/delete', [MenuController::class, 'delete'])->name('menu.delete');
        // Route::post('{id}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');
        
    });
   

    //Doanh thu
    Route::get('/admin/revenue', [RevenueController::class, 'index'])->name('revenue.index');
    Route::post('/admin/thong-ke-data', [RevenueController::class, 'Thongke']);

    // ORDER UPDATE AJAX
    Route::post('/ajax/order/editNote', [AjaxOrderController::class, 'edit'])->name('ajax.order.edit');
    Route::post('/ajax/order/updateStatus', [AjaxOrderController::class, 'updateStatus'])->name('ajax.order.updateStatus');
    Route::post('/ajax/order/updatePaidAt', [AjaxOrderController::class, 'updatePaidAt'])->name('ajax.order.updatePaidAt');

    //view comment bài viết admin
    Route::get('/admin/comment-view', [ContentController::class, 'view'])->name('comment');
    Route::get('/admin/comment-data', [ContentController::class, 'getdata']);
    Route::post('/comment-update-admin', [ContentController::class, 'updateadmin']);
    Route::post('/comment-delete-admin', [ContentController::class, 'deleteadmin']);

    //view đánh giá admin
    Route::get('/admin/producreview-view', [ProductReviewController::class, 'view'])->name('productreview');
    Route::get('/admin/producreview-data', [ProductReviewController::class, 'getdata']);
    Route::post('/producreview-update-admin', [ProductReviewController::class, 'updateadmin']);
    Route::post('/producreview-delete-admin', [ProductReviewController::class, 'deleteadmin']);


    Route::get('/admin/home-view', [HomeComponentController::class, 'index'])->name('home-components.index');
    Route::get('/admin/home-create', [HomeComponentController::class, 'create'])->name('home-components.create');
    Route::get('/admin/home-update/{id}', [HomeComponentController::class, 'update_index'])->name('home-components.update_index');
    Route::get('/admin/home-delete/{id}', [HomeComponentController::class, 'delete'])->name(name: 'home-components.delete');
    Route::post('/admin/home-view', [HomeComponentController::class, 'store'])->name('home-components.store');
    Route::put('/admin/home-view/{id}', [HomeComponentController::class, 'update'])->name('home-components.update');
    Route::delete('/admin/home-view/{id}', [HomeComponentController::class, 'destroy'])->name('home-components.destroy');



    Route::get('/admin/static-pages', [StaticViewController::class, 'index'])->name('static-pages.index');
    Route::get('/admin/static-pages/create', [StaticViewController::class, 'create'])->name('static-pages.create');
    Route::post('/admin/static-pages', [StaticViewController::class, 'store'])->name('static-pages.store');
    Route::get('/admin/static-pages/{staticPage}/edit', [StaticViewController::class, 'edit'])->name('static-pages.edit');
    Route::put('/admin/static-pages/{staticPage}', [StaticViewController::class, 'update'])->name('static-pages.update');
    Route::delete('/admin/static-pages/{staticPage}', [StaticViewController::class, 'destroy'])->name('static-pages.destroy');
    Route::delete('/admin/static-pages/bulk-destroy', [StaticViewController::class, 'bulkDestroy'])->name('static-pages.bulk-destroy');
});
//view static page 
Route::get('pages/{slug}', [StaticViewController::class, 'show'])->name('static-pages.show');

// AUTH
Route::get('login', [LoginController::class, 'index'])->name('auth.login');
Route::get('admin/login', [LoginController::class, 'index'])->name('auth.admin.login');
Route::post('store-login', [LoginController::class, 'login'])->name('store.login');
Route::get('register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('register-store', [RegisterController::class, 'register'])->name('store.register');
Route::get('/confirm-registration/{token}', [RegisterController::class, 'confirmRegistration'])->name('confirm.registration');

Route::get('/password/confirm_email', [ForgotPasswordController::class, 'emailForm'])->name('password.confirm_email');
Route::post('/password/email', [ForgotPasswordController::class, 'sendEmail'])->name('password.email');
Route::get('/password/verify-otp', [ForgotPasswordController::class, 'otpForm'])->name('password.otp');
Route::post('/password/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.otp.submit');
Route::get('/password/resend-otp', [ForgotPasswordController::class, 'resendOtp'])->name('password.otp.resend');
Route::get('/password/reset', [ForgotPasswordController::class, 'resetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name('auth.facebook.callback');
Route::post('/sendmail_promotion', [PromotionEmailController::class, 'store'])->name('sendmail_promotion');


Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');



//Page 404
Route::fallback(function () {
    return view('fontend.error.404');
});