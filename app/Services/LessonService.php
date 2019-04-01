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
        return Lesson::with(['course', 'level'])->latest()->paginate(config('define.page_site'));
    }

    /**
     * Function index get all lesson
     *
     * @return App\Services\LessonService
    **/
    public function allLesson()
    {
        return Lesson::with(['course', 'level'])->get();
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
        return Lesson::orderBy('created_at', config('define.order_by_desc'))->limit(3)->get();
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
        $learnedCourse = DB::table('course_user')->where('user_id', $userId)->select('course_user.*')->pluck('course_id');
        $totalCourse = DB::table('course_user')->where('user_id', $userId)->select(DB::raw('count(*) as totalCourse'))->groupBy('course_user.user_id')->pluck('totalCourse')->first();
        
        $result = [];
        //save data in course_user
        DB::table('course_user')->updateOrInsert(
            [
                'user_id' => $userId,
                'course_id'=> $courseId
            ],
            [ 'learn_time' => Carbon\Carbon::now() ]
        );

        //save data in lesson_user
        DB::table('lesson_user')->updateOrInsert(
            [
                'user_id' => $userId,
                'lesson_id'=> $lessonId
            ],
            [
                'learn_time' => Carbon\Carbon::now(),
            ]
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
        $goalableLesson = Lesson::find(intval($lessonId))->goals->pluck('goal_id')->first();
        $goalLesson = optional(\DB::table('goals')->select('goal')->where('id', $goalableLesson)->first())->goal;
        $lesson = Lesson::with('course')->where('id', intval($lessonId))->get();
        $totalLesson = $lesson->pluck('course')->pluck('id')->first();
        $order = Lesson::where('id', $lessonId)->pluck('order')->first();

        if (!isset($correct)) {
            DB::table('schedules')->updateOrInsert(
                [
                    'user_id' => $userId,
                    'lesson_id' => $lessonId,
                    'course_id' => $courseId,
                ],
                [
                    'score' => 0,
                    'created_at' => Carbon\Carbon::now(),
                ]
            );
            $result['correct'] = 0;
        } else {
            DB::table('schedules')->updateOrInsert(
                [
                    'user_id' => $userId,
                    'lesson_id' => $lessonId,
                    'course_id' => $courseId,
                ],
                [
                    'score' => count($correct),
                    'created_at' => Carbon\Carbon::now(),
                ]
            );
            $result['correct'] = $correct;
        }
        
        $score = DB::table('schedules')->select(DB::raw('sum(score) as score'))->groupBy('schedules.user_id', 'schedules.course_id')->first()->score;
        
        $role  = User::find($userId)->role->name;
        $result['total'] = $answer;
        $result['goal'] = $goalLesson;
        $result['courseId'] = $totalLesson + 1;
        $result['score'] = $score;
        $result['totalCourse'] = $totalCourse;
        $result['learnedCourse'] = $learnedCourse;
        return $result;
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
     * @return App\Services\LessonService
    **/
    public function upgradeVip()
    {
        $role = Auth::user()->role->name;
        if ($role == 'Trial') {
            Auth::user()->update([
                'role_id' => Role::select('id')->where('name', Role::ROLE_VIP)->pluck('id')->first(),
            ]);
        }
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

    /**
     * Function get caculator percent learn
     *
     * @param \Illuminate\Http\Request $lessonId lesson
     *
     * @return App\Services\LessonService
    **/
    public function progressLearn($lessonId)
    {
        if (Auth::check()) {
            $resultLesson = DB::table('schedules')->select('score')->where([
                ['lesson_id', $lessonId],
                ['user_id', Auth::user()->id],
            ])->first();
            if ($resultLesson == null) {
                return 0;
            } else {
                return $resultLesson->score / 5 * 100;
            }
        }
    }
}
