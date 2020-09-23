<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneak extends Model
{
    //use HasFactory;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $guarded = [];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function originalSneak()
    {
        return $this->hasOne(Sneak::class, 'id', 'original_sneak_id');
    }
}
