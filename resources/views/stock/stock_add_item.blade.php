@extends('layouts.app')

@section('content')
    <!-- Debug styles -->
    <link href="../../public/css/main.css" rel="stylesheet">
    <link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->
    <?php
    use Illuminate\Support\Facades\Input;
    if (Auth::check()) { //check if user is logged in
    $StockItemData = DB::table('stock')->where('id', Auth::id())->get();
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-12">
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
                        <div class="row" style="height: 2vh;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавление товара на склад</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="stock_item_added">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="row FormPart">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-2 col-xs-12 control-label">Наименование</label>
                                    <div class="col-xs-1"></div>
                                    <div class="col-lg-1 col-md-1"></div>
                                    <div class="col-lg-9 col-md-9 col-xs-10">
                                        <input type="text" class="form-control" name="name" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row FormPart">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-2 col-xs-12 control-label">Цвет, определение</label>
                                    <div class="col-xs-1"></div>
                                    <div class="col-lg-1 col-md-1"></div>
                                    <div class="col-lg-9 col-md-9 col-xs-10">
                                        <input type="text" class="form-control" name="color_definition" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row FormPart">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-2 col-xs-12 control-label">Размер, ед. измерения</label>
                                    <div class="col-xs-1"></div>
                                    <div class="col-lg-1 col-md-1"></div>
                                    <div class="col-lg-9 col-md-9 col-xs-10">
                                        <input type="text" class="form-control" name="measure" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row FormPart">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-2 col-xs-12 control-label">Примечание</label>
                                    <div class="col-xs-1"></div>
                                    <div class="col-lg-1 col-md-1"></div>
                                    <div class="col-lg-9 col-md-9 col-xs-10">
                                        <input type="text" class="form-control" name="comment" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row FormPart">
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-3 col-xs-1"></div>
                                    <div class="col-lg-4 col-md-6 col-xs-10">
                                        <button type="submit" class="btn btn-primary center-block">
                                            Добавить
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
