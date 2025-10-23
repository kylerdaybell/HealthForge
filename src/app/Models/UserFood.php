<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class UserFood extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'serving_name',
    ];

    /**
     * The "booted" method of the model.
     * This applies our global security scope automatically.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new UserScope);
    }

    /**
     * Get the user that owns this custom food.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the list of ingredients for this custom food.
     */
    public function ingredients(): HasMany
    {
        return $this->hasMany(UserFoodIngredient::class);
    }

    /**
     * Get all the food logs for this user food.
     * (Polymorphic Relationship)
     */
    public function foodLogs(): MorphMany
    {
        return $this->morphMany(FoodLog::class, 'loggable');
    }
}
