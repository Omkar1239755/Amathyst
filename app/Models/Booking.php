<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Booking extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    public function companion(): BelongsTo
    {
       return $this->belongsTo(User::class, 'companion_id')->withTrashed();
    }
    
    public function associate(): BelongsTo
    {
       return $this->belongsTo(User::class, 'associate_id')->withTrashed();
    }
}
