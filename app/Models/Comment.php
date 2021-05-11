<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "content_id", "body"];

    protected $touches = ["content"];

    // Relations

    public function content()
    {
        return $this->belongsTo("App\Models\Content");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}
