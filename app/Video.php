<?php

namespace Pyjac\Techphin;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'link', 'description', 'category_id'];

    /**
     * Get the owner of the video.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     /**
     * Get the category the video belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    /**
     * Get the keywords associated with the emoji.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'video_tags');
    }

    public function attachTagsToVideo($tags)
    {
        $tagsCollection = [];
        foreach ($tags as $key => $tag) {

            $tagModel = Tag::firstOrCreate(['name' => strtolower($tag)]);
            $tagsCollection[] = $tagModel->id;
        }
        $this->tags()->attach($tagsCollection);
    }
}
