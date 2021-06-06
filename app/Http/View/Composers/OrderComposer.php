<?php

namespace App\Http\View\Composers;

// use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Models\Order;

class OrderComposer
{
    

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // dd(\Auth::user());
        $unpaid = Order::where('status', '=', 0)
                ->where('user_id', '=', \Auth::user()->id)
                ->count();
        $view->with('unpaid', $unpaid);
    }
}