<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaOperatorController extends Controller
{
    public function index()
    {
        return view('operator.beranda_index', [
            'title' => 'Hi, Welcome ' . auth()->user()->name
        ]);
    }
}
