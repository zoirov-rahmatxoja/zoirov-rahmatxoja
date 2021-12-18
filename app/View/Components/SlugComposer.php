<?php


namespace App\View\Slug;

use App\Models\Slug;
use Illuminate\View\View;

class SlugComposer
{
    public function compose(View $view)
    {
        $market = Slug::all();
        $view->with('market', $market);
    }
}