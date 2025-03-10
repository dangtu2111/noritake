<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="mb-0">Cập nhật Toàn bộ Menu Cha</h2>
                        <a href="{{ route('menu.index') }}" class="btn btn-secondary">Quay lại danh sách Menu</a>
                    </div>
                    <form action="{{ route('menu.update') }}" method="POST">
                        @csrf
                        <table class="table table-bordered table-hover" id="menuTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Menu</th>
                                    <th>Slug</th>
                                    <th>Thứ tự</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parentMenus as $menu)
                                <tr>
                                    <td>
                                        {{ $menu->id }}
                                        <input type="hidden" name="menus[{{ $menu->id }}][id]" value="{{ $menu->id }}">
                                    </td>
                                    <td>
                                        <input type="text" name="menus[{{ $menu->id }}][name]" class="form-control"
                                            value="{{old("menus.{$menu->id}.name", $menu->name) }}" required>
                                    </td>
                                    <td>
                                        <input type="text" name="menus[{{ $menu->id }}][slug]" class="form-control"
                                            placeholder="Nếu để trống, tự tạo từ tên"
                                            value="{{ old("menus.{$menu->id}.slug", $menu->slug) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="menus[{{ $menu->id }}][order]" class="form-control"
                                            value="{{ old("menus.{$menu->id}.order", $menu->order) }}">
                                    </td>
                                    <td>
                                        <select name="menus[{{ $menu->id }}][publish]" class="form-control">
                                            <option value="1"
                                                {{ old("menus.{$menu->id}.publish", $menu->publish) == 1 ? 'selected' : '' }}>
                                                Xuất bản</option>
                                            <option value="0"
                                                {{ old("menus.{$menu->id}.publish", $menu->publish) == 0 ? 'selected' : '' }}>
                                                Không xuất bản</option>
                                        </select>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger removeRow">Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {

    var menuTable = document.querySelector('#menuTable');
    if (menuTable) {
        menuTable.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('removeRow')) {
                var rows = document.querySelectorAll('#menuTable tbody tr');
                if (rows.length > 1) {
                    e.target.closest('tr').remove();
                } else {
                    alert('Phải có ít nhất một dòng menu.');
                }
            }
        });
    }
});
</script>