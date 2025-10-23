<?php

namespace App\Models;

use App\Scopes\UserScope; // <-- For automatic user data security
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeightLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'weight_kg',
        'log_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'log_date' => 'date',
        'weight_kg' => 'decimal:1',
    ];

    /**
     * Validation rules for creating or updating a weight log.
     *
     * @var array<string, string>
     */
    public static array $rules = [
        'weight_kg' => 'required|numeric|min:0|max:1000',
        'log_date' => 'required|date|before_or_equal:today',
    ];

    /**
     * The "booted" method of the model.
     *
     * This applies our global security scope automatically.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new UserScope);
    }

    /**
     * Get the user that owns the weight log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

