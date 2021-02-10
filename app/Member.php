<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Member extends Model
{
    protected $fillable = ['name','email','dob','aniversary','user_id','phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
