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
    public function boot()
    {
    //   \Braintree\Configuration::environment(env('BTREE_ENVIRONMENT','sandbox'));
    //     \Braintree\Configuration::merchantId(env('BTREE_MERCHANT_ID','rn6zmvs8v98c9k5t'));
    //     \Braintree\Configuration::publicKey(env('BTREE_PUBLIC_KEY','6xhdy4kpk8ktd3dt'));
    //     \Braintree\Configuration::privateKey(env('BTREE_PRIVATE_KEY','b0ea0391e8114daf7472b68caba9697e'));
    }
}

// BT_ENVIRONMENT=
// BT_MERCHANT_ID=rn6zmvs8v98c9k5t
// BT_PUBLIC_KEY=6xhdy4kpk8ktd3dt
// BT_PRIVATE_KEY=b0ea0391e8114daf7472b68caba9697e
