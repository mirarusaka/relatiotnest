<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model //勝手にテーブルと連携してくれている
{
    use HasFactory;

    protected $guarded = array('id'); //更新不可のカラムを指定
    // protected $table = 'test'; //テーブルを手動で指定

    //バリデーションルールを指定
    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    );

    //ゲッター これがviewファイルに呼び出せる。
    //この場合、呼び出すと『id：タイトル』となる。
    public function getData()
    {
        //$thisの中にテーブルのデータが全て入っている
        return $this;
    }
}
