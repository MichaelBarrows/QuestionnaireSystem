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
        DB::table('questions')->insert([
            ['id' => 1,
                'number' => '1',
                'title' => "To what extent do you agree with the following statement: questionnaires are an effective method of collecting primary data?",
                'type' => 0,
                'questionnaire_id' => 1,
            ],
            ['id' => 2,
                'number' => '2',
                'title' => "How many respondents do you believe are required to gain an optimal amount of data for analysis?",
                'type' => 1,
                'questionnaire_id' => 1,
            ],
            ['id' => 3,
                'number' => '3',
                'title' => "Questionnaires are an effective method for gaining qualitative data?",
                'type' => 0,
                'questionnaire_id' => 1,
            ],
            ['id' => 4,
                'number' => '4',
                'title' => "Would you plan a questionnaire before creating it?",
                'type' => 0,
                'questionnaire_id' => 1,
            ],
            ['id' => 5,
                'number' => '5',
                'title' => "After how many questions would you get distracted whilst undertaking a questionnaire?",
                'type' => 1,
                'questionnaire_id' => 1,
            ],
            ['id' => 6,
                'number' => '6',
                'title' => "Thinking of the previous question, would the type of question make a difference?",
                'type' => 0,
                'questionnaire_id' => 1,
            ],
        ]);
    }
}
