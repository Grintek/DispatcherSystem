@extends('layouts.app')

@section('content')
    <!-- Debug styles -->
    <link href="../../public/css/main.css" rel="stylesheet">
    <link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->
    <?php
    use Illuminate\Support\Facades\Input;
    if (Auth::check()) { //check if user is logged in
    $ItemDBData = DB::table('stock')->where('id', Input::get('id'))->get();
    ?>
    @foreach($ItemDBData as $ItemData)
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
                        <div class="row">
                            <div class="DashboardLink">
                                <a href="/stock" style="text-decoration: none;">
                                    <p class="text-center">Склад</p>
                                </a>
                                <div class="TextBar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление товара на склад:</div>
                    <div class="panel-body">
                        <div class="StockEditItemAmountContent">
                            <p>Наименование: {{ $ItemData->name }}</p>
                            <p>Сейчас на складе: {{ $ItemData->amount_left }}</p>
                            <p>На сколько пополнить (шт.)?:</p>
                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="stock_supply_added?id={{$ItemData->id}}">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="row FormPart">
                                <div class="form-group">
                                    <div class="col-lg-8 col-md-10 col-xs-10 col-lg-offset-2 col-md-offset-1 col-xs-offset-1">
                                        <input type="text" class="form-control" name="new_amount" placeholder="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row FormPart">
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-3 col-xs-1"></div>
                                    <div class="col-lg-4 col-md-6 col-xs-10">
                                        <button type="submit" class="btn btn-primary center-block">
                                            Пополнить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
@endsection
