<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailOtp extends Model
{
    protected $table = 'email_otps';

    protected $fillable = [
        'user_id',
        'otp',
        'expires_at',
        'user_type'
    ];


      public function user()
    {
        return $this->belongsTo(User::class);
    }


}
