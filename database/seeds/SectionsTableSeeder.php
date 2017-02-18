<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections=[
            //sections
            [
                'name_section' => 'Resumen general',
                'code_section' => 'SECCION I',
                'order' => 2,
                'route' => 'section2',
                'icon' => 'fa fa-address-card-o',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Informacion del paciente',
                'code_section' => 'SECCION II',
                'order' => 3,
                'route' => 'section3',
                'icon' => 'fa fa-info-circle ',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Examen clinico',
                'code_section' => 'SECCION III',
                'order' => 4,
                'route' => 'section4',
                'icon' => 'fa fa-clipboard',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Estudio de modelos',
                'code_section' => 'SECCION IV',
                'order' => 5,
                'route' => 'section5',
                'icon' => 'fa fa-modx',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Diagnostico',
                'code_section' => 'SECCION VII',
                'order' => 6,
                'route' => 'section6',
                'icon' => 'fa fa-stethoscope',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Plan de tratamiento',
                'code_section' => 'SECCION VIII',
                'order' => 7,
                'route' => 'section7',
                'icon' => 'fa fa-calendar-o',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Registro paciente',
                'code_section' => 'SECCION 0',
                'order' => 1,
                'route' => 'section1',
                'icon' => 'fa fa-user-plus',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],

            //subsection 1
            [
                'name_section' => 'Resumen Diagnostico',
                'section_id' => 1,
                'code_section' => 'I-a',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Resumen plan de tratamiento',
                'section_id' => 1,
                'code_section' => 'I-b',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Fecha de inicio',
                'section_id' => 1,
                'code_section' => 'I-c',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Fecha de finalizacion',
                'section_id' => 1,
                'code_section' => 'I-d',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            //subsection 2
            [
                'name_section' => 'Historia Medica',
                'section_id' => 2,
                'code_section' => 'II-a',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Historia Dental',
                'section_id' => 2,
                'code_section' => 'II-b',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Historia ortodoncica',
                'section_id' => 2,
                'code_section' => 'II-c',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            //subsection 3
            [
                'name_section' => 'Examen extra-bucal',
                'section_id' => 3,
                'code_section' => 'III-a',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Examen intrabucal',
                'section_id' => 3,
                'code_section' => 'III-b',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Piezas presentes en boca',
                'section_id' => 3,
                'code_section' => 'III-c',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Oclusion',
                'section_id' => 3,
                'code_section' => 'III-d',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            //subsection 4
            [
                'name_section' => 'Discrepancia dentaria',
                'section_id' => 4,
                'code_section' => 'IV-a',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Indices',
                'section_id' => 4,
                'code_section' => 'IV-b',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name_section' => 'Montaje en articular',
                'section_id' => 4,
                'code_section' => 'IV-c',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            //subsection 5
            [
                'name_section' => 'Diagnostico',
                'section_id' => 5,
                'code_section' => 'VII-a',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            //subsection 6
            [
                'name_section' => 'Plan de tratamiento',
                'section_id' => 6,
                'code_section' => 'VIII-a',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ];
        foreach ($sections as $section)
            DB::table('sections')->insert($section);
    }
}
