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
     * Get the comments the video has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comments()
    {
      return $this->hasMany(Comment::class);
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

    public function scopeRelatedVideos($query, $limit = 5)
    {
        return $query->where('category_id', '>', $this->category_id)->take(5)->get();
    }

    public function scopePopular($query, $limit = 12)
    {
        return $query->with(['category','owner'])->take($limit);
    }

    public function incrementViews()
    {
      $this->views++;
      $this->save();
    }

    public function favouriters()
    {
        return $this->belongsToMany(User::class, 'favourites');
    }

    public function favourites()
    {
        return $this->favouriters()->count();
    }

    /**
     * Scope a query to search by emoji name.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $queryString)
    {
        return $query->where('title', 'like', "%$queryString%");
    }
}
