<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TextService;
use App\Http\Requests\TextRequest;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.texts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TextRequest $request Request
     *
     * @return void
     */
    public function store(TextRequest $request)
    {
        $data = $request->except(['_token','_method']);
        if ($request->hasFile('url')) {
            $data['url'] = $this->imageService->uploadImage($data['url']);
        }
        $this->userService->store($request->all());
        return redirect()->route('admin.users.index')->with('success', __('common.success'));
    }
}
