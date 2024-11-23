<?php

namespace Susheelbhai\Larameet\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
