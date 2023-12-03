<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\TipoUser;
use App\Models\TipoPublicacao;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

       
       
        \App\Models\TipoUser::factory()->create([
            'tipo_user' => 'cliente'
        ]);
        \App\Models\TipoUser::factory()->create([
            'tipo_user' => 'crítico'
        ]);
        \App\Models\TipoUser::factory()->create([
            'tipo_user' => 'admin'
        ]);
        \App\Models\TipoPublicacao::factory()->create([
            'tipo_publcacao' => 'filme'
        ]);
        \App\Models\TipoPublicacao::factory()->create([
            'tipo_publcacao' => 'livro'
        ]);
        \App\Models\TipoPublicacao::factory()->create([
            'tipo_publcacao' => 'jogo'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123123123'),
            'date' => '2023-04-23',
            'tipo_user' => '3',
        ]);
    }
}
