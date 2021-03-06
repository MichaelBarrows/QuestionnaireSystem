<?php

use Illuminate\Database\Seeder;

class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responses')->insert([
            ['id' => 1,
                'respondent_id' => "1",
                'answer_id' => 2,
            ],
            ['id' => 2,
                'respondent_id' => "1",
                'answer_id' => 17,
            ],
            ['id' => 3,
                'respondent_id' => "1",
                'answer_id' => 8,
            ],
            ['id' => 4,
                'respondent_id' => "1",
                'answer_id' => 12,
            ],
            ['id' => 5,
                'respondent_id' => "1",
                'answer_id' => 18,
            ],
            ['id' => 6,
                'respondent_id' => "1",
                'answer_id' => 14,
            ],
            ['id' => 7,
                'respondent_id' => "2",
                'answer_id' => 1,
            ],
            ['id' => 8,
                'respondent_id' => "2",
                'answer_id' => 19
            ],
            ['id' => 9,
                'respondent_id' => "2",
                'answer_id' => 9,
            ],
            ['id' => 10,
                'respondent_id' => "2",
                'answer_id' => 13,
            ],
            ['id' => 11,
                'respondent_id' => "2",
                'answer_id' => 20,
            ],
            ['id' => 12,
                'respondent_id' => "2",
                'answer_id' => 16,
            ],
            ['id' => 13,
                'respondent_id' => "3",
                'answer_id' => 1,
            ],
            ['id' => 14,
                'respondent_id' => "3",
                'answer_id' => 21,
            ],
            ['id' => 15,
                'respondent_id' => "3",
                'answer_id' => 9,
            ],
            ['id' => 16,
                'respondent_id' => "3",
                'answer_id' => 11,
            ],
            ['id' => 17,
                'respondent_id' => "3",
                'answer_id' => 22,
            ],
            ['id' => 18,
                'respondent_id' => "3",
                'answer_id' => 15,
            ],
            ['id' => 19,
                'respondent_id' => "4",
                'answer_id' => 2,
            ],
            ['id' => 20,
                'respondent_id' => "4",
                'answer_id' => 23,
            ],
            ['id' => 21,
                'respondent_id' => "4",
                'answer_id' => 9,
            ],
            ['id' => 22,
                'respondent_id' => "4",
                'answer_id' => 11,
            ],
            ['id' => 23,
                'respondent_id' => "4",
                'answer_id' => 20,
            ],
            ['id' => 24,
                'respondent_id' => "4",
                'answer_id' => 14,
            ],
            ['id' => 25,
                'respondent_id' => "5",
                'answer_id' => 1,
            ],
            ['id' => 26,
                'respondent_id' => "5",
                'answer_id' => 25,
            ],
            ['id' => 27,
                'respondent_id' => "5",
                'answer_id' => 7,
            ],
            ['id' => 28,
                'respondent_id' => "5",
                'answer_id' => '13',
            ],
            ['id' => 29,
                'respondent_id' => "5",
                'answer_id' => 22,
            ],
            ['id' => 30,
                'respondent_id' => "5",
                'answer_id' => 14,
            ],
        ]);
    }
}
