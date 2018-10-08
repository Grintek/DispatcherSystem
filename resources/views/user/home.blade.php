@extends('layouts.app')

@section('content')
    <!-- Debug styles -->
<link href="../../public/css/main.css" rel="stylesheet">
<link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->

<?php
    if (Auth::check()) { //check if user is logged in
    $DBUser = DB::table('users')->where('id', Auth::id())->get();
?>
    @foreach($DBUser as $UserData)
    @endforeach
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Личный кабинет</div>

                <div class="panel-body">
                    <p class="text-center">Добро пожаловать в диспетчерскую систему %project name%</p>
                    <div class="row">
                        <div class="col-xs-1 col-md-2"></div>
                        <div class="col-xs-10 col-md-8 DashboardLink">
                            <a href="/main_page" style="text-decoration: none;">
                                <p class="text-center">Заявки</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                        <div class="col-xs-1 col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1 col-md-2"></div>
                        <div class="col-xs-10 col-md-8 DashboardLink">
                            <a href="/stock" style="text-decoration: none;">
                                <p class="text-center">Склад</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                        <div class="col-xs-1 col-md-2"></div>
                    </div>
                    @if ($UserData->name === "admin")
                        <div class="row">
                            <div class="col-xs-1 col-md-2"></div>
                            <div class="col-xs-10 col-md-8 DashboardLink">
                                <a href="/manage_users" style="text-decoration: none;">
                                    <p class="text-center">Пользователи</p>
                                </a>
                                <div class="TextBar"></div>
                            </div>
                            <div class="col-xs-1 col-md-2"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
@endsection
