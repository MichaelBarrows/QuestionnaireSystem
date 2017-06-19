<?php

use Illuminate\Database\Seeder;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questionnaires')->insert([
            ['id' => 1,
                'title' => "Questionnaire Design",
                'public' => true,
                'author_id' => 1,
            ],
        ]);
    }
}
