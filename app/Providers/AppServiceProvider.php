<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;
use Livewire;
use MailchimpMarketing\ApiClient;
use Route;

/**
 * @method where($field, string $string, string $string1)
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(Newsletter::class, function () {

            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us12'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/custom/livewire/livewire-js', $handle);
        });
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'LIKE', '%'.$string.'%') : $this;
        });
        Gate::define('is_admin', function(User $user) {
            return $user->role === 'admin';
        });
        Gate::define('is_staff_member', function(User $user) {
            return $user->role === 'staff';
        });
        Gate::define('is_user', function(User $user) {
            return $user->role === 'user';
        });
        Gate::define('is_admin_or_staff_member', function ($user) {
            return $user->role === 'admin' || $user->role === 'staff';
        });
    }
}
