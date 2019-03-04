<?php

namespace App\Http\ViewComposers;

use App\Services\RateService;
use Illuminate\View\View;

class RateComposer
{
    /**
     * Where to receipt roles from RateService.
     *
     * @var $ratesService
     */
    protected $ratesService;

    /**
     * Create a new controller instance.
     *
     * @param RateService $rates RateService
     *
     * @return void
     */
    public function __construct(RateService $rates)
    {
        $this->ratesService = $rates;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view View
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('rates', $this->ratesService->getAll());
    }
}
