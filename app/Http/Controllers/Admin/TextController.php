<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TextService;

class TextController extends Controller
{
    /**
     * Where to receipt users from TextService.
     *
     * @var $textService
     */
    private $textService;

    /**
     * Create a new controller instance.
     *
     * @param TextService $textService TextService
     *
     * @return void
     */
    public function __construct(TextService $textService)
    {
        $this->textService = $textService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = $this->textService->index();
        return view('backend.texts.index', compact('texts'));
    }
}
