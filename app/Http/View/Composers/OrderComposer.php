<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Order;

class OrderComposer
{
    
    public function compose(View $view)
    {
        // dd(\Auth::user());
        $unpaid = Order::where('status', '=', 0)
                ->where('user_id', '=', \Auth::user()->id)
                ->count();
        $view->with('unpaid', $unpaid);
    }
}