<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Recipe extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'about',
        'category_id',
        'recipe_author_id',
        'url_video',
        'url_file',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }


      // Satu recipe memiliki satu category
      public function category(): BelongsTo
      {
          return $this->belongsTo(Category::class,'categoty_id');
      }

      public function photos():HasMany
      {
        return $this->hasMany(RecipePhoto::class,'recipe_id');
      }

      public function tutorials():HasMany
      {
        return $this->hasMany(RecipeTutorial::class,'recipe_id');
      }

      public function author(): BelongsTo
      {
          return $this->belongsTo(RecipeAuthor::class,'recipe_autor_id');
      }

      public function recipeIngredient():HasMany
      {
        return $this->hasMany(RecipeIngredient::class,'recipe_id');
      }
}
