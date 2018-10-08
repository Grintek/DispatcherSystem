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
    $ItemDBData = DB::table('stock')->where('id', Input::get('id'))->get();
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
    if (Input::has('write_off_amount'))  {
        $CurrentDate = date('d-m-Y');
        $WriteOffAmount = Input::get('write_off_amount');
        $FinalItemAmount = ($ItemData->amount_left - $WriteOffAmount);
        if ($FinalItemAmount < 0) {
            $WriteOffAmount = $ItemData->amount_left;
            $FinalItemAmount = 0;
        }
        DB::table('stock')->where('id', Input::get('id'))->update(['amount_left' => $FinalItemAmount]);
        DB::table('stock')->where('id', Input::get('id'))->update(['last_write_off' => $CurrentDate]);

        DB::table('stock_actions')->insert(
            array(
                'type' => 'WriteOff',
                'item_id' => Input::get('id'),
                'date' => $CurrentDate,
                'amount' =>  $WriteOffAmount,
            )
        );
    }
    ?>
    <meta http-equiv="refresh" content="0; url=stock_new_write_off?id={{$ItemData->id}}&status=success" />
    <?php
    }
    ?>
@endsection