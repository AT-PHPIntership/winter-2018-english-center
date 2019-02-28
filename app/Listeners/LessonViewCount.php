<?php

namespace App\Listeners;

use App\Events\ViewLessonHandler;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Lesson;
use Illuminate\Session\Store;

class LessonViewCount
{
    protected $session;

    /**
     * Create the event listener.
     *
     * @param Store $session sesson
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param Lesson $lesson lesson
     *
     * @return void
     */
    public function handle(Lesson $lesson)
    {
        if (!$this->isLessonViewed($lesson)) {
            $lesson->increment('count_view');
            $this->storeLesson($lesson);
        }
    }

    /**
     * Handle the Lesson is viewed.
     *
     * @param Lesson $lesson lesson
     *
     * @return void
     */
    private function isLessonViewed($lesson)
    {
        $viewed = $this->session->get('viewed_lessons', []);
        return array_key_exists($lesson->id, $viewed);
    }

    /**
     * Handle the storeLesson.
     *
     * @param Lesson $lesson lesson
     *
     * @return void
     */
    private function storeLesson($lesson)
    {
        $key = 'viewed_lessons.' . $lesson->id;
        $this->session->put($key, time());
    }
}
