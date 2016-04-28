<?php

namespace Pyjac\Techphin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id'];

    public function author()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
      return $this->belongsTo(Video::class);
    }
}
