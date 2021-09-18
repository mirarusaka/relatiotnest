<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function toUserId()
    {
        //リアクションは一人のユーザから複数出るので、hasMany（多）となる。
        //第一引数：リレーションするモデル（テーブル） 第二：外部キー(子テーブル) 第三：主キー(親テーブル)
        //これで、キーのリレーションが完了する
        return $this->hasMany(Reaction::class, 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        //同上
        return $this->hasMany(Reaction::class, 'from_user_id', 'id');
    }

    public function chatRoomUserId(){
        return $this->hasMany(Person::class, 'user_id', 'id');
    }

    public function chatMassageUserId(){
        return $this->hasMany(Person::class, 'user_id', 'id');
    }
}
