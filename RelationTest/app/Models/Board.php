<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    //バリデーションルールを指定
    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    );

    //ゲッター 何を取っているかわからない
    public function getData()
    {
        return $this->id . ': ' . $this->title;
    }
}
