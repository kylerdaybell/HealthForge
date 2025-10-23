<?php

namespace App\Models;

use App\Scopes\UserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FoodLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'log_date',
        'meal_type',
        'quantity',
        'food_name',
        'calories',
        'protein_g',
        'carbs_g',
        'fats_g',
        'loggable_id',    // The ID of the Food or UserFood
        'loggable_type',  // The class name (App\Models\Food or App\Models\UserFood)
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'log_date' => 'date',
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
     * Get the user that owns the food log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent loggable model (either a Food or a UserFood).
     * This will be null for "Quick Add" entries.
     */
    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }
}
