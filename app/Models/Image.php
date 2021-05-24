<?php

namespace App;

use Imageconv;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ["filename"];
    /**
     * @return Illuminate\Database\Eloquent\Relations\MorphedByToMany
     */
    public function content()
    {
        return $this->morphedByMany("App\Models\Content", "imageable");
    }
    /**
     * @return Illuminate\Database\Eloquent\Relations\MorphedByToMany
     */
    public function user()
    {
        return $this->morphedByMany("App\Models\User", "imageable");
    }
}
