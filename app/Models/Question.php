<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $fillable = [
        'mission_id',
        'question',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'correct_answer_1',
        'correct_answer_2',
        'correct_answer_3',
        'correct_answer_4',
    ];

    /**
     * A question belongs to a mission.
     */
    public function mission(): BelongsTo
    {
        return $this->belongsTo(Mission::class);
    }
}
