<?php

namespace Chatty\Http\Controllers;

use Chatty\Http\Controllers\Controller;

class HomeController extends Controller
{

  
    public function index()
    {
        if (\Auth::check()) {
           $tasks = \Auth::user()->tasks()->orderBy('priority', 'asc')->get();
           return view('user::timeline.index', compact('tasks')); 
        }
        return view('home');
    }

}
