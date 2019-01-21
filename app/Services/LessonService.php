<?php

namespace App\Services;

use App\Models\Lesson;
use Config\define;

class LessonService
{
    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::with(['course', 'level'])->orderBy('created_at', config('define.order_by_desc'))->paginate(config('define.page_site'));
        return $lessons;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        $lesson = Lesson::create($data);
        $lesson->vocabularies()->attach($data['vocabularies_id']);
        return $lesson;
    }

    /**
     * Edit resource in storage.
     *
     * @param \Illuminate\Http\Request $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {
        return Lesson::where('id', $data->id)->with('vocabularies')->first();
    }

    /**
    * Handle update user to database
    *
    * @param \Illuminate\Http\Request $data   data
    * @param Lesson                   $lesson lesson
    *
    * @return void
    */
    public function update($data, $lesson)
    {
        $lesson->update($data);
        if (isset($data['vocabulary_id'])) {
            $lesson->vocabularies()->sync($data['vocabulary_id']);
        }
    }

    /**
     * Function destroy lesson
     *
     * @param Lesson $lesson lesson
     *
     * @return App\Services\LessonService
    **/
    public function destroy($lesson)
    {
        $lesson->vocabularies()->detach();
        $lesson->delete();
    }
}
