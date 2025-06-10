<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

   
    protected $fillable = [
        'name',
        'email',
        'country',
        'birthday',
        'heard_about_us',
        'password',
        'hobbie',
        'status',
        'day',
        'id_image',
        'id_selfie_image',
        'month',
        'year',
        'doc_status',
        'google_id'

    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function profileImages()
    {
        return $this->hasMany(UserProfileImage::class);
    }
    
    
    public function companionrating()
    {
       return $this->hasMany(Rating::class, 'companion_id', 'id');
    }

}
