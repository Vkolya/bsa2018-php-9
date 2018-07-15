<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','short_name','logo_url','price'];
}
