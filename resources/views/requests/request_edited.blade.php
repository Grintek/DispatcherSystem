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
                <div class="panel-heading">Статус обновления заявки</div>

                <div class="panel-body">
                    <p class="text-center">Заявка успешно обновлена</p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    $CurrentDate = date('d-m-Y');
    DB::table('requests_data')->where('id', Input::get('id'))->update(['updated_data' => $CurrentDate]);
    if (Input::has('number'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['number' => Input::get('number')]);
    }
    if (Input::has('create_data'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['create_data' => Input::get('create_data')]);
    }
    if (Input::has('type'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['type' => Input::get('type')]);
    }
    if (Input::has('priority'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['priority' => Input::get('priority')]);
    }
    if (Input::has('status'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['status' => Input::get('status')]);
    }
    if (Input::has('address'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['address' => Input::get('address')]);
    }
    if (Input::has('problem_description'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['problem_description' => Input::get('problem_description')]);
    }
    if (Input::has('applicant'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['applicant' => Input::get('applicant')]);
    }
    if (Input::has('defect_type'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['defect_type' => Input::get('defect_type')]);
    }
    if (Input::has('paid'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['paid' => Input::get('paid')]);
    }
    if (Input::has('payment_status'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['payment_status' => Input::get('payment_status')]);
    }
    if (Input::has('executor'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['executor' => Input::get('executor')]);
    }
    if (Input::has('desired_time'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['desired_time' => Input::get('desired_time')]);
    }
    if (Input::has('performed_work_type'))  {
        DB::table('requests_data')->where('id', Input::get('id'))->update(['performed_work_type' => Input::get('performed_work_type')]);
    }
    ?>
    <meta http-equiv="refresh" content="0; url=main_page" />
<?php
    }
?>
@endsection