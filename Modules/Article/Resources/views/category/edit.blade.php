@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'角色管理'])
        @slot('nav')
            <li class="nav-item"><a href="/article/category" class="nav-link ">栏目管理</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">添加栏目</a></li>
        @endslot
        @slot('body')
            <form action="/article/category/{{$category['id']}}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">栏目名称</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input id="inputText3" type="text" class="form-control form-control-sm" name="name" value="{{$category['name']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right">父级栏目</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select name="pid" id="" class="form-control form-control-xs">
                                <option value="0">顶级栏目</option>
                                @foreach($categories as $category)
                                    <option value="{{$category['id']}}" {{!empty($category['_selected'])?'selected':''}} {{!empty($category['_disabled'])?'disabled':''}}>{!! $category['_name'] !!}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputText3" class="col-12 col-sm-3 col-form-label text-sm-right"></label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <button class="btn btn-primary">保存提交</button>
                        </div>
                    </div>

                 </div>

            </form>
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function delCategory(id,bt) {
            if(confirm('确认删除栏目吗？')){
                $(bt).next('form').trigger('submit');
            }

        }
    </script>
@endsection

