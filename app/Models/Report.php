<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function Message(){
        return $this->hasOne(Message::class);
    }
    public function Pelapor(){
        return $this->hasOne(User::class, 'user_id');
    }
}
