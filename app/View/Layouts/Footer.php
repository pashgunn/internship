<?php

namespace App\View\Layouts;

use App\Contracts\Repositories\SalonRepositoryContract;
use Illuminate\View\Component;

class Footer extends Component
{
    public array $footerSalons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SalonRepositoryContract $salonRepository)
    {
        $this->footerSalons = $salonRepository->randomSalons([
            'limit' => 2,
            'in_random_order' => true
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.footer');
    }
}
