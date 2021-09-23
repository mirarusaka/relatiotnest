<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $person = Person::all();

        return view('index', compact('person'));
    }

    public function showUser($name){
        $data = $name;
        return view('showUser', compact('data'));
    }

    public function followUser($name){
        //ログイン者のユーザIDを取得
        $user = Auth::id();
        $data = $name;

        return view('showUser', compact('data', 'user'));
    }
}
