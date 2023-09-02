<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function Message(){
        return $this->hasOne(Message::class, 'id');
    }
    public function Pelapor(){
        return $this->belongsTo(User::class, 'id');
    }
}
