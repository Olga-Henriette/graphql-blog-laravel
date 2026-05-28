<?php

namespace App\GraphQL\Mutations;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost
{
    /**
     * @param  null  $rootAlwaysNull
     * @param  array{input: array{title: string, content: string}}  $args
     * @return Post
     */
    public function __invoke($rootAlwaysNull, array $args): Post
    {
        // Récupère les données propres envoyées par l'utilisateur
        $data = $args['input'];

        // Injecte l'ID de l'utilisateur connecté
        $data['user_id'] = Auth::id();

        return Post::create($data);
    }
}