@extends('layouts.app')

@section('content')
    <!-- Debug styles -->
    <link href="../../public/css/main.css" rel="stylesheet">
    <link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->
    <?php
    use Illuminate\Support\Facades\Input;
    if (Auth::check()) { //check if user is logged in
    $StockActionsDBData = DB::table('stock_actions')->get();
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
                    <div class="panel-heading">Склад</div>
                    <div class="panel-body">
                        <div class="MainPageContent">
                            <p class="text-center">Списания наименования {{ $ItemData->name }}:</p>
                            <table class="table table-striped">
                                <tr class="Title">
                                    <td>дата</td>
                                    <td>кол-во (шт.)</td>
                                </tr>
                                @foreach($StockActionsDBData as $StockActionsData)
                                    @if($StockActionsData->item_id == Input::get('id')
                                    && $StockActionsData->type == 'WriteOff')
                                        <tr class="Content">
                                            <td>{{ $StockActionsData->date }}</td>
                                            <td>{{ $StockActionsData->amount }} шт.</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
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
