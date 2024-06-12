<?php

namespace Database\Seeders;

use App\Models\Applicant;
use Database\Factories\ApplicantFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::info('Running ApplicantsSeeder');
        Applicant::factory()->count(50)->create();
    }
}
