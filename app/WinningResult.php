<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WinningResult extends Model
{
    use SoftDeletes;
    protected $table = 'winning_results';
    protected $fillable = ['prize_type', 'winning_number'];

    public function prizeType(){
        return $this->hasOne('App\PrizeType','id','prize_type');
    }
}
