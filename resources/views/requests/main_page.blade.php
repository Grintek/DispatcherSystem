@extends('layouts.app')

@section('content')
    <!-- Debug styles -->
<link href="../../public/css/main.css" rel="stylesheet">
<link href="../../public/css/buttons.css" rel="stylesheet">
    <!-- Debug styles end -->
<?php
    if (Auth::check()) { //check if user is logged in
    $requests_data = DB::table('requests_data')->get();
    $DBUser = DB::table('users')->where('id', Auth::id())->get();
?>
@foreach($DBUser as $UserData)
@endforeach
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
                            <a href="/add_request" style="text-decoration: none;">
                                <p class="text-center">Добавить заявку</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                    <div class="row" style="height: 2vh;">
                    </div>
                    <div class="row">
                        <p class="text-center"><b>Фильтры</b></p>
                    </div>
                    <div class="row">
                        <div class="DashboardLink">
                            <a href="/apply_filters?CurrentFilter=Clear" style="text-decoration: none;">
                                <p class="text-center">Сбросить фильтры</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="DashboardLink">
                            <a href="/apply_filters?CurrentFilter=Active" style="text-decoration: none;">
                                <p class="text-center">Активные</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="DashboardLink">
                            <a href="/apply_filters?CurrentFilter=InProcess" style="text-decoration: none;">
                                <p class="text-center">В работе</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="DashboardLink">
                            <a href="/apply_filters?CurrentFilter=OnControl" style="text-decoration: none;">
                                <p class="text-center">На контроле</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="DashboardLink">
                            <a href="/apply_filters?CurrentFilter=Done" style="text-decoration: none;">
                                <p class="text-center">Выполненные</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="DashboardLink">
                            <a href="/apply_filters?CurrentFilter=Canceled" style="text-decoration: none;">
                                <p class="text-center">Отмененные</p>
                            </a>
                            <div class="TextBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Текущие заявки:</div>
                <div class="panel-body">
                    <div class="MainPageContent">
                        <p class="text-center">Список заявок</p>
                        <table class="table table-striped">
                            <tr class="Title">
                                <td>номер</td>
                                <td>дата составления</td>
                                <td>тип заявки</td>
                                <td>приоритет</td>
                                <td>статус</td>
                                <td>адрес</td>
                                <td>описание проблемы</td>
                                <td>заявитель</td>
                                <td>тип дефекта</td>
                                <td>исполнитель</td>
                                <td>желаемое время</td>
                                <td>вид выполненных работ</td>
                            </tr>
                            <?php
                                $CurrentDate = date('d-m-Y');
                            ?>
                            @foreach($requests_data as $RequestDbData)
                                @if (
                                   $UserData->current_filter == 0 ||
                                   $UserData->current_filter == 1 && $RequestDbData->updated_data == $CurrentDate ||
                                   $UserData->current_filter == 2 && $RequestDbData->updated_data == $CurrentDate && $RequestDbData->status == 1 ||
                                   $UserData->current_filter == 3 && $RequestDbData->updated_data == $CurrentDate && $RequestDbData->status == 2 ||
                                   $UserData->current_filter == 4 && $RequestDbData->updated_data == $CurrentDate && $RequestDbData->status == 101 ||
                                   $UserData->current_filter == 5 && $RequestDbData->updated_data == $CurrentDate && $RequestDbData->status == 102
                                )
                                    <?php
                                        $LinkTarget = $RequestDbData->id;
                                    ?>
                                    <tr class="Content">
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{ $RequestDbData->number }}</a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{$RequestDbData->create_data}}</a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">
                                                    @switch( $RequestDbData->type )
                                                        @case(1)
                                                            <div>Тип 1</div>
                                                        @breakswitch
                                                        @case(2)
                                                            <div>Тип 2</div>
                                                        @breakswitch
                                                        @case(3)
                                                            <div>Тип 3</div>
                                                        @breakswitch
                                                        @default
                                                            <div>Тип 1</div>
                                                        @breakswitch
                                                    @endswitch
                                                </a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">
                                                    @switch( $RequestDbData->priority )
                                                        @case(1)
                                                            <div>Низкий</div>
                                                        @breakswitch
                                                        @case(2)
                                                            <div>Средний</div>
                                                        @breakswitch
                                                        @case(3)
                                                            <div>Высокий</div>
                                                        @breakswitch
                                                        @case(4)
                                                            <div>Критический</div>
                                                        @breakswitch
                                                        @default
                                                            <div>Низкий</div>
                                                        @breakswitch
                                                    @endswitch
                                                </a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">
                                                    @switch( $RequestDbData->status ) {{--todo для этого подумай на счет типа enum--}}
                                                        @case(0)
                                                            <div>Не начато</div>
                                                        @breakswitch
                                                        @case(1)
                                                            <div>В работе</div>
                                                        @breakswitch
                                                        @case(2)
                                                            <div>Выполнено</div>
                                                        @breakswitch
                                                        @case(101)
                                                            <div>На контроле</div>
                                                        @breakswitch
                                                        @case(102)
                                                            <div>Отменено</div>
                                                        @breakswitch
                                                        @default
                                                            <div>???</div>
                                                        @breakswitch
                                                    @endswitch
                                                </a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{$RequestDbData->address}}</a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{$RequestDbData->problem_description}}</a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{$RequestDbData->applicant}}</a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{$RequestDbData->defect_type}}</a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{$RequestDbData->executor}}</a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{$RequestDbData->desired_time}}</a></td>
                                            <td><a style="text-decoration: none;" href="/edit_request?id={{ $LinkTarget }}">{{$RequestDbData->performed_work_type}}</a></td>
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
