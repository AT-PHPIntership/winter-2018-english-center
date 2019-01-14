<?php 
namespace App\Services;

use App\Models\Exercise;

class ExerciseService
{
    public function index()
    {
        $exercise = Exercise::with('lesson')->orderBy('created_at', config('define.courses.order_by_desc'))->paginate(config('define.courses.limit_rows'));
        // dd($exercise);
        return $exercise;
    }    
}
?>
