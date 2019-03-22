@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Личный кабинет</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                         <h4>
                             Редактирование данных {{$user->name}}
                         </h4>

                        <form method="post" enctype="multipart/form-data"
                              action = "{{route('cabinet.user.save',['id'=>$user->id])}}" >

                            {{csrf_field()}}
                            <p>name     <input name="name" value = "{{$user->name}}"/> </p>
                            @if ($errors->has('name'))
                                @foreach($errors->get('name') as $err)
                                <span class="help-block">
                                        <strong>{{ $err }}</strong>
                                    </span>
                                @endforeach
                            @endif
                            <p>email    <input name="email" value = "{{$user->email}}"/> </p>
                            @if ($errors->has('email'))
                                @foreach($errors->get('email') as $err)
                                <span class="help-block">
                                        <strong>{{ $err }}</strong>
                                    </span>
                                @endforeach
                            @endif
                            <p>password <input name="password"  value = "{{$user->password}}"/></p>
                            @if ($errors->has('password'))
                                @foreach($errors->get('password') as $err)
                                    <span class="help-block">
                                        <strong>{{ $err }}</strong>
                                    </span>
                                @endforeach
                            @endif
                            <div class="form-group">
                                <label for="img">Выберите файл</label>
                                <input id="img" type="file" multiple name="file[]">
                            </div>
                            <button class="btn btn-success" type = "submit">save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
