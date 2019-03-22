@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Личный кабинет
                    <div style="margin: 15px  0 0px 650px; display:block; position:fixed;">
                        <a href="{{route('admin.index')}}">Admin</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Добро пожаловать {{$name}}! <br>
                        <table class = "table table-bordered">
                            <tr>
                                <td>id </td>
                                <td>name </td>
                                <td>avatar</td>
                                <td>email </td>
                                <td>register</td>
                                <td>edit</td>
                            </tr>
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}} </td>
                                <td><img src="{{$user->desktop_image}}"></td>
                                <td>{{$user->email}} </td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                <a href="{{route('cabinet.user.edit', ['name'=>$user->name])}}">edit</a>
                                </td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
