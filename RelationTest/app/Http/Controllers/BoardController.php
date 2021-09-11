<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request){
        $items = Board::all(); //インスタンス生成している
        return view('board.index', ['items' => $items]);
    }

    public function add(Request $request){
        return view('board.add');
    }

    public function create(Request $request){
        $this->validate($request, Board::$rules);
        $board = new Board;
        $form = $request->all();
        unset($form['_token']);
        $board->fill($form)->save();
        return redirect('/');
    }
}
