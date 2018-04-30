<?php

namespace App\Providers;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
	// api 认证路由器
        Passport::routes();
        // token 寿命
	Passport::tokensExpireIn(now()->addDays(15));
	Passport::refreshTokensExpireIn(now()->addDays(30));
	// 开启隐式授权
	//Passport::enableImplicitGrant();
	/*	定义作用域
		Passport::tokensCan([
			'place-orders' => 'Place orders',
			'check-status' => 'Check order status',
		]);
	*/
    }
}
