@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Отправить письмо от:</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form id="contactform" action="" method="post">
                            {{ csrf_field() }}
                            <div id="sendmessage">
                                Ваше сообщение отправлено!
                            </div>
                            <div id="senderror">
                                При отправке сообщения произошла ошибка.
                            </div>


                            <p>
                               Имя:<input type="text" name="name" placeholder="Имя" required>
                               Email:<input type="text" name="email" placeholder="Email" required>
                               Тема:<input type="text" name="subject" placeholder="" required>
                            </p>
                            <b>Текст письма</b>
                            <p> <textarea name="message" required></textarea> </p>
                            <p>* Все поля обязательные для заполнения.</p>

                            <input type="submit" value="Отправить">

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/letter.js') }}"></script>
@endsection