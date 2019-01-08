<?php
namespace App\Services;

use App\Models\Vocabulary;
use Excel;

class VocabularyService
{
    /**
     * Function index get all vocabulary
     *
     * @return App\Services\VocabularyService
    **/
    public function index()
    {
        return Vocabulary::orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
    }

    public function import($request)
    {
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
        if ($data->count()) {
            foreach ($data as $value) {
                $arr[] = ['vocabulary' => $value->vocabulary, 'word_type' => $value->word_type, 'means' => $value->means, 'sound' => $value->sound];
            }
 
            if (!empty($arr)) {
                Vocabulary::insert($arr);
            }
        }
    }

    // public function uploadSound($sound)
    // {
    //     $file_name = time() . '-' . $sound->getClientOriginalName();
    //     $file = $sound->move('storage/sound', $file_name);
    //     $sound = new Vocabulary(['path' => $file->getPathname()]);
    //     $this->sound()->save($sound);
    // }
}
