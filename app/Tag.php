<?php

namespace Pyjac\Techphin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    protected $hidden = ['pivot'];
}
