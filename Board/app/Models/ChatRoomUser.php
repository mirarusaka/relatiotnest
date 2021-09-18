<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoomUser extends Model
{
    use HasFactory;
    protected $table = 'chat_room_users';

    public function chatRoomId(){
        return $this->belongsTo(ChatRoomUser::class, 'chat_room_id', 'id');
    }

    public function chatRoomUserId(){
        return $this->belongsTo(Person::class, 'user_id', 'id');
    }

}
