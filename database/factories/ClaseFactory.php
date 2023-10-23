<?php
namespace Database\Factories;
use App\Models\Clase;
use App\Models\User; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clase>
 */
class ClaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' =>$this->faker->sentence,
            'materia' =>$this->faker->word,
            'seccion' => $this->faker->word,
            'color' => $this->faker->randomElement(['red', 'blue', 'gray', 'green', 'yellow', 'indigo', 'purple', 'pink']),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
