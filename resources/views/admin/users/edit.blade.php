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

                        <h4>
                            @if(isset($user))
                                Редактирование данных клиента {{$user->name}}
                            @else
                                Добавление нового клиента
                            @endif
                        </h4>

                        <form method="post"
                              @if(isset($user))
                              action = "{{route('admin.store',['id'=>$user->id])}}"
                              @else
                              action = "{{route('admin.store')}}"
                                @endif
                        >
                            {{csrf_field()}}
                            <p>name <input name="name" value = "@if(isset($user)){{$user->name}}@endif"/> </p>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $err)
                                <span class="help-block">
                                        <strong>{{ $err }}</strong>
                                    </span>
                                @endforeach
                            @endif
                            <p>email <input name="email" value = "@if(isset($user)){{$user->email}}@endif"/></p>
                            @if ($errors->has('email'))
                                @foreach($errors->get('email') as $err)
                                <span class="help-block">
                                        <strong>{{ $err }}</strong>
                                    </span>
                                @endforeach
                            @endif
                            <p>role <input name="role" value = "@if(isset($user)){{$user->role}}@endif"/></p>
                            <p>password <input name="password" type="password" value = ""/></p>
                            @if ($errors->has('password'))
                                @foreach($errors->get('password') as $err)
                                    <span class="help-block">
                                        <strong>{{ $err }}</strong>
                                    </span>
                                @endforeach
                            @endif
                            <button class="btn btn-success" type = "submit">save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
