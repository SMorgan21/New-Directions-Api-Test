<?php

namespace Database\Factories;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    protected $model = Applicant::class;

    public function definition()
    {
        $this->faker->locale('en_GB');

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address1' => $this->faker->address,
            'county' => $this->faker->city,
            'country' => 'UK',
            'post_code' => $this->faker->postcode,
            'require_dbs_check' => $this->faker->boolean,
            'company_id' => $this->faker->numberBetween(1, 50),
            'position_id' => $this->faker->numberBetween(1, 50),
            'cv' => $this->faker->text('50'),
        ];
    }
}
