<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;
    protected $table = 'reactions';
    protected $fillable = ['to_user_id', 'from_user_id'];
    public $incrementing = false;  // インクリメントIDを無効化
    public $timestamps = false; // update_at, created_at を無効化


    public function toUserId()
    {
        //子テーブルのリレーション(対象が1の場合)はbelongToを使う。
        //第一引数：親モデル 第二：外部キー(自分) 第三：主キー(親の)
        return $this->belongsTo(Person::class, 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        //同上
        return $this->belongsTo(Person::class, 'from_user_id', 'id');
    }
}
