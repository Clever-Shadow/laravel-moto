<?php
namespace App\Http\Controllers;

use App\Mail\MailClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSetting extends Controller
{
    public function send_form(Request $request)
	{
		$name = $request->name;
		$email = $request->email;
		$msg = $request->msg;
		
		Mail::to('pocht@gmail.com')->send(new MailClass($name, $email, $msg));
		return redirect('/');
	}
}
