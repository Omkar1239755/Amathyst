<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserProfileImage extends Model
{
  protected $table = "user_profile_images";  
  protected $fillable = ['user_id', 'images'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
