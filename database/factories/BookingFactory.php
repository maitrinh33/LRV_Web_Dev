<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = \App\Models\Booking::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'service' => $this->faker->word,
            'message' => $this->faker->sentence,
            'status' => 'pending',
            'user_id' => \App\Models\User::factory(),
            'cancellation_reason' => null,
        ];
    }
}
