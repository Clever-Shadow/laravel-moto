<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function getIndex()
	{
		return view('chat.index');
	}
}
