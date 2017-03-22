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
                'required' => true,
                'section_id' => 8
            ],
            [
                'name' => 'Esqueletal',
                'input_type' => 'text',
                'model' => 'question2',
                'required' => true,
                'section_id' => 8
            ],
            [
                'name' => 'Dental',
                'input_type' => 'text',
                'model' => 'question3',
                'required' => true,
                'section_id' => 8
            ],
            [
                'name' => 'Resumen plan tratamiento',
                'input_type' => 'text',
                'model' => 'question4',
                'required' => true,
                'section_id' => 9
            ],
            [
                'name' => 'Fecha de inicio',
                'input_type' => 'text',
                'model' => 'question5',
                'required' => true,
                'section_id' => 10
            ],
            [
                'name' => 'Fecha de finalizacion',
                'input_type' => 'text',
                'model' => 'question6',
                'required' => true,
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
                'required' => true,
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
                'required' => true,
                'section_id' => 12
            ],
            [
                'name' => 'Anginas o amigdalitis frecuentes',
                'input_type' => 'radiobutton',
                'model' => 'question13',
                'required' => true,
                'section_id' => 12
            ],
            [
                'name' => 'Dificultades para masticar o tragar',
                'input_type' => 'radiobutton',
                'required' => true,
                'model' => 'question14',
                'section_id' => 12
            ],
            [
                'name' => 'Tratamiento de garganta, nariz u oido previo',
                'input_type' => 'radiobutton',
                'model' => 'question15',
                'required' => true,
                'section_id' => 12
            ],
            [
                'name' => 'Habitos',
                'input_type' => 'radiobutton',
                'model' => 'question16',
                'required' => true,
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
                'required' => true,
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
                'required' => true,
                'section_id' => 13
            ],
            [
                'name' => 'Tratamiento realizado',
                'input_type' => 'text',
                'model' => 'question21',
                'required' => true,
                'section_id' => 13
            ],
            [
                'name' => 'Tratamiento ortodoncico previo',
                'input_type' => 'radiobutton',
                'model' => 'question22',
                'required' => true,
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
                'input_type' => 'radiobutton',
                'model' => 'question25',
                'required' => true,
                'section_id' => 14
            ],
            [
                'name' => 'Interes del paciente por el tratamiento ortodoncico',
                'input_type' => 'radiobutton',
                'model' => 'question26',
                'required' => true,
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
                'required' => true,
                'section_id' => 14
            ],
            [
                'name' => 'Estructura facial',
                'input_type' => 'radiobutton',
                'model' => 'question29',
                'required' => true,
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
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Maxilar',
                'input_type' => 'radiobutton',
                'model' => 'question32',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Labio superior',
                'input_type' => 'radiobutton',
                'model' => 'question33',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Labio inferior',
                'input_type' => 'radiobutton',
                'model' => 'question34',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Surco mentolabial',
                'input_type' => 'radiobutton',
                'model' => 'question35',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Labios en descanso',
                'input_type' => 'radiobutton',
                'model' => 'question36',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Cierre labial',
                'input_type' => 'radiobutton',
                'model' => 'question37',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Nariz',
                'input_type' => 'radiobutton',
                'model' => 'question38',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Respiracion',
                'input_type' => 'radiobutton',
                'model' => 'question39',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Deglucion',
                'input_type' => 'radiobutton',
                'model' => 'question40',
                'required' => true,
                'section_id' => 15
            ],
            [
                'name' => 'Diccion',
                'input_type' => 'radiobutton',
                'model' => 'question41',
                'required' => true,
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
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Lengua',
                'input_type' => 'radiobutton',
                'model' => 'question45',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Frenillo lengual',
                'input_type' => 'radiobutton',
                'model' => 'question46',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Frenillo superior',
                'input_type' => 'radiobutton',
                'model' => 'question47',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Amigdalas',
                'input_type' => 'radiobutton',
                'model' => 'question48',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Caries',
                'input_type' => 'radiobutton',
                'model' => 'question49',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Higiene',
                'input_type' => 'radiobutton',
                'model' => 'question50',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Diastemas',
                'input_type' => 'radiobutton',
                'model' => 'question51',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Denticion',
                'input_type' => 'radiobutton',
                'model' => 'question52',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Over Jet',
                'input_type' => 'radiobutton',
                'model' => 'question53',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Over Bite',
                'input_type' => 'radiobutton',
                'model' => 'question54',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Mordida cruzada',
                'input_type' => 'radiobutton',
                'model' => 'question55',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Mordida abierta',
                'input_type' => 'radiobutton',
                'model' => 'question56',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Apinamiento Sup:',
                'input_type' => 'radiobutton',
                'model' => 'question57',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Apinamiento Inf:',
                'input_type' => 'radiobutton',
                'model' => 'question58',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Paladar:',
                'input_type' => 'radiobutton',
                'model' => 'question59',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Linea media superior:',
                'input_type' => 'radiobutton',
                'model' => 'question60',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Linea media superior',
                'input_type' => 'radiobutton',
                'model' => 'question61',
                'required' => true,
                'section_id' => 16
            ],
            [
                'name' => 'Piezas presentes en boca',
                'input_type' => 'checkbox',
                'model' => 'question62',
                'section_id' => 17
            ],
            [
                'name' => 'Dentecion permanente',
                'input_type' => 'checkbox',
                'model' => 'question63',
                'section_id' => 18
            ],
            [
                'name' => 'Denticion temporaria',
                'input_type' => 'checkbox',
                'model' => 'question64',
                'section_id' => 18
            ],
            [
                'name' => 'Maxilar superior:',
                'input_type' => 'checkbox',
                'model' => 'question65',
                'section_id' => 19
            ],
            [
                'name' => 'Maxilar inferior:',
                'input_type' => 'checkbox',
                'model' => 'question66',
                'section_id' => 19
            ],
            [
                'name' => 'Indice de Bolton',
                'input_type' => 'checkbox',
                'model' => 'question67',
                'section_id' => 20
            ],
            [
                'name' => 'Indice de Carey',
                'input_type' => 'checkbox',
                'model' => 'question68',
                'section_id' => 20
            ],
            [
                'name' => 'Indice de Tanaka-Johnston',
                'input_type' => 'checkbox',
                'model' => 'question69',
                'section_id' => 20
            ],
            [
                'name' => 'Indice de Moyers',
                'input_type' => 'checkbox',
                'model' => 'question70',
                'section_id' => 20
            ],
            [
                'name' => 'Indice de:',
                'input_type' => 'checkbox',
                'model' => 'question71',
                'section_id' => 20
            ],
            [
                'name' => 'Facial',
                'input_type' => 'textarea',
                'model' => 'question72',
                'section_id' => 22
            ],
            [
                'name' => 'Esqueletal',
                'input_type' => 'textarea',
                'model' => 'question73',
                'section_id' => 22
            ],
            [
                'name' => 'Dental',
                'input_type' => 'textarea',
                'model' => 'question74',
                'section_id' => 22
            ],
            [
                'name' => 'Facial',
                'input_type' => 'textarea',
                'model' => 'question75',
                'section_id' => 23
            ],
            [
                'name' => 'Esqueletal',
                'input_type' => 'textarea',
                'model' => 'question76',
                'section_id' => 23
            ],
            [
                'name' => 'Dental',
                'input_type' => 'textarea',
                'model' => 'question77',
                'section_id' => 23
            ],
            [
                'name' => 'Other',
                'input_type' => 'textarea',
                'model' => 'question78',
                'section_id' => 23
            ],
        ];
        foreach ($questions as $question)
            DB::table('questions')->insert($question);
    }
}
