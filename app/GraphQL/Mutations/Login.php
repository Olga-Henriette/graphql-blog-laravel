<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final readonly class Login
{
    /**
     * @param  array{email: string}  $args
     * @return array{token: string, user: \App\Models\User}
     */
    public function __invoke(null $_, array $args): array
    {
        $email = strtolower($args['email']);

        // Recherche de l'utilisateur en base de données
        $user = User::where('email', $email)->first();

        if (! $user) {
            throw new \Exception('Authentication failed: User not found.');
        }

        // Génération du Token via Sanctum 
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retourne la structure attendue par AuthPayload
        return [
            'token' => $token,
            'user' => $user,
        ];
    }
}