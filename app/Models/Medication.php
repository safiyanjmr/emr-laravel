<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','medication_name', 'dosage', 'instructions', 'patient_id', 'physician_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
