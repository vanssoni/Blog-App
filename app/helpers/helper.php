<?php
use App\Models\Category;

function getPostCategoriesWithPostsCount(){
    return Category::withCount('posts')->orderBy('name','asc')->get();
}
function getCategoryNameBySlug($slug){
    return Category::where('slug', $slug)->pluck('name')->first();
}