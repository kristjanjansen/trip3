<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ["user_id"];

    protected $dates = ["created_at", "updated_at"];

    /**
     * @return Illuminate\Database\Eloquent\Relations
     */
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
    /**
     * @return Illuminate\Database\Eloquent\Relations
     */
    public function comments()
    {
        return $this->hasMany("App\Models\Comment");
    }
}
