<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Active_Route extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'active_routes';

    protected $fillable = [
        'route_id',
        'student_id',
        'role',
        'is_completed',
        'points',
    ];

    public function route(): BelongsTo
    {
        return $this->belongsTo(route::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function getRoleName(): string
    {
        return match($this->role) {
            1 => 'Fotograaf',
            2 => 'Historicus',
            3 => 'Tekenaar',
            4 => 'Scout',
            default => 'Onbekend'
        };
    }
}
