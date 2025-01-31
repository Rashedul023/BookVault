<?php

use App\Models\Category;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        $this->call(CategorySeeder::class);

        
        $category = Category::first(); 

    
        if ($category) {
            $book = Book::create([
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'summary' => 'A book on building good habits and breaking bad ones.',
                'category_id' => $category->id, 
            ]);

            
            $user = User::first();

            
            if ($user) {
                $user->toReadList()->attach($book->id);
            }
        }
    }
}
