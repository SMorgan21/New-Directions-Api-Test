<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Company extends Model
{
    use HasFactory;

    use HasApiTokens;

    protected $table = 'company';

    protected $fillable = [
        'name',
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'company_id', 'id');
    }
}
