<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component(
            'formInput',
            'components.form.input',
            [
                'name',
                'label',
                'col' => '',
                'help' => false,
                'helpId' => '',
                'helpMsg' => '',
                'type' => 'text',
                'value' => null,
                'attributes' => []
            ]
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
