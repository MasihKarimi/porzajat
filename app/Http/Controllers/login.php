<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Useraccess\useraccesss;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class login extends Controller
{
    public function login()
    {
      return view('404');
    }
}
