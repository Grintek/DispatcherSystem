@extends('layouts.app')

@section('content')
<?php
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
if (Auth::check()) { //check if user is logged in
    if (Input::has('CurrentFilter'))  {
        $Setter = 0;
        switch (Input::get('CurrentFilter')) {
            case "Clear":
                $Setter = 0;
                break;
            case "Active":
                $Setter = 1;
                break;
            case "InProcess":
                $Setter = 2;
                break;
            case "OnControl":
                $Setter = 3;
                break;
            case "Done":
                $Setter = 4;
                break;
            case "Canceled":
                $Setter = 5;
                break;
        }
        DB::table('users')->where('id', Auth::id())->update(['current_filter' => $Setter]);
    }
    ?>
    <meta http-equiv="refresh" content="0; url=main_page" />
    <?php
    }
?>
@endsection
