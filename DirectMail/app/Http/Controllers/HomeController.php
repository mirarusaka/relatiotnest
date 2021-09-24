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
        $you = 0;
        $me = 0;
        $same = 0;
        $other = Person::where('name', '=', $name)->first();
        $user = Auth::id();
        $person = $name;
        $followYou = Reaction::where('to_user_id', '=', $other->id)
            ->where('from_user_id', '=', $user)->first();
        $followMe = Reaction::where('to_user_id', '=', $user)
            ->where('from_user_id', '=', $other->id)->first();

        if($followYou != null){
            $you = 1;
        }
        if($followMe != null){
            $me = 1;
        }
        if($other->id == $user){
            $same = 1;
        }

        return view('showUser', compact('person', 'you', 'me', 'same'));
    }
    //TODO ボタンアクションの値で、内容を変更
    public function followUser(Request $request, $name){
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
