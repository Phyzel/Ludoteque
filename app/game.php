<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $table = 'game';
    protected $fillable = ['idgame','name','platform'];
}
