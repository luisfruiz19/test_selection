<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{

    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
            'state' => $this->faker->numberBetween(Article::STATE_INACTIVE,Article::STATE_ACTIVE),
            'user_id' => User::factory()
        ];
    }
}
