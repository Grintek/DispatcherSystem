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
                <div class="panel-heading">Статус обновления заявки на регистрацию</div>

                <div class="panel-body">
                    <p class="text-center">Статус заявки успешно обновлен. Переадресация...</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
        if (Input::has('Id') && Input::has('Action') == "ff" )  {
            switch (Input::get('Action')) {
                case "1":
                    $RegisterRequestDBData = DB::table('register_requests')->where('id', Input::get('Id'))->get();
                    ?>
                    @foreach($RegisterRequestDBData as $RegisterRequestData)
                    @endforeach
                    <?php
                    if ($RegisterRequestData->request_status == "waiting") {
                        $UserPassword = str_random(rand(6,14));
                        DB::table('users')->insert(
                            array(
                                'name' =>       $RegisterRequestData->login,
                                'email' =>      $RegisterRequestData->email,
                                'password' =>   bcrypt($UserPassword),
                            )
                        );
                        DB::table('register_requests')->where('id', Input::get('Id'))->update(['request_status' => 'allowed']);

                        $UserLogin = $RegisterRequestData->login;
                        Mail::send('emails.register_allowed', ['UserLogin' => $UserLogin, 'UserPassword' => $UserPassword], function ($Message) {
                            $Message->subject('Вам был дан доступ к %DispatcherSystem%');
                            $Message->from('riseupcrm@gmail.com', 'RiseUP CRM');
                            $Message->to('mxss1998@yandex.ru');
                        });
                    }
                break;
                case "0":
                    DB::table('register_requests')->where('id', Input::get('Id'))->update(['request_status' => 'disallowed']);
                break;
            }
        }
    ?>
    <meta http-equiv="refresh" content="0; url=manage_users" />
<?php
    }
?>
@endsection
