
<div class="table-responsive table-card mt-3 mb-1">
    <table class="table align-middle table-nowrap" id="contactTable">
        <thead class="table-light">
            <tr>
                <th class="sort">Tên</th>
                <th class="sort text-center" style="width: 200px">Email</th>
                <th class="sort text-center" style="width: 130px">Điện thoại</th>
                <th class="sort text-center">Nội dung</th>
                <th class="sort text-center" style="width: 150px">Ngày gửi</th>
                <th class="sort text-end" style="width: 130px">Thao tác</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @if ($contacts->count() > 0)
                @foreach ($contacts as $contact)
                    <tr>
                        <td class="customer_single_td">
                            <div style="line-height: 2rem">
                                <span class="fw-medium fz-16">{{ $contact->name }}</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="fz-14">{{ $contact->email }}</span>
                        </td>
                        <td class="text-center">
                            <span class="fz-14">{{ $contact->phone ?? 'N/A' }}</span>
                        </td>
                        <td class="text-center">
                            <span class="fz-14">{{ Str::limit($contact->body, 50) }}</span>
                        </td>
                        <td class="text-center">
                            <span class="fz-14">{{ $contact->created_at->format('d-m-Y H:i') }}</span>
                        </td>
                        <td>
                            <div class="dropdown text-end">
                                <a href="#" role="button" id="dropdownMenuLink{{ $contact->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-2-fill fs-5"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $contact->id }}">
                                    <li><a class="dropdown-item text-info" href="{{ route('contact.show', $contact->id) }}">
                                        <i class="ri-eye-line"></i> Xem</a>
                                        </li>
                                        <li>
                                        <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="deleteContact({{ $contact->id }})">
                                            <i class="ri-delete-bin-line"></i> Xóa
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">Không có liên hệ nào.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{-- pagination --}}
<div class="container-fluid">
    {{ $contacts->onEachSide(3)->links('pagination::bootstrap-5') }}
</div>
<!-- Form ẩn -->
<form id="delete-form-{{ $contact->id }}" action="{{ route('contact.delete', $contact->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
    function deleteContact(contactId) {
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            document.getElementById('delete-form-' + contactId).submit();
        }
    }
</script>

