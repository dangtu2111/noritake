<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th style="width: 200px;">Tên</th>
            <td>{{ $contact->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $contact->email }}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{ $contact->phone ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Thời gian gửi</th>
            <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
    <th>Nội dung</th>
    <td>
        <textarea class="form-control" rows="6" readonly style="width: 100%; resize: vertical;">{{ $contact->body }}</textarea>
    </td>
</tr>

    </table>
</div>

<div class="text-end">
    <form action="{{ route('contact.delete', $contact->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>
</div>
