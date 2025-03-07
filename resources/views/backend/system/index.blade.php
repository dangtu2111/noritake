<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('system.store')}}" method="post" class="box">
                    @csrf
                    <div class="wrapper wrapper-content aminated fadeInRight">
                        @foreach($systemConfig as $key => $val)
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <h4>{{$val['label']}}</h4>
                                    </div>
                                    <div class="panel-decsription">
                                        {{$val['description']}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="ibox">
                                    @if(count($val['value']))
                                    <div class="ibox-content">
                                        @foreach($val['value'] as $keyVal => $item)
                                        @php
                                        $name=$key.'_'.$keyVal;
                                        @endphp
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <label class="d-flex justify-content-between">
                                                        <span>{{$item['label']}}</span>
                                                        <span>{!! renderSystemLink($item) !!}</span>
                                                    </label>
                                                    {!! renderSystemTitle($item) !!}

                                                    @switch($item['type'])
                                                    @case('text')
                                                    {!!renderSystemInput($name, $systems)!!}
                                                    @break
                                                    @case('image')
                                                    {!!renderSystemImage($name, $systems)!!}
                                                    @break
                                                    @case('textarea')
                                                    {!!renderSystemTextarea($name, $systems)!!}
                                                    @break
                                                    @case('select')
                                                    {!!renderSystemSelect($item,$name, $systems)!!}
                                                    @break
                                                    @endswitch
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit" name="send">Lưu lại</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>