<div class="table-responsive table-card mt-3 mb-1">
    <table class="table align-middle table-nowrap" id="customerTable">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width: 50px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="check-all">
                    </div>
                </th>
                <th class="sort" data-sort="name">Tên thành phần</th>
                <th class="sort text-center" data-sort="order">Thứ tự</th>
                <th class="sort text-center" data-sort="status">Trạng thái</th>
                <th class="sort text-end" data-sort="action" style="width:100px">Thao tác</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @if(isset($components) && count($components) > 0)
                @foreach($components as $key => $component)
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input checkbox-item" 
                                       type="checkbox" 
                                       name="checkbox-item[]" 
                                       value="{{ $component->id }}">
                            </div>
                        </th>
                        <td class="component-info">
                            <div class="d-flex align-items-center">
                                <!-- <img src="{{ $component->image ?? '/userfiles/image/post/eventfashion.jpg' }}" 
                                     alt="{{ htmlspecialchars($component->name ?? '') }}" 
                                     class="object-fit-contain me-2 bg-light rounded-2" 
                                     style="width: 120px; height: 80px;"> -->
                                <div>
                                    <span class="fw-medium fs-16">{{ htmlspecialchars($component->name ?? '') }}</span>
                                    <div class="mt-1">
                                        <span>Type: 
                                            <strong class="text-danger">{{ htmlspecialchars($component->type ?? '') }}</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <!-- <td class="description text-center">
                            @if(is_array($component->props))
                                @if(!empty($component->props))
                                    <ul class="list-unstyled mb-0">
                                        @foreach($component->props as $key => $value)
                                            <li>
                                                <strong>{{ htmlspecialchars($key) }}:</strong> 
                                                @if(is_array($value))
                                                    {{ htmlspecialchars(json_encode($value)) }}
                                                @else
                                                    {{ htmlspecialchars($value ?? '') }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>Không có dữ liệu</span>
                                @endif
                            @else
                                {{ htmlspecialchars($component->props ?? '') }}
                            @endif
                        </td> -->
                        <td class="order text-center">{{ $component->order ?? ($key + 1) }}</td>
                        <td class="status text-center">
                            <span class="badge {{ $component->active ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} text-uppercase p-2">
                                {{ $component->active ? 'Hiển thị' : 'Ẩn' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="dropdown">
                                <a href="#" 
                                   role="button" 
                                   data-bs-toggle="dropdown" 
                                   aria-expanded="false">
                                    <i class="ri-more-2-fill fs-5"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item text-info" 
                                           href="{{ route('home-components.update_index', ['id' => $component->id]) }}">
                                            <i class="ri-edit-box-line me-1"></i> Chỉnh sửa
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger" 
                                           href="{{ route('home-components.delete', ['id' => $component->id]) }}">
                                            <i class="ri-delete-bin-line me-1"></i> Xóa
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Không có dữ liệu</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>