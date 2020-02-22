@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'角色管理'])
        @slot('nav')
            <li class="nav-item"><a href="#home" class="nav-link active">角色列表</a></li>
            <li class="nav-item"><a href="#profile" data-toggle="modal" data-target="#form-bp1" class="nav-link">添加角色</a></li>
            @component('components.modal',['id'=>'form-bp1','title'=>'添加角色','url'=>'/admin/role'])
                <div class="form-group">
                    <label>角色名称</label>
                    <input type="text" placeholder="输入中文角色名" class="form-control" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label>角色标识</label>
                    <input type="text" placeholder="角色标识" class="form-control" name="name" value="{{old('name')}}">
                </div>
            @endcomponent
        @endslot
        @slot('body')
            <table class="table">
                <thead>
                <tr>
                    <th style="width:10%;">编号</th>
                    <th style="width:30%;">角色名称</th>
                    <th class="">角色标识</th>
                    <th class="number">创建时间</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role['id']}}</td>
                        <td>{{$role['title']}}</td>
                        <td class="">{{$role['name']}}</td>
                        <td class="number">{{$role['created_at']}}</td>
                        <td class="actions">
                            <div class="btn-group btn-space">
                                <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#editRole{{$role['id']}}">编辑</button>
                                <a  class="btn btn-secondary" href="/admin/role/permission/{{$role['id']}}">权限</a>
                                <button type="button" class="btn btn-secondary" onclick="delRole({{$role['id']}},this)">删除</button>
                                <form action="/admin/role/{{$role['id']}}" hidden method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                            @component('components.modal',['id'=>"editRole{$role['id']}",'title'=>"编辑角色{$role['title']}",'method'=>'PUT','url'=>"/admin/role/{$role['id']}"])
                                <div class="form-group text-left">
                                    <label>角色名称</label>
                                    <input type="text" placeholder="输入中文角色名" class="form-control" name="title" value="{{$role['title']}}">
                                </div>
                                <div class="form-group text-left">
                                    <label>角色标识</label>
                                    <input type="text" placeholder="角色标识" class="form-control" name="name" value="{{$role['name']}}">
                                </div>
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function delRole(id,bt) {
            if(confirm('确认删除角色吗？')){
                $(bt).next('form').trigger('submit');
            }

        }
    </script>
@endsection

