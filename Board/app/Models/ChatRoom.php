<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;
    protected $table = 'chat_rooms';

    public function roomId(){
        return $this->hasMany(ChatMessage::class, 'room_id', 'id');
    }

    public function chatRoomId(){
        return $this->hasMany(ChatRoomUser::class, 'chat_room_id', 'id');
    }
}
