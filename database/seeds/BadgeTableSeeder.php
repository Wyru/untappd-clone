<?php

use Illuminate\Database\Seeder;
use App\Badge;

class BadgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Badge::create([
            'id' => 1,
            'description' => 'Bem vindo!'
        ]);
        Badge::create([
            'id' => 2,
            'description' => 'Bebendo no Happy our!'
        ]);
        Badge::create([
            'id' => 3,
            'description' => 'Ufa, hoje é sexta!'
        ]);
        Badge::create([
            'id' => 4,
            'description' => 'Bebeu 25 cervejas!'
        ]);
        Badge::create([
            'id' => 5,
            'description' => 'Bebeu 50 cervejas!'
        ]);
        Badge::create([
            'id' => 6,
            'description' => 'Bebeu 100 cervejas!'
        ]);
        Badge::create([
            'id' => 7,
            'description' => 'Expandindo Horizontes!'
        ]);

        Badge::create([
            'id' => 8,
            'description' => 'Bom de Copo!'
        ]);

        Badge::create([
            'id' => 9,
            'description' => 'Cliente Fiel!'
        ]);

        Badge::create([
            'id' => 10,
            'description' => 'Tem um amigo!'
        ]);
    }
}
