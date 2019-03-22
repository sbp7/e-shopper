@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Панель администратора</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>Список клиентов</h4>

                       <a href="{{route('admin.create')}}">create_new_client</a>
                        <br>
                        <table class = "table table-bordered">
                            <tr>
                                <td>id </td>
                                <td>name </td>

                                <td>email </td>
                                <td>role</td>
                                <td>register</td>
                                <td>edit</td>
                                <td>delete</td>
                            </tr>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}} </td>

                                    <td>{{$user->email}} </td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.edit', ['id'=>$user->id])}}">edit</a>
                                    </td>
                                    <td>
                                        <form method = "post" action="{{route('admin.remove', ['id'=>$user->id])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="delete"/>
                                            <button type="submit">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
