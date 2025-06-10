<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rating extends Model
{ 
    use SoftDeletes;
    protected $guarded=[];
    public function associatereviews(): BelongsTo
    {
       return $this->belongsTo(User::class,'associate_id');
    } 
    
    public function companionreviews(): BelongsTo
    {
       return $this->belongsTo(User::class,'companion_id');
    } 
    
    public function featuredcompanion(): BelongsTo
    {
        return $this->belongsTo(User::class, 'companion_id')
        ->whereIn('id', function ($query) {
            $query->select('companion_id')
                  ->from('ratings')
                  ->groupBy('companion_id')
                  ->havingRaw('AVG(rating) >= 3');
        });
    } 
}
