<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Product;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    //count product filter
    public function countProduct($start, $end){
        $numbers = Product::where('price', '>', $start)
                    ->where('price', '<', $end)
                    ->count();
        return $numbers;
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $count_0_100 = $this->countProduct(0, 100);
        $count_101_200 = $this->countProduct(101, 200);

        // Chia sẻ dữ liệu với tất cả các view
        View::share('key', 'value');

        // Ví dụ chia sẻ một biến với tất cả các view
        View::share('count_0_100', $count_0_100);
        View::share('count_101_200', $count_101_200);

        // Chia sẻ một biến với tất cả các view thông qua một closure
        View::composer('*', function ($view) {
            $view->with('globalVariable', 'This is a global variable');
        });
    }
}
