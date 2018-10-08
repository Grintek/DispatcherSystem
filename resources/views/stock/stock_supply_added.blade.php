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
    $ItemDBData = DB::table('stock')->
    where('id', Input::get('id'))->get();
    ?>
    @foreach($ItemDBData as $ItemData)
    @endforeach
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
            /*todo дичь!!! ты зачем во вьюхе это делаешь!*/
    if (Input::has('new_amount'))  {
        $CurrentDate = date('d-m-Y');
        $FinalItemAmount = ($ItemData->amount_left + Input::get('new_amount'));

        DB::table('stock')->where('id', Input::get('id'))->update(['amount_left' => $FinalItemAmount]);
        DB::table('stock')->where('id', Input::get('id'))->update(['last_supply' => $CurrentDate]);

        DB::table('stock_actions')->insert(
            array(
                'type' => 'Supply',
                'item_id' => Input::get('id'),
                'date' => $CurrentDate,
                'amount' =>  Input::get('', Input::get('new_amount')),
            )
        );

    }
    ?>
    <meta http-equiv="refresh" content="0; url=stock_new_supply?id={{$ItemData->id}}&status=success" />
    <?php
    }
    ?>
@endsection