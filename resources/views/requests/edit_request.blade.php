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
    $RequestDBData = DB::table('requests_data')->where('id', Input::get('id'))->get();
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
        <div class="col-lg-2 col-md-1"></div>
        <div class="col-lg-6 col-md-8 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Редактирование заявки</div>
                <div class="panel-body">
                    @foreach ($RequestDBData as $RequestData)
                    @endforeach
                    <form class="form-horizontal" role="form" method="POST" action="request_edited?id={{$RequestData->id}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Номер</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <input type="text" class="form-control" name="number" placeholder="{{$RequestData->number}}">
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Приоритет</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <select name="priority" class="selectpicker center-block">
                                        <option value="1" @if ( $RequestData->priority === 1) selected @endif
                                        >Низкий</option>
                                        <option value="2" @if ( $RequestData->priority === 2) selected @endif
                                        >Средний</option>
                                        <option value="3" @if ( $RequestData->priority === 3) selected @endif
                                        >Высокий</option>
                                        <option value="4" @if ( $RequestData->priority === 4) selected @endif
                                        >Критический</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Тип заявки</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <select name="type" class="selectpicker center-block">
                                        <option value="1" @if ( $RequestData->type === 1) selected @endif
                                        >Тип 1</option>
                                        <option value="2" @if ( $RequestData->type === 2) selected @endif
                                        >Тип 2</option>
                                        <option value="3" @if ( $RequestData->type === 3) selected @endif
                                        >Тип 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Статус заявки</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <select name="status" class="selectpicker center-block">
                                        <option value="0" @if ( $RequestData->status === 0) selected @endif
                                        >Не началось</option>
                                        <option value="1" @if ( $RequestData->status === 1) selected @endif
                                        >В работе</option>
                                        <option value="2" @if ( $RequestData->status === 2) selected @endif
                                        >Выполнено</option>
                                        <option value="101" @if ( $RequestData->status === 101) selected @endif
                                        >На контроле</option>
                                        <option value="102" @if ( $RequestData->status === 102) selected @endif
                                        >Отменено</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Дата создания</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <input type="text" class="form-control" name="create_data" placeholder="{{$RequestData->create_data}}">
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Адрес</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <input type="text" class="form-control" name="address" placeholder="{{$RequestData->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Описание проблемы</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <textarea class="form-control" rows="3" id="comment" name="problem_description">{{$RequestData->problem_description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Заявитель</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <input type="text" class="form-control" name="applicant" placeholder="{{$RequestData->applicant}}">
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Тип дефекта</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <input type="text" class="form-control" name="defect_type" placeholder="{{$RequestData->defect_type}}">
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Исполнитель</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <input type="text" class="form-control" name="executor" placeholder="{{$RequestData->executor}}">
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Желаемое время</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <input type="text" class="form-control" name="desired_time" placeholder="{{$RequestData->desired_time}}">
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-xs-12 control-label">Вид выполненных работ</label>
                                <div class="col-xs-1"></div>
                                <div class="col-lg-1 col-md-1"></div>
                                <div class="col-lg-9 col-md-9 col-xs-10">
                                    <input type="text" class="form-control" name="performed_work_type" placeholder="{{$RequestData->performed_work_type}}">
                                </div>
                            </div>
                        </div>
                        <div class="row FormPart">
                            <div class="form-group">
                                <div class="col-lg-4 col-md-3 col-xs-1"></div>
                                <div class="col-lg-4 col-md-6 col-xs-10">
                                    <button type="submit" class="btn btn-primary center-block">
                                        Изменить заявку
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
