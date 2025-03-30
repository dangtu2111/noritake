<form action="{{ route('contact.index') }}" method="GET" id="filterForm">
    <div class="row g-4 mb-3 fz-12 text-muted">
        @php
            $perpage = request('perpage') ?: old('perpage');
        @endphp
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box ms-2">
                    <div class="input-group mb-3">
                        <button type="submit" class="ri-search-line search-icon btn btn-primary text-light z-3" id="button-addon1"></button>
                        <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword') }}"
                            class="form-control search z-1 ps-5 text-muted" placeholder="Tìm kiếm tên, email, điện thoại, v.v.." aria-describedby="button-addon1">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-auto">
            <div class="d-flex">
                <div class="record ms-2">
                    <select name="perpage" class="form-control setUpSelect2" style="width: 280px"
                        onchange="document.getElementById('filterForm').submit();">
                        @for ($i = 5; $i <= 100; $i += 5)
                            <option {{ request('perpage', 10) == $i ? 'selected' : '' }} value="{{ $i }}">
                                {{ $i }} bản ghi</option>
                        @endfor
                    </select>
                </div>
            </div>
         </div>
    </div>
</form>
