@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">weixincaidan管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/wx/wxmenu" class="nav-link">weixincaidan列表</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">修改weixincaidan</a></li>
        </ul>
        <form action="/wx/wxmenu/{{$wxmenu['id']}}" method="post">
            <div class="card-body card-body-contrast">
                @csrf @method('PUT')
                <div class="form-group row">
    <label for="data" class="col-12 col-sm-3 col-form-label text-md-right">标题</label>
    <div class="col-12 col-md-9">
        <input id="data" name="data" type="text"
               value="{{ $wxmenu['data']??old('data') }}"
               class="form-control form-control-sm form-control{{ $errors->has('data') ? ' is-invalid' : '' }}">
        @if ($errors->has('data'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('data') }}</strong>
            </span>
        @endif
    </div>
</div>

            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存更新</button>
            </div>
        </form>
    </div>
@endsection
