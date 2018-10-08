@extends('layouts.app')

@section('content')
    <!-- Debug styles -->
    <link href="../../public/css/main.css" rel="stylesheet">
    <link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->
    <?php
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Input;
    if (Auth::check()) { //check if user is logged in
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Личный кабинет</div>

                    <div class="panel-body">
                        <p class="text-center">Заявка добавлена</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        /*todo это полное говно?! В общем, тебе нужно создать под то что ты хочешь получить модели
        todo и потом уже что то получать, во вью должно передаться только уже сами полученные значения,а не партянка и лучше в виде объекта(ов)*/
        $CurrentDate = date('d-m-Y');
        DB::table('requests_data')->insert(
            array(
                'create_data' => $CurrentDate,
                'problem_description' => ''
            )
        );
        $NewRequestId = DB::table('requests_data')->max('id');
    ?>
    <meta http-equiv="refresh" content="0; url=edit_request?id=<?php echo $NewRequestId; ?>" />
    <?php
    }
    ?>
@endsection
