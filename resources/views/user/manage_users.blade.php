@extends('layouts.app')

@section('content')

    <!-- Debug styles -->
<link href="../../public/css/main.css" rel="stylesheet">
<link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->
<?php
    use Illuminate\Support\Facades\Input;
    use Illuminate\Http\Request;

    if (Auth::check()) { //check if user is logged in
    $DBRegisterRequests = DB::table('register_requests')->get();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Меню</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="DashboardLink">
                            <a href="/home" style="text-decoration: none;">
                                <p class="text-center">Личный кpабинет</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="DashboardLink">
                            <a href="/main_page" style="text-decoration: none;">
                                <p class="text-center">Заявки</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Добавить заявку</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr class="Title text-center">
                            <td>Логин</td>
                            <td>Email</td>
                            <td>Статус заявки</td>
                            <td></td>
                        </tr>
                        @foreach($DBRegisterRequests as $RegisterRequests)
                            <tr class="Content text-center">
                                <td>{{ $RegisterRequests->login }}</td>
                                <td>{{ $RegisterRequests->email }}</td>
                                <td>
                                    @switch( $RegisterRequests->request_status )
                                        @case("waiting")
                                            <div>Ожидает решения</div>
                                        @breakswitch
                                        @case("allowed")
                                            <div>Одобрено</div>
                                        @breakswitch
                                        @case("disallowed")
                                            <div>Отказано</div>
                                        @breakswitch
                                        @default
                                            <div>???</div>
                                        @breakswitch
                                    @endswitch
                                </td>
                                <td>
                                    @switch( $RegisterRequests->request_status )
                                        @case("waiting")
                                            <nav aria-label="Page navigation">
                                                <div class="text-center">
                                                    <ul class="pagination" style="margin-top: 0px;">
                                                        <li><a href="register_request_edited?Id={{ $RegisterRequests->id }}&Action=1">Одобрить</a></li>
                                                        <li><a href="register_request_edited?Id={{ $RegisterRequests->id }}&Action=0">Отказать</a></li>
                                                    </ul>
                                                </div>
                                            </nav>
                                        @breakswitch
                                        @default
                                        @breakswitch
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
@endsection
