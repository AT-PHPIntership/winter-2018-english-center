<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Session;

class Filter
{
    private $session;

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
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Closure                 $next    next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lessons = $this->getViewedLessons();

        if (!is_null($lessons)) {
            $lessons = $this->cleanExpiredViews($lessons);
            $this->storeLessons($lessons);
        }

        return $next($request);
    }

    /**
     * Handle get Lessons Viewed.
     *
     * @return Illuminate\Session\Store
     */
    private function getViewedLessons()
    {
        return $this->session->get('viewed_lessons', null);
    }

    /**
     * Handle an clean Expired Views.
     *
     * @param Lesson $lessons lesson
     *
     * @return time count view
     */
    private function cleanExpiredViews($lessons)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($lessons, function ($timestamp) use ($time, $throttleTime) {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    /**
     * Handle store Lessons.
     *
     * @param Lesson $lessons lesson
     *
     * @return void
     */
    private function storeLessons($lessons)
    {
        $this->session->put('viewed_lessons', $lessons);
    }
}
