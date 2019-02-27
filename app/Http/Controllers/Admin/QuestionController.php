<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\QuestionService;

class QuestionController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param Vocabulary $vocabulary vocabulary
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        app(QuestionService::class)->destroy($id);
        return redirect()->route('admin.exercises.index')->with('success', __('common.success'));
    }
}
