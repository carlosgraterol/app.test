<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Delito;

class DelitosTableSeeder extends Seeder
{
    public function run()
    {
        Delito::create([
			'nombre_delito' => 'Lavado de activos (Ley 20.393)',
		]);

		Delito::create([
			'nombre_delito' => 'Financiamiento de Terrorismo (Ley 20.393)',
		]);

		Delito::create([
			'nombre_delito' => 'Cohecho a funcionarios públicos nacionales o extranjeros (Ley 20.393)',
		]);

		Delito::create([
			'nombre_delito' => 'Receptación (Ley 20.393)',
		]);

		Delito::create([
			'nombre_delito' => 'Administración desleal (Ley 20.393)',
		]);
    }
}
