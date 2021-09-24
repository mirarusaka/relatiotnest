<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;
use App\Models\Reaction;
use App\Config\Status;
use Log;

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
        $person = $name;
        return view('showUser', compact('person'));
    }

    public function followUser($name){
        //ログイン者のユーザIDを取得
        $user = Auth::id();
        $data = Person::where('name', '=', $name)->first();
        $person = $name;

        // dd($data->id);

        if($user == $data->id){
            $person = Person::all();
            return view('home', compact('person'));
        }

        $status = Status::FOLLOW;

        $reaction = new Reaction();
        $reaction->to_user_id = $data->id;
        $reaction->from_user_id = $user;
        $reaction->status = $status;
        $reaction->save();

        return view('showUser', compact('data', 'person'));
    }
}
