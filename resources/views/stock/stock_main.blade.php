@extends('layouts.app')

@section('content')
    <!-- Debug styles -->
    <link href="../../public/css/main.css" rel="stylesheet">
    <link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->
    <?php
    if (Auth::check()) { //check if user is logged in
    $StockData = DB::table('stock')->get();
    $DBUser = DB::table('users')->where('id', Auth::id())->get();
    ?>
    @foreach($DBUser as $UserData)
    @endforeach
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-xs-12">
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
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-md-10 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Склад</div>
                    <div class="panel-body">
                        <div class="MainPageContent">
                            <p class="text-center">Список наименований:</p>
                            <table class="table table-striped">
                                <tr class="Title">
                                    <td>наименование</td>
                                    <td>цвет, определение</td>
                                    <td>размер, ед. измерения</td>
                                    <td>количество в остатке</td>
                                    <td>поставки</td>
                                    <td>списания</td>
                                    <td>АЛЯРМ пункт</td>
                                </tr>
                                @foreach( $StockData as $RequestDBData )
                                    <?php
                                        $SupplyLinkTarget = "/stock_supply?id=$RequestDBData->id";
                                        $WriteOffLinkTarget = "/stock_write_off?id=$RequestDBData->id";
                                        $NewSupplyLinkTarget = "/stock_new_supply?id=$RequestDBData->id";
                                        $NewWriteOffLinkTarget = "/stock_new_write_off?id=$RequestDBData->id";
                                    ?>
                                    <tr class="StockTable Content">
                                        <td><a style="text-decoration: none;">{{$RequestDBData->name}}</a></td>
                                        <td><a style="text-decoration: none;">{{$RequestDBData->color_definition}}</a></td>
                                        <td><a style="text-decoration: none;">{{$RequestDBData->measure}}</a></td>
                                        <td>
                                            <a href="{{ $NewSupplyLinkTarget }}">
                                                <button type="button" class="btn btn-success">+</button>
                                            </a>
                                            <pF class="AmountLabel">{{$RequestDBData->amount_left}} шт.</pF>
                                            <a href="{{ $NewWriteOffLinkTarget }}">
                                                <button type="button" class="btn btn-danger">-</button>
                                            </a>
                                        </td>
                                        <td><a href="{{ $SupplyLinkTarget }}" style="text-decoration: none;">{{$RequestDBData->last_supply}}</a></td>
                                        <td><a href="{{ $WriteOffLinkTarget }}" style="text-decoration: none;">{{$RequestDBData->last_write_off}}</a></td>
                                        <td><a style="text-decoration: none;">{{$RequestDBData->new_supply_limit}} шт.</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            <div style="text-align: center;">
                                <a href="/stock_add_item">
                                    <button type="button" class="btn btn-success">Добавить</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
@endsection
