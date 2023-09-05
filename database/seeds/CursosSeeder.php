<?php
namespace Database\Seeds;

use App\Cursos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    public function run()::void
    {
		Curso::create(
			[
			'nomecurso' => 'Arquitetura',
			'cargahoraria' => '4000.00',
			'ativo' => 'S'
			]
		);
    }
}
