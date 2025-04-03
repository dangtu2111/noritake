
@if (!empty($emails))
<div class="table-responsive table-card mt-3 mb-1">
    <table class="table align-middle table-nowrap" id="contactTable">
        <thead class="table-light">
            <tr>
                <th class="sort text-center" style="width: 100px">ID</th>

                <th class="sort text-center" style="width: 200px">Tên</th>
                <th class="sort text-center" >Email</th>
                <th class="sort text-center" style="width: 150px">Ngày gửi</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @if ($emails->count() > 0)
                @foreach ($emails as $email)
                    <tr>
                    <td class="text-center">
                            <span class="fz-14">#00{{ $email->id }}</span>
                        </td>
                        <td class="text-center">
                            
                                <span class="fz-14">{{ $email->name }}</span>
                           
                        </td>
                        <td class="text-center">
                            <span class="fz-14">{{ $email->email }}</span>
                        </td>
                     
              
                        <td class="text-center">
                            <span class="fz-14">{{ $email->created_at->format('d-m-Y H:i') }}</span>
                        </td>
                      
                    </tr>
                                
              
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">Không có yêu cầu nào.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

{{-- pagination --}}
<div class="container-fluid">
    {{ $emails->onEachSide(3)->links('pagination::bootstrap-5') }}
</div>


@endif
