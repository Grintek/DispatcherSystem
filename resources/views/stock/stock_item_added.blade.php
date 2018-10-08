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
                    <div class="panel-heading">Статус добавления на склад</div>

                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        //TODO: this is stupid, req update
        $CurrentElement = "name";
        if (Input::has($CurrentElement) && !empty(Input::get($CurrentElement))) {
            $InputName = Input::get($CurrentElement);
        } else {
            $InputName = '';
        }
        $CurrentElement = "color_definition";
        if (Input::has($CurrentElement) && !empty(Input::get($CurrentElement))) {
            $InputColorDef = Input::get($CurrentElement);
        } else {
            $InputColorDef = '';
        }
        $CurrentElement = "measure";
        if (Input::has($CurrentElement) && !empty(Input::get($CurrentElement))) {
            $InputMeasure = Input::get($CurrentElement);
        } else {
            $InputMeasure = '';
        }
        $CurrentElement = "comment";
        if (Input::has($CurrentElement) && !empty(Input::get($CurrentElement))) {
            $InputComment = Input::get($CurrentElement);
        } else {
            $InputComment = '';
        }

        DB::table('stock')->insert(
            array(
                'name' => $InputName,
                'color_definition' => $InputColorDef,
                'measure' => $InputMeasure,
                'comment' => $InputComment
            )
        );
    ?>
    <meta http-equiv="refresh" content="0; url=stock" />
    <?php
    }
    ?>
@endsection