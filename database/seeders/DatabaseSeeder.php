<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
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
       

        Article::factory()->count(20)->create();
        Comment::factory(40)->create();


        $list = ['News' , 'Tech' , 'Web' , 'Mobile' , 'UX'];
        foreach($list as $name){
            Category::create(['name'=> $name]);
            
        }
    }
}
