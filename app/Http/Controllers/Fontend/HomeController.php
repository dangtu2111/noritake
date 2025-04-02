<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Repositories\BannerRepository;
use App\Repositories\BrandRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductCatalogueRepository;
use App\Repositories\PostCatalogueRepository;

use App\Services\PostService;
use App\Services\ShopService;
use Illuminate\Support\Facades\Mail;
use  App\Repositories\Interfaces\SystemRepositoryInterface as SystemRepository;
use App\Models\Menu;

class HomeController extends Controller
{

    protected $shopService;
    protected $productService;
    protected $postRepository;
    protected $brandRepository;
    protected $bannerRepository;
    protected $productCatalogueRepository;
    protected $systemRepository;
    protected $postCatalogueRepository;

    public function __construct(
        ShopService $shopService,
        ProductService $productService,
        PostRepository $postRepository,
        BrandRepository $brandRepository,
        BannerRepository $bannerRepository,
        ProductCatalogueRepository $productCatalogueRepository,
        SystemRepository $systemRepository,
        PostCatalogueRepository $postCatalogueRepository
    ) {
        $this->postRepository = $postRepository;
        $this->shopService = $shopService;
        $this->productService = $productService;
        $this->bannerRepository = $bannerRepository;
        $this->brandRepository = $brandRepository;
        $this->productCatalogueRepository = $productCatalogueRepository;
        $this->systemRepository=$systemRepository;
        $this->postCatalogueRepository=$postCatalogueRepository;
    }
    public function index(Request $request)
    {
        // $productCatalogues = $this->productCatalogueRepository->allWhere([
        //     ['publish', 1]
        // ]);
        // $brands = $this->brandRepository->allWhere([
        //     ['publish', 1]
        // ]);
        // $bannerHome1 = $this->bannerRepository->allWhere([
        //     ['publish', 1],
        //     ['location', 0]
        // ]);
        // $bannerHome2 = $this->bannerRepository->allWhere([
        //     ['publish', 1],
        //     ['location', 1]
        // ]);
        // $productNew = $this->productService->productNews();
        // $productSales = $this->productService->productSales();
        // $productSupperSales = $this->productService->productSupperSales();
        // $productShopPriceMins = $this->shopService->productShopPriceMins();
        // $postHomes = $this->postRepository->getLimitOrder(
        //     ['users'],
        //     [
        //         ['publish', 1],
        //         ['outstanding', 1],
        //     ],
        //     [
        //         ['created_at', 'asc'],
        //     ],
        //     []

        // );
        // $postHomeNews = $this->postRepository->getLimitOrder(
        //     ['users'],
        //     [
        //         ['publish', 1],
        //     ],
        //     [
        //         ['created_at', 'desc'],
        //     ],
        //     []

        // );
        $systems=convert_array($this->systemRepository->all(),'keyword','content');
      
        // dd($postHomes);
        $title="Trang chủ";
        return view('frontend.index.home_index', compact(
            'systems','title'
        ));
    }

    public function faq()
    {
        return view('fontend.page_other.faq');
    }

    public function showForm()
    {
        return view('frontend.page_other.contact');
    }

    public function send(Request $request)
    {
        // Validate dữ liệu từ form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Gửi email với dữ liệu form
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($validated));

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function terms_and_conditions()
    {
        return view('fontend.page_other.terms_and_conditions');
    }

    public function return_and_warranty_policy()
    {
        return view('fontend.page_other.return_and_warranty_policy');
    }
    public function about_us()
    {   
        $category= $this->postCatalogueRepository->allWhere([
            ['slug','ve-chung-toi']
        ] );
        $id=$category->first()->id;
        $postCatalogue = $this->postCatalogueRepository->findById($id, ['childrenReference']);

        $postCatalogueIds = collect([$id]);
        if ($postCatalogue->childrenReference->count() > 0) {
            $postCatalogueIds = $postCatalogueIds->merge($postCatalogue->childrenReference->pluck('id'));
        }
        // lấy 
        $postInCatagories = Post::whereHas('postCatalogues', function ($query) use ($postCatalogueIds) {
            $query->whereIn('post_catalogues.id', $postCatalogueIds);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        // dd($postInCatagories);
        $products = $this->productService->productNews();
        return view('frontend.page_other.about_us',compact('products','postInCatagories'));
    }
    public function security_center()
    {
        return view('fontend.page_other.security_center');
    }
    public function static_page()
    {
        return view('frontend.page_other.staticpage');
    }
}
