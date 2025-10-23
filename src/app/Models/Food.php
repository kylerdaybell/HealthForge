<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'brand_name',
        'serving_size',
        'serving_unit',
        'calories',
        'protein_g',
        'carbs_g',
        'fats_g',
        'upc_code',
    ];

    /**
     * Get the ingredient entries this food is a part of.
     * (Links to the UserFoodIngredient model)
     */
    public function userFoodIngredients(): HasMany
    {
        return $this->hasMany(UserFoodIngredient::class);
    }
}
