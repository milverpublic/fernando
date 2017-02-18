<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions=[
            [
                'name' => 'Facial',
                'input_type' => 'text',
                'model' => 'question1',
                'section_id' => 8
            ],
            [
                'name' => 'Esqueletal',
                'input_type' => 'text',
                'model' => 'question2',
                'section_id' => 8
            ],
            [
                'name' => 'Dental',
                'input_type' => 'text',
                'model' => 'question3',
                'section_id' => 8
            ],
            [
                'name' => 'Resumen plan tratamiento',
                'input_type' => 'text',
                'model' => 'question4',
                'section_id' => 9
            ],
            [
                'name' => 'Fecha de inicio',
                'input_type' => 'text',
                'model' => 'question5',
                'section_id' => 10
            ],
            [
                'name' => 'Fecha de finalizacion',
                'input_type' => 'text',
                'model' => 'question6',
                'section_id' => 11
            ],
            [
                'name' => 'El paciente ha padecido o padece:',
                'input_type' => 'checkbox',
                'model' => 'question7',
                'section_id' => 12
            ],
            [
                'name' => 'Comentarios:',
                'input_type' => 'textarea',
                'model' => 'question8',
                'section_id' => 12
            ],
            [
                'name' => 'Tratamiento medico durante los ultimos anios',
                'input_type' => 'radiobutton',
                'model' => 'question9',
                'section_id' => 12
            ],
            [
                'name' => 'Especifique:',
                'input_type' => 'text',
                'model' => 'question10',
                'section_id' => 12
            ],
            [
                'name' => 'Tratamiento o medicacion actual',
                'input_type' => 'text',
                'model' => 'question11',
                'section_id' => 12
            ],
            [
                'name' => 'Ronca',
                'model' => 'question12',
                'input_type' => 'radiobutton',
                'section_id' => 12
            ],
            [
                'name' => 'Anginas o amigdalitis frecuentes',
                'input_type' => 'radiobutton',
                'model' => 'question13',
                'section_id' => 12
            ],
            [
                'name' => 'Dificultades para masticar o tragar',
                'input_type' => 'radiobutton',
                'model' => 'question14',
                'section_id' => 12
            ],
            [
                'name' => 'Tratamiento de garganta, nariz u oido previo',
                'input_type' => 'radiobutton',
                'model' => 'question15',
                'section_id' => 12
            ],
            [
                'name' => 'Habitos',
                'input_type' => 'radiobutton',
                'model' => 'question16',
                'section_id' => 12
            ],
            [
                'name' => 'Especifique',
                'input_type' => 'text',
                'model' => 'question17',
                'section_id' => 12
            ],
            [
                'name' => 'Traumatismos',
                'input_type' => 'radiobutton',
                'model' => 'question18',
                'section_id' => 13
            ],
            [
                'name' => 'Especifique',
                'input_type' => 'text',
                'model' => 'question19',
                'section_id' => 13
            ],
            [
                'name' => 'Fecha de ultima visita el odontologo',
                'input_type' => 'text',
                'model' => 'question20',
                'section_id' => 13
            ],
            [
                'name' => 'Tratamiento realizado',
                'input_type' => 'text',
                'model' => 'question21',
                'section_id' => 13
            ],
            [
                'name' => 'Tratamiento ortodoncico previo',
                'input_type' => 'radiobutton',
                'model' => 'question22',
                'section_id' => 14
            ],
            [
                'name' => 'Tipo de tratamiento',
                'input_type' => 'text',
                'model' => 'question23',
                'section_id' => 14
            ],
            [
                'name' => 'Duracion',
                'input_type' => 'text',
                'model' => 'question24',
                'section_id' => 14
            ],
            [
                'name' => 'Consulta solicita por:',
                'input_type' => 'checkbox',
                'model' => 'question25',
                'section_id' => 14
            ],
            [
                'name' => 'Interes del paciente por el tratamiento ortodoncico',
                'input_type' => 'checkbox',
                'model' => 'question26',
                'section_id' => 14
            ],
            [
                'name' => 'Relacion con el paciente',
                'input_type' => 'text',
                'model' => 'question27',
                'section_id' => 14
            ],
            [
                'name' => 'Firma y aclaracion de la persona que autoriza el tratamiento',
                'input_type' => 'radiobutton',
                'model' => 'question28',
                'section_id' => 14
            ],
            [
                'name' => 'Estructura facial',
                'input_type' => 'radiobutton',
                'model' => 'question29',
                'section_id' => 15
            ],
            [
                'name' => 'Especificar:',
                'input_type' => 'text',
                'model' => 'question30',
                'section_id' => 15
            ],
            [
                'name' => 'Perfil',
                'input_type' => 'radiobutton',
                'model' => 'question31',
                'section_id' => 15
            ],
            [
                'name' => 'Maxilar',
                'input_type' => 'radiobutton',
                'model' => 'question32',
                'section_id' => 15
            ],
            [
                'name' => 'Labio superior',
                'input_type' => 'radiobutton',
                'model' => 'question33',
                'section_id' => 15
            ],
            [
                'name' => 'Labio inferior',
                'input_type' => 'radiobutton',
                'model' => 'question34',
                'section_id' => 15
            ],
            [
                'name' => 'Surco mentolabial',
                'input_type' => 'radiobutton',
                'model' => 'question35',
                'section_id' => 15
            ],
            [
                'name' => 'Labios en descanso',
                'input_type' => 'radiobutton',
                'model' => 'question36',
                'section_id' => 15
            ],
            [
                'name' => 'Cierre labial',
                'input_type' => 'radiobutton',
                'model' => 'question37',
                'section_id' => 15
            ],
            [
                'name' => 'Nariz',
                'input_type' => 'radiobutton',
                'model' => 'question38',
                'section_id' => 15
            ],
            [
                'name' => 'Respiracion',
                'input_type' => 'radiobutton',
                'model' => 'question39',
                'section_id' => 15
            ],
            [
                'name' => 'Deglucion',
                'input_type' => 'radiobutton',
                'model' => 'question40',
                'section_id' => 15
            ],
            [
                'name' => 'Diccion',
                'input_type' => 'radiobutton',
                'model' => 'question41',
                'section_id' => 15
            ],
            [
                'name' => 'Habitos',
                'input_type' => 'text',
                'model' => 'question42',
                'section_id' => 15
            ],
            [
                'name' => 'Evaluacion de ATM',
                'input_type' => 'text',
                'model' => 'question43',
                'section_id' => 15
            ],
            [
                'name' => 'Encias',
                'input_type' => 'radiobutton',
                'model' => 'question44',
                'section_id' => 16
            ],
            [
                'name' => 'Lengua',
                'input_type' => 'radiobutton',
                'model' => 'question45',
                'section_id' => 16
            ],
            [
                'name' => 'Frenillo lengual',
                'input_type' => 'radiobutton',
                'model' => 'question46',
                'section_id' => 16
            ],
            [
                'name' => 'Frenillo superior',
                'input_type' => 'radiobutton',
                'model' => 'question47',
                'section_id' => 16
            ],
            [
                'name' => 'Amigdalas',
                'input_type' => 'radiobutton',
                'model' => 'question48',
                'section_id' => 16
            ],
            [
                'name' => 'Caries',
                'input_type' => 'radiobutton',
                'model' => 'question49',
                'section_id' => 16
            ],
            [
                'name' => 'Higiene',
                'input_type' => 'radiobutton',
                'model' => 'question50',
                'section_id' => 16
            ],
            [
                'name' => 'Diastemas',
                'input_type' => 'radiobutton',
                'model' => 'question51',
                'section_id' => 16
            ],
            [
                'name' => 'Denticion',
                'input_type' => 'radiobutton',
                'model' => 'question52',
                'section_id' => 16
            ],
            [
                'name' => 'Over Jet',
                'input_type' => 'radiobutton',
                'model' => 'question53',
                'section_id' => 16
            ],
            [
                'name' => 'Over Bite',
                'input_type' => 'radiobutton',
                'model' => 'question54',
                'section_id' => 16
            ],
            [
                'name' => 'Mordida cruzada',
                'input_type' => 'radiobutton',
                'model' => 'question55',
                'section_id' => 16
            ],
            [
                'name' => 'Mordida abierta',
                'input_type' => 'radiobutton',
                'model' => 'question56',
                'section_id' => 16
            ],
            [
                'name' => 'Apinamiento Sup:',
                'input_type' => 'radiobutton',
                'model' => 'question57',
                'section_id' => 16
            ],
            [
                'name' => 'Apinamiento Inf:',
                'input_type' => 'radiobutton',
                'model' => 'question58',
                'section_id' => 16
            ],
            [
                'name' => 'Paladar:',
                'input_type' => 'radiobutton',
                'model' => 'question59',
                'section_id' => 16
            ],
            [
                'name' => 'Linea media superior:',
                'input_type' => 'radiobutton',
                'model' => 'question60',
                'section_id' => 16
            ],
            [
                'name' => 'Linea media superior',
                'input_type' => 'radiobutton',
                'model' => 'question61',
                'section_id' => 16
            ],
            [
                'name' => 'Piezas presentes en boca',
                'model' => 'question62',
                'section_id' => 17
            ],
            [
                'name' => 'Dentecion permanente',
                'model' => 'question63',
                'section_id' => 18
            ],
            [
                'name' => 'Denticion temporaria',
                'model' => 'question64',
                'section_id' => 18
            ],
            [
                'name' => 'Maxilar superior:',
                'model' => 'question65',
                'section_id' => 19
            ],
            [
                'name' => 'Maxilar inferior:',
                'model' => 'question66',
                'section_id' => 19
            ],
            [
                'name' => 'Indice de Bolton',
                'model' => 'question67',
                'section_id' => 20
            ],
            [
                'name' => 'Indice de Carey',
                'model' => 'question68',
                'section_id' => 20
            ],
            [
                'name' => 'Indice de Tanaka-Johnston',
                'model' => 'question69',
                'section_id' => 20
            ],
            [
                'name' => 'Indice de Moyers',
                'model' => 'question70',
                'section_id' => 20
            ],
            [
                'name' => 'Indice de:',
                'model' => 'question71',
                'section_id' => 20
            ],
            [
                'name' => 'Facial',
                'model' => 'question72',
                'section_id' => 22
            ],
            [
                'name' => 'Esqueletal',
                'model' => 'question73',
                'section_id' => 22
            ],
            [
                'name' => 'Dental',
                'model' => 'question74',
                'section_id' => 22
            ],
        ];
        foreach ($questions as $question)
            DB::table('questions')->insert($question);
    }
}
