<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Product;

class HomeComposer
{
    // count product filter
    public function countProduct($start, $end){
        $numbers = Product::where('price', '>', $start)
                    ->where('price', '<', $end)
                    ->count();
        return $numbers;
    }

    public function compose(View $view)
    {
        $count_0_100 = $this->countProduct(0, 100);
        $count_101_200 = $this->countProduct(101, 200);

        $view->with([
            'count_0_100', $count_0_100,
            'count_101_200', $count_101_200
        ]);
    }
}
