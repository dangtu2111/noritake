<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('menu.store') }}" method="POST">
                    @csrf
                    <table class="table table-bordered" id="menuTable">
                        <thead>
                            <tr>
                                <th>Tên Menu</th>
                                <th>Slug</th>
                                <th>Menu Cha</th>
                                <th>Thứ tự</th>
                                <th>Type</th>
                                <th>Xuất bản</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- Nếu id = 0 thì là menu mới --}}
                                <td>
                                    <input type="hidden" name="menu[id][]" value="0">
                                    <input type="text" name="menu[name][]" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="menu[slug][]" class="form-control" placeholder="Tùy chọn">
                                </td>
                                <td>
                                    <select name="menu[parent_id][]" class="form-control">
                                        <option value="0">[Root]</option>
                                        @if(isset($parentMenus) && $parentMenus->count())
                                        @foreach($parentMenus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                </td>
                                <td>
                                    <input type="number" name="menu[order][]" class="form-control" placeholder="Thứ tự">
                                </td>
                                <td>
                                    <input type="text" name="menu[type][]" class="form-control" placeholder="Tùy chọn">
                                </td>
                                <td>
                                    <select name="menu[publish][]" class="form-control">
                                        <option value="1" selected>Xuất bản</option>
                                        <option value="0">Không xuất bản</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeRow">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <button type="button" id="addRow" class="btn btn-secondary">Thêm dòng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Thêm dòng mới
    var addRowButton = document.getElementById('addRow');
    if (addRowButton) {
        addRowButton.addEventListener('click', function() {
            var tableBody = document.querySelector('#menuTable tbody');
            if (tableBody && tableBody.rows.length > 0) {
                var newRow = tableBody.rows[0].cloneNode(true);
                // Xóa dữ liệu cũ của dòng được clone
                newRow.querySelectorAll('input').forEach(function(input) {
                    if (input.type === 'hidden') {
                        input.value = 0;
                    } else {
                        input.value = '';
                    }
                });
                newRow.querySelectorAll('select').forEach(function(select) {
                    select.selectedIndex = 0;
                });
                tableBody.appendChild(newRow);
            }
        });
    }

    // Xóa dòng hiện tại (chỉ cho phép nếu có hơn 1 dòng)
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