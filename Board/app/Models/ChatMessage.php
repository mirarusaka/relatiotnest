<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    public function chatMessageUserId(){
        return $this->belongsTo(Person::class, 'user_id', 'id');
    }

    public function chatRoomId(){
        return $this->belongsTo(ChatRoom::class, 'chat_room_id', 'id');
    }
}
