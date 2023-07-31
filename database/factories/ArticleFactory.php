<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                // Replace this with logic to get a random user ID from the users table
                return User::inRandomOrder()->first()->id;
            },
            'article_title' => $this->faker->sentence,
            'text' => $this->faker->paragraph,
            'foto_article' => null, // Replace with binary data if necessary or keep it null
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}