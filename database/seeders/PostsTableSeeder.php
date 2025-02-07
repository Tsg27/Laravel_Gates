<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obter o ID dos usuários
        $userIds = DB::table('users')->pluck('id');

        // Criar posts para cada usuário
        foreach ($userIds as $userId) {
            DB::table('posts')->insert([
                [
                    'user_id' => $userId,
                    'title' => 'Post Title ' . $userId . ' - 1',
                    'content' => 'This is the content for post 1 of user ' . $userId,
                ],
                [
                    'user_id' => $userId,
                    'title' => 'Post Title ' . $userId . ' - 2',
                    'content' => 'This is the content for post 2 of user ' . $userId,
                ],
            ]);
        }
    }
}

