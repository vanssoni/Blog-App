<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str; 

class Post extends Model
{
    use HasFactory, HasSlug;
    public $guarded = ['id','created_at', 'updated_at'];
    public $appends = ['short_content'];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->slugsShouldBeNoLongerThan(191);
    }
    public function getFeaturedImageAttribute(){
        $featured_image = $this->attributes['featured_image'] ? url('/storage/blogs/'.$this->attributes['featured_image']) :  url('/images/empty-image.jpg');
        return $featured_image;
    }
    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function related_blogs(){
        return $this->hasMany(Post::class, 'category_id', 'category_id')->latest()->limit(5);
    }

    public function getShortContentAttribute(){
        if($this->attributes['content'])
        // return $this->attributes['content'];
        return Str::words($this->attributes['content'], 80);
    }

}
