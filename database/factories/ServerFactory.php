<?php

namespace Database\Factories;

use App\Models\Server;
use App\Models\User;
use App\Models\Node;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Server::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'user_id' => User::factory(),
            'node_id' => Node::factory(),
            'vmid' => rand(1,5000)
        ];
    }
}
