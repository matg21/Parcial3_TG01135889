<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Alumno::class);
        $this->call(Profesor::class);
        $this->call(Cursos::class);
        $this->call(notas::class);
    }
}
