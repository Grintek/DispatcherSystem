@extends('layouts.app')

@section('content')
    <!-- Debug styles -->
    <link href="../../public/css/main.css" rel="stylesheet">
    <link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->
    <?php
        use Illuminate\Support\Facades\Input;
    ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Подача заявки на регистрацию</div>
                <div class="panel-body"></div>
                <p class="text-center"><b>Спасибо! Ваша заявка на регистрацию успешно подана</b></p>
                <p class="text-center"><b>После одобрения заявки вам на почту будет отправлено письмо с дальнейшими инструкциями.</b></p>
                <div class="row">
                    <div class="col-xs-1 col-md-2"></div>
                    <div class="col-xs-10 col-md-8 DashboardLink">
                        <a href="/" style="text-decoration: none;">
                            <p class="text-center">На главную</p>
                        </a>
                        <div class="TextBar"></div>
                    </div>
                    <div class="col-xs-1 col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    if (Input::has('login'))  {
        DB::table('register_requests')->insert(
            array(
                'login' =>  Input::get('login', ' '),
                'email' =>  Input::get('email', ' '),
            )
        );
    }
    ?>
@endsection