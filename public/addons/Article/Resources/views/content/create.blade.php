@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">文章管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/article/content" class="nav-link">文章列表</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">添加文章</a></li>
        </ul>
        <form action="/article/content" method="post">
            <div class="card-body card-body-contrast">
                @csrf
                <div class="row">
                    <div class="col-sm-4 border bg-ligth">
                        <div class="form-group row">
                            <label for="title" class="col-12 col-sm-3 col-form-label text-md-right">标题</label>
                            <div class="col-12 col-md-9">
                                <input id="title" name="title" type="text"
                                       value="{{ $content['title']??old('title') }}"
                                       class="form-control form-control-sm form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-12 col-sm-3 col-form-label text-md-right">栏目</label>
                            <div class="col-12 col-md-9">
                                <select name="category_id" class="form-control-xs">
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-12 col-sm-3 col-form-label text-md-right">作者</label>
                            <div class="col-12 col-md-9">
                                <input id="author" name="author" type="text"
                                       value="{{ $content['author']??old('author') }}"
                                       class="form-control form-control-sm form-control{{ $errors->has('author') ? ' is-invalid' : '' }}">
                                @if ($errors->has('author'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('author') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="thumb" class="col-12 col-sm-3 col-form-label text-md-right">缩略图</label>
                            <div class="col-12 col-lg-9">
                                <input type="text" name="thumb" hidden value="{!! $content['thumb']??old('thumb') !!}">
                                <img src="{{asset('image/default_img.jpeg')}}" alt="" onclick="upImagePc()" class="img-fluid" style="width: 50px">
                                <script>
                                    require(['hdjs','bootstrap']);
                                    //上传图片
                                    function upImagePc() {
                                        require(['hdjs'], function (hdjs) {

                                            hdjs.image(function (images) {
                                                //上传成功的图片，数组类型
                                                $("[name='thumb']").val(images[0]);
                                                $(".img-fluid").attr('src', images[0]);
                                            })
                                        });
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="click" class="col-12 col-sm-3 col-form-label text-md-right">查看次数</label>
                            <div class="col-12 col-md-9">
                                <input id="click" name="click" type="number"
                                       value="0"
                                       class="form-control form-control-sm form-control{{ $errors->has('click') ? ' is-invalid' : '' }}">
                                @if ($errors->has('click'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('click') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="istop" class="col-12 col-sm-3 col-form-label text-md-right" style="padding-top:initial;">置顶</label>
                            <div class="col-12 col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="istop" value="1"
                                           id="istop-1">
                                    <label class="form-check-label" for="istop-1">是</label>
                                </div>            <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                           name="istop" value="2"
                                           checked
                                           id="istop-2">
                                    <label class="form-check-label" for="istop-2">否</label>
                                </div>
                                <br>
                                @if ($errors->has('istop'))
                                    <span class="text-danger">
                                <strong>{{ $errors->first('istop') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group row pt-0">

                                <div class="col-12">
                                    <textarea id="container" name="content" style="height:300px;width:100%;">{{ $content['content']??old('content') }}</textarea>
                                    <script>
                                        require(['hdjs'], function (hdjs) {
                                            hdjs.ueditor('container', {hash: 2, data: 'hd'}, function (editor) {
                                                console.log('编辑器执行后的回调方法1')
                                            });
                                            console.log(1);
                                        })
                                    </script>
                                </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存提交</button>
            </div>
        </form>
    </div>
@endsection
