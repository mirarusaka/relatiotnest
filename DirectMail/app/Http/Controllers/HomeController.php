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

    public function showUser($id){
        $you = 0;
        $me = 0;
        $same = 0;
        //表示したユーザのデータを表示
        $other = Person::where('id', '=', $id)->first();
        //ログインユーザIDを照会
        $user = Auth::id();
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

        return view('showUser', compact('other', 'you', 'me', 'same'));
    }
    //TODO ボタンアクションの値で、内容を変更
    public function followUser(Request $request, $id){
        //ログイン者のユーザIDを取得
        $user = Auth::id();
        $data = Person::where('name', '=', $id)->first();
        $person = $id;

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
