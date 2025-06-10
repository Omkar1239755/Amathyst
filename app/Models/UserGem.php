<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserGem extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'no_of_gems', 'amount','intial_gem','cancel_gem'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
