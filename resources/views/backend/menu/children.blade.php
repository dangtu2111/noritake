@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Quản lý menu con của: {{ $parentMenu->name }}</h2>

                        <a href="{{ route('menu.index') }}" class="btn btn-secondary mb-3">Quay lại danh sách
                            Menu</a>
                    </div>
                    <form action="{{ route('menu.save.children') }}" method="POST">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $parentMenu->id }}">

                        <table class="table table-bordered" id="menuTable">
                            <thead>
                                <tr>
                                    <th>Tên Menu</th>
                                    <th>Slug</th>
                                    <th>Thứ tự</th>
                                    <th>Type</th>
                                    <th>Xuất bản</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subMenus as $menu)
                                <tr>
                                    <td>
                                        <input type="hidden" name="menu[id][]" value="{{ $menu->id }}">
                                        <input type="text" name="menu[name][]" class="form-control" required
                                            value="{{ $menu->name }}">
                                    </td>
                                    <td>
                                        <input type="text" name="menu[slug][]" class="form-control"
                                            placeholder="Tùy chọn" value="{{ $menu->slug }}">
                                    </td>
                                    <td>
                                        <input type="number" name="menu[order][]" class="form-control"
                                            placeholder="Thứ tự" value="{{ $menu->order }}">
                                    </td>
                                    <td>
                                        <input type="text" name="menu[type][]" class="form-control"
                                            placeholder="Tùy chọn" value="{{ $menu->type }}">
                                    </td>
                                    <td>
                                        <select name="menu[publish][]" class="form-control">
                                            <option value="1" {{ $menu->publish ? 'selected' : '' }}>Xuất bản
                                            </option>
                                            <option value="0" {{ !$menu->publish ? 'selected' : '' }}>Không xuất
                                                bản</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger removeRow">Xóa</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <input type="hidden" name="menu[id][]" value="0">
                                        <input type="text" name="menu[name][]" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="menu[slug][]" class="form-control"
                                            placeholder="Tùy chọn">
                                    </td>
                                    <td>
                                        <input type="number" name="menu[order][]" class="form-control"
                                            placeholder="Thứ tự">
                                    </td>
                                    <td>
                                        <input type="text" name="menu[type][]" class="form-control"
                                            placeholder="Tùy chọn">
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
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <button type="button" id="addRow" class="btn btn-secondary">Thêm dòng</button>
                            <button type="submit" class="btn btn-primary">Lưu Menu Con</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var addRowButton = document.getElementById('addRow');
    if (addRowButton) {
        addRowButton.addEventListener('click', function() {
            var tableBody = document.querySelector('#menuTable tbody');
            if (tableBody && tableBody.rows.length > 0) {
                var newRow = tableBody.rows[0].cloneNode(true);
                newRow.querySelectorAll('input').forEach(input => input.value = input.type ===
                    'hidden' ? 0 : '');
                newRow.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
                tableBody.appendChild(newRow);
            }
        });
    }

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