<div class="table-responsive table-card mt-3 mb-1">
    <table class="table align-middle table-nowrap" id="customerTable">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width: 50px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check-all">
                    </div>
                </th>
                <th class="sort" data-sort="name">Tên thành phần </th>
                <th class="sort text-center" data-sort="cre">Mô tả </th>
                <th class="sort text-center" data-sort="cre">Thứ tự</th>
                <th class="sort text-center" data-sort="publish">Trạng thái</th>
                <th class="sort text-end" data-sort="action" style="width:100px">Thao tác</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">

            <tr>
                <th scope="row">
                    <div class="form-check">
                        <input class="form-check-input checkbox-item" type="checkbox" name="checkbox-item[]" value="2">
                    </div>
                </th>
                <td class="customer_single_td" style="">
                    <img src="/userfiles/image/post/eventfashion.jpg" alt="" class="object-fit-contain me-2 text-start bg-light rounded-2" width="120px" height="80px">
                    <div style="line-height: 2.2rem">
                        <div>
                            <span class="fw-medium fz-16">ddddddddddddddddddd</span>
                        </div>
                        <div>
                            <div>
                                <span>Danh mục:
                                    <strong><a href="http://127.0.0.1:8000/post/catalogue/index" class="text-danger pe-2">DANG TU</a></strong>
                                </span>
                            </div>

                        </div>
                    </div>
                </td>

                <td class="cre text-center">Theo ádfasdfas</td>
                <td class="status text-center">
                    <span class="badge bg-success-subtle text-success text-uppercase p-2">Hiển Thị</span>
                </td>
                <td>
                    <div class="dropdown text-end">
                        <a href="#" role="button" id="dropdownMenuLink5" data-bs-toggle="dropdown" aria-expanded="false" class="">
                            <i class="ri-more-2-fill fs-5"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink5" style="">

                            <li><a class="dropdown-item text-info" href="{{ route("home-components.update_index",['id'=>1]) }}"> <i class="ri-edit-box-line"></i>
                                    Chỉnh sửa</a></li>

                            <li><a class="dropdown-item text-danger" href="{{ route("home-components.delete",['id'=>1]) }}"><i class="ri-delete-bin-line"></i>
                                    Xóa</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
{{-- pagination  --}}