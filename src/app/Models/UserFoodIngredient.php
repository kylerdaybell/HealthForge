<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFoodIngredient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_food_id',
        'food_id',
        'quantity',
        'unit', // e.g., 'g', 'cup', 'scoop'
    ];

    /**
     * Get the custom food (recipe) this ingredient belongs to.
     */
    public function userFood(): BelongsTo
    {
        return $this->belongsTo(UserFood::class);
    }

    /**
     * Get the global food item for this ingredient.
     */
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
