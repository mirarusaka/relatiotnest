<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class HomeController extends Controller
{
    public function index(){
        $person = Person::all();

        return view('index', compact('person'));
    }

    public function showUser(){

        return view('showUser');
    }
}
