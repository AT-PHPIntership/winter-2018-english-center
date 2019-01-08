<?php
namespace App\Services;

use App\Models\Vocabulary;

class VocabularyService
{
    /**
     * Function index get all vocabulary
     *
     * @return App\Services\VocabularyService
    **/
    public function index()
    {
        return Vocabulary::all();
    }
}
