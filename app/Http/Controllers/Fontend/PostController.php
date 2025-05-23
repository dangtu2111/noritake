<?php

namespace App\Http\Controllers\Fontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\PostCatalogueRepository;
use App\Repositories\ProductCatalogueRepository;

class PostController extends Controller
{
    protected $postService;
    protected $postRepository;
    protected $postCatalogueRepository;
    protected $productCatalogueRepository;

    public function __construct(
        PostService $postService,
        PostRepository $postRepository,
        PostCatalogueRepository $postCatalogueRepository,
        ProductCatalogueRepository $productCatalogueRepository
    ) {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
        $this->postCatalogueRepository = $postCatalogueRepository;
        $this->productCatalogueRepository = $productCatalogueRepository;
    }
    public function index(Request $request)
    {
        $postCategories = $this->postCatalogueRepository->getLimit(
            ['posts'],
            [
            ['publish', 1]
            ],
            4

        );
        // dd($postCategories);
        $productCategories = $this->productCatalogueRepository->allWhere([
            ['publish', '=', 1]
        ]);
        $postStandC1 = $this->postRepository->getLimitOrder(
            ['users'],
            [
                ['publish', 1],
                ['outstanding', 1],
            ],
            [
                ['created_at', 'asc'],
            ],
            []

        );
        $postStandC2 = $this->postRepository->getLimitOrder(
            ['users'],
            [
                ['publish', 1],
                ['outstanding', 1],
            ],
            [
                ['created_at', 'desc'],
            ],
            [],
            2
        );
        $postStandC3 = $this->postRepository->getLimitOrder(
            ['users'],
            [
                ['publish', 1],
                ['outstanding', 1],
            ],
            [
                ['created_at', 'asc'],
            ]
        );
        $postLikes = $this->postRepository->getLimitOrder(
            [],
            [
                ['publish', 1],
            ],
            [
                ['like', 'asc'],
            ],
            [],
            6
        );
        $postNew = $this->postService->paginateFontend($request);
        $postSimilar = $this->postService->paginateFontend($request);
        return view('frontend.post.index', compact(
            'postNew',
            'postLikes',
            'postSimilar',
            'postStandC1',
            'postStandC2',
            'postStandC3',
            'postCategories',
            'productCategories',
        ));
    }
    public function detail($slug)
    {
        $post = $this->postRepository->findBySlug($slug, ['users', 'postCatalogues']);
        $postCatalogues = $this->postCatalogueRepository->allWhere([
            ['publish', 1]
        ]);
        $productCategories = $this->productCatalogueRepository->allWhere([
            ['publish', '=', 1]
        ]);
        $postCatalogueId = $post->postCatalogues->pluck('id')->toArray(); // lấy ra id danh mục đang đc xem ở bảng pivot và toArray chuyển thành mảng phẳng 
        $postSimilar = $this->postRepository->getLimitOrder(
            ['users', 'postCatalogues'],
            [
                ['publish', 1],
                ['id', '!=', $post->id],

            ],
            [
                ['created_at', 'desc']
            ],
            $postCatalogueId,
            4
        );
        return view('frontend.post.detail', compact(
            'post',
            'postSimilar',
            'postCatalogues',
            'postCatalogueId',
            'productCategories',
        ));
    }

    public function postInCategory($id)
    {

        $postCatalogue = $this->postCatalogueRepository->findById($id, ['childrenReference']);
        $productCategories = $this->productCatalogueRepository->allWhere([
            ['publish', '=', 1]
        ]);
        $postCatalogues = $this->postCatalogueRepository->allWhere([
            ['publish', 1],
            ['id', '!=', $postCatalogue->id],
        ]);
        $postCatalogueIds = collect([$id]);
        if ($postCatalogue->childrenReference->count() > 0) {
            $postCatalogueIds = $postCatalogueIds->merge($postCatalogue->childrenReference->pluck('id'));
        }
        // lấy bài viết thông qua mối quan hệ postCatalogues
        $postInCatagories = Post::whereHas('postCatalogues', function ($query) use ($postCatalogueIds) {
            $query->whereIn('post_catalogues.id', $postCatalogueIds);
        })
            ->where('publish', 1)
            ->paginate(9);
        $postSimilar = $this->postService->paginateFontend($id);
        
        return view('frontend.post.category', compact(
            'postSimilar',
            'postCatalogue',
            'postCatalogues',
            'postInCatagories',
            'productCategories',
        ));
    }
}
