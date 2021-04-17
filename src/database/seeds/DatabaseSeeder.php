<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        App\User::create([
            'name' => 'German Middi',
            'email' => 'g@gmail.com',
            'password' => bcrypt('123456')
        ]);


        App\Models\Category::create([
            'title' => 'Agenda',
        ]);

        App\Models\Post::create([
            'user_id'   => 1,
            'title'     => 'Primer Post',
            'body'      => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis deserunt quisquam dolore iusto impedit repellendus quam odio porro laborum harum facilis non accusantium ducimus, est dolores amet ab temporibus numquam.',
            'category_id' => 1,
        ]);

        App\Models\PostStatu::create([
            'status_txt'     => 'Borrador',
        ]);
        
        App\Models\PostStatu::create([
            'status_txt'     => 'Publicado',
        ]);

        App\Models\PostStatu::create([
            'status_txt'     => 'Oculta',
        ]);


        //factory(App\Models\Category::class, 8)->create();
        // factory(App\Models\Post::class, 24)->create();
        
    }
}
