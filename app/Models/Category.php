<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class Category extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];

    public function setNameAttribute($value)
    {

        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Satu Categori memiliki banyak recipe
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
