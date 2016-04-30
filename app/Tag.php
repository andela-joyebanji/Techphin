<?php

namespace Pyjac\Techphin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'video_tags', 'tag_id', 'video_id');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
