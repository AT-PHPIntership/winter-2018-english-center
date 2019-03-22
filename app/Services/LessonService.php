<?php
namespace App\Services;

use App\Models\Lesson;
use App\Models\Course;
use App\Models\User;
use App\Models\Rating;
use App\Models\Role;
use Config\define;
use DB;
use App\Models\Answer;
use Event;
use Auth;
use JavaScript;
use Carbon;

class LessonService
{
    /**
     * Function index get all lesson
     *
     * @return App\Services\LessonService
    **/
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
        // dd($data['exercises_id']);
        // $lesson->exercises()->create($data);
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
        return $data->load(['vocabularies']);
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

    
    /**
     * Show resource in storage.
     *
     * @param \Illuminate\Http\Request $lesson lesson
     *
     * @return \Illuminate\Http\Response
     */
    public function show($lesson)
    {
        return $lesson->load(['vocabularies', 'exercises', 'exercises.questions', 'exercises.questions.answers']);
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $lesson lesson
     *
     * @return App\Services\LessonService
    **/
    public function getLesson($lesson)
    {
        $previousOrder = Lesson::where([
            ['course_id', '=', $lesson->course_id],
            ['order', '<', $lesson->order],
        ])->max('order');
        $previousLesson = Lesson::where('order', $previousOrder)->pluck('id')->first();
        $nextOrder = Lesson::where([
            ['course_id', '=', $lesson->course_id],
            ['order', '>', $lesson->order],
        ])->min('order');
        $nextLesson = Lesson::where('order', $nextOrder)->pluck('id')->first();
        JavaScript::put([
            'navigate' => [
                'previous' => $previousLesson,
                'next' => $nextLesson,
            ]
        ]);
        return $lesson->load('exercises.questions');
    }

    /**
     * Function index get recent lesson
     *
     * @return App\Services\LessonService
    **/
    public function recentLesson()
    {
        return Lesson::orderBy('created_at', config('define.order_by_desc'))->limit(config('define.recent_lessons'))->get();
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $answer   answer
     * @param \Illuminate\Http\Request $userId   user
     * @param \Illuminate\Http\Request $lessonId lesson
     * @param \Illuminate\Http\Request $courseId lesson
     *
     * @return App\Services\LessonService
    **/
    public function resutlLesson($answer, $userId, $lessonId, $courseId)
    {
        // dd($answer);
        $result = [];
        DB::table('course_user')->updateOrInsert(
            [
                'user_id' => $userId,
                'course_id'=> $courseId
            ],
            [ 'learn_time' => Carbon\Carbon::now() ]
        );
        DB::table('lesson_user')->updateOrInsert(
            [
                'user_id' => $userId,
                'lesson_id'=> $lessonId
            ],
            [ 'learn_time' => Carbon\Carbon::now() ]
        );
        foreach ($answer as $value) {
            DB::table('user_answers')->insert([
                'user_id' => $userId,
                'answer_id'=> $value
            ]);
            $val = Answer::where('id', $value)->first()["status"];
            if ($val == 1) {
                $correct[] = $value;
            }
        }
        $role  = User::find($userId)->role->id;
        // $flag = Lesson::with('users')->where('id', $lessonId)->pluck('role')->first();
        $goalableLesson = Lesson::find(intval($lessonId))->goals->pluck('goal_id')->first();
        $goalLesson = \DB::table('goals')->select('goal')->where('id', $goalableLesson)->first()->goal;
        $lesson = Lesson::with('course')->where('id', intval($lessonId))->get();
        $totalLesson = $lesson->pluck('course')->pluck('id')->first();
        $order = Lesson::where('id', $lessonId)->pluck('order')->first();
        $nextOrder = Lesson::where([
            ['course_id', '=', $courseId],
            ['order', '>', $order],
        ])->min('order');
        $nextLesson = Lesson::where('order', $nextOrder)->pluck('role')->first();
        // dd($nextLesson);
        if (!isset($correct)) {
            $result['correct'] = 0;
        } else {
            $result['correct'] = $correct;
        }
        $result['total'] = $answer;
        $result['goal'] = $goalLesson;
        $result['courseId'] = $totalLesson + 1;
        $result['role'] = $role;
        // $result['flag'] = $flag;
        $result['nextLesson'] = $nextLesson;
        return $result;
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $lesson lesson
     *
     * @return App\Services\LessonService
    **/
    public function getPrevNextLesson($lesson)
    {
        $previousLesson = Lesson::where([
            ['course_id', '=', $lesson->course_id],
            ['id', '<', $lesson->id],
        ])->max('id');
        $nextLesson = Lesson::where([
            ['course_id', '=', $lesson->course_id],
            ['id', '>', $lesson->id],
        ])->min('id');
        return [$previousLesson, $nextLesson];
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $id lesson
     *
     * @return App\Services\LessonService
    **/
    public function countViewLesson($id)
    {
        $lesson = Lesson::find($id);
        Event::fire('lessons.view', $lesson);
        return $lesson;
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $lesson lesson
     *
     * @return App\Services\LessonService
    **/
    public function upgradeVip($lesson)
    {
       
        Auth::user()->update([
            'role_id' => Role::select('id')->where('name', Role::ROLE_VIP)->pluck('id')->first(),
        ]);
        $previous = Lesson::where('id', $lesson['lesson_id'])->pluck('order')->first();
        return Lesson::where('order', $previous + 1)->pluck('id')->first();
    }

    /**
     * Function index get recent lesson
     *
     * @param \Illuminate\Http\Request $id lesson
     *
     * @return App\Services\LessonService
    **/
    public function hasLearnLatestLesson($id)
    {
        if (Auth::check()) {
            $lesson = Lesson::select('id', 'order')->where('course_id', $id)->get();
            if ($lesson->max('order') === Auth::user()->lessons->where('course_id', $id)->max('order')) {
                return true;
            }
            return false;
        }
    }
}
