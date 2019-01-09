<?php

use Illuminate\Database\Seeder;
use App\Models\Vocabulary;

class VocabulariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Vocabulary::class, 10)->create();
    }
}
