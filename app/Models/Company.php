<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Company extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    use HasApiTokens;

    protected $table = 'company';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'company_id', 'id');
    }
}
