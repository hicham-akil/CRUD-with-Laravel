<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    //
    protected $fillable=['tasks','user_id'];
    public function User(){
        return $this->hasMany(User::class,'user_id');
    }
}
