<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transaction extends Model
{
  use SoftDeletes;
  protected $table="transaction";
  
  
  protected $fillable = [
        'user_id',
        'transaction_id',
        'Gems',
        'Amount',
        'status',
      
    ];
  public function user(){
       return $this->belongsTo(User::class,'user_id')->withTrashed();
  }  
    
    
}
