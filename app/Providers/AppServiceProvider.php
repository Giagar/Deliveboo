<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
/*     public function boot()
    {
      \Braintree\Configuration::environment(env('BTREE_ENVIRONMENT','sandbox'));
        \Braintree\Configuration::merchantId(env('BTREE_MERCHANT_ID','xgv64xj9j3frqv3b'));
        \Braintree\Configuration::publicKey(env('BTREE_PUBLIC_KEY','vmfv5dfmsynzxhdr'));
        \Braintree\Configuration::privateKey(env('BTREE_PRIVATE_KEY','7f6c22d8dffcccc4eb93413fecff9d4e'));
    } */
}
