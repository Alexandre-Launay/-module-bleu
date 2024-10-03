<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('Admin1234'),
            'is_admin' => true
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('User1234'),
        ]);

        $categories = [
            'Laravel',
            'Ruby ON Rails',
            'React',
            'Nuxt',
            'Vue',
            'Symfony',
            'Ionic',
            'Python',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }

        Article::factory(10)->create();
    }
}
