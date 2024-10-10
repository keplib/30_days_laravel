<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\BlogPost;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 5 authors
        $authors = Author::factory()->count(5)->create();

        // Create 10 tags
        $categories = Category::factory()->count(10)->create();

        // For each author, create blogposts and attach tags to the blogposts
        $authors->each(function ($author) use ($categories) {
            Blogpost::factory()
                ->count(3) // Each author will have 3 blogposts
                ->for($author) // Associate blogpost with the author
                ->create() // Create the blogposts
                ->each(function ($blogpost) use ($categories) {
                    $blogpost->categories()->attach($categories->random(3)); // Attach 3 random tags to each blogpost
                });
        });
    }
}
