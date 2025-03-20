<div class="table-responsive table-card mt-3 mb-1">
    <table class="table align-middle table-nowrap" id="customerTable">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width: 50px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check-all">
                    </div>
                </th>
                <th class="sort" data-sort="name">Tên trang</th>
                <th class="sort text-center" data-sort="content">Nội dung</th>
                <th class="sort text-center" data-sort="is_active">Trạng thái</th>
                <th class="sort text-end" data-sort="action" style="width:100px">Thao tác</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @forelse($pages as $page)
            <tr>
                <th scope="row">
                    <div class="form-check">
                        <input class="form-check-input checkbox-item" type="checkbox" name="checkbox-item[]" value="{{ $page->id }}">
                    </div>
                </th>
                <td class="customer_single_td">
                    <div style="line-height: 2.2rem">
                        <div>
                            <span class="fw-medium fz-16">{{ $page->title }}</span>
                        </div>
                        <div>
                            <span>Link: <strong><a href="{{ route('static-pages.show', ['slug' => $page->slug]) }}" class="text-danger pe-2">{{ route('static-pages.show', ['slug' => $page->slug]) }}                            </a>
                            </strong></span>
                        
                        </div>
                    </div>
                </td>
                <td class="cre text-center">
                    {!!   Str::limit(strip_tags($page->content), 50, '...') !!}
                </td>
               
                <td class="status text-center">
                    <span class="badge {{ $page->is_active ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} text-uppercase p-2">
                        {{ $page->is_active ? 'Hiển thị' : 'Ẩn' }}
                    </span>
                </td>
                <td>
                    <div class="dropdown text-end">
                        <a href="#" role="button" id="dropdownMenuLink{{ $page->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-fill fs-5"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $page->id }}">
                            <li>
                                <a class="dropdown-item text-info" href="{{ route('static-pages.edit', $page) }}">
                                    <i class="ri-edit-box-line"></i> Chỉnh sửa
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('static-pages.destroy', $page) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                        <i class="ri-delete-bin-line"></i> Xóa
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Không có trang tĩnh nào để hiển thị.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>