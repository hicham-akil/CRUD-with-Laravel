<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, Notifiable;
    //
    protected $fillable=['tasks','user_id'];
    public function User(){
        return $this->hasMany(User::class,'user_id');
    }
}
