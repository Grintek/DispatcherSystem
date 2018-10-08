<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller {
	public function send(Request $request) {
		$UserLogin = Input::get('login');
		$UserPassword = "your_password";
		Mail::send('emails.register_allowed', ['UserLogin' => $UserLogin, 'UserPassword' => $UserPassword], function ($Message) {
            $Message->subject('Вам был дан доступ к %DispatcherSystem%');
		    $Message->from('riseupcrm@gmail.com', 'RiseUP CRM');
		    $Message->to('mxss1998@yandex.ru');
		});
		return response()->json(['Message' => 'Request completed']);
    	}
}
