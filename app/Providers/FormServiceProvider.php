<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);
        Form::component('file', 'components.form.file', ['name', 'attributes' => []]);


    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
