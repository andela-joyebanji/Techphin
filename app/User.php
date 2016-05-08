<?php

namespace Pyjac\Techphin;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'username', 'email', 'password', 'image', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function scopeVideosViewCount()
    {
        $views = $this->videos()->sum('views');

        if ($views == 0) {
            return ' 0 ';
        }

        return $views;
    }

    public function scopeVideosCommentCount()
    {
        return $this->videos()->rightJoin('comments', 'comments.video_id', '=', 'videos.id');
    }

    public function favourites()
    {
        return $this->belongsToMany(Video::class, 'favourites');
    }

    public function favourite($videoId)
    {
        $favourites = $this->favourites();
        if (!$this->isFavourited($videoId)) {
            $favourites->attach($videoId);

            return 1;
        } else {
            $favourites->detach($videoId);

            return -1;
        }
    }

    public function isFavourited($videoId)
    {
        return !is_null($this->favourites()->find($videoId));
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }
}
