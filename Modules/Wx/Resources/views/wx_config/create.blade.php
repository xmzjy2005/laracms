@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">微信管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/wx/wx_config" class="nav-link">微信列表</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">添加微信</a></li>
        </ul>
        <form action="/wx/wx_config" method="post">
            <div class="card-body card-body-contrast">
                @csrf
                <div class="form-group row">
    <label for="name" class="col-12 col-sm-3 col-form-label text-md-right">配置名</label>
    <div class="col-12 col-md-9">
        <input id="name" name="name" type="text"
               value="{{ $wx_config['name']??old('name') }}"
               class="form-control form-control-sm form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="value" class="col-12 col-sm-3 col-form-label text-md-right">配置项</label>
    <div class="col-12 col-md-9">
        <input id="value" name="value" type="text"
               value="{{ $wx_config['value']??old('value') }}"
               class="form-control form-control-sm form-control{{ $errors->has('value') ? ' is-invalid' : '' }}">
        @if ($errors->has('value'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('value') }}</strong>
            </span>
        @endif
    </div>
</div>

            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存提交</button>
            </div>
        </form>
    </div>
@endsection
