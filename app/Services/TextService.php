<?php

namespace App\Services;

use App\Models\Text;

class TextService
{
    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Text::all());
        $texts = Text::paginate(config('define.page_site'));
        // dd($texts);
        return $texts;
    }
}
