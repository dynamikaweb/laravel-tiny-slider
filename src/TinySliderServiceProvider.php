<?php

namespace DynamikaSolucoesWeb\TinySlider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use DynamikaSolucoesWeb\TinySlider\View\Components\Slider;

class TinySliderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tiny');

        Blade::component('tiny-slider', Slider::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/tiny'),
            ], 'tiny-slider-views');
        }
    }
}