<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class AssociateRating extends Model
{
    protected $guarded=[];
    public function companionreviews(): BelongsTo
    {
       return $this->belongsTo(User::class,'companion_id');
    } 
}
