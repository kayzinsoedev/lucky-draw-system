<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class WinningUser extends Model
{
    use SoftDeletes;
    protected $table = 'winning_users';
    protected $fillable = ['name', 'winning_number_count'];
}
