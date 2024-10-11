<?php

namespace Database\Seeders;

use App\Models\Usuario;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Usuario::Create([
            'nome' => Str::random(20),
            'cpf' => Str::random(14),
            'email' => Str::random(20)
        ]);
    }
}
