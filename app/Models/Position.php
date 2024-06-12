<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $fillable = [
        'name',
    ];

    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class, 'position_id', 'id');
    }
}
