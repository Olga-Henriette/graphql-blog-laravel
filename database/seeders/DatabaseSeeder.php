<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Création du compte test fixe pour faciliter le Login GraphQL
        $admin = User::factory()->create([
            'name' => 'Olga Henriette',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'), // Mot de passe standard pour les tests
        ]);

        // 2. Création de 4 autres utilisateurs aléatoires
        $users = User::factory(4)->create();
        
        $allUsers = $users->concat([$admin]);

        // 3. Génération dynamique des articles et des commentaires
        $allUsers->each(function ($user) use ($allUsers) {
            // Chaque utilisateur possède 3 articles
            $posts = Post::factory(3)->create([
                'user_id' => $user->id,
            ]);

            // Pour chaque article créé, on génère 2 commentaires aléatoires
            $posts->each(function ($post) use ($allUsers) {
                Comment::factory(2)->create([
                    'post_id' => $post->id,
                    'user_id' => $allUsers->random()->id, // Un auteur de commentaire au hasard parmi la liste
                ]);
            });
        });
    }
}
