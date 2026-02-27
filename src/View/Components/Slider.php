<?php

namespace DynamikaSolucoesWeb\TinySlider\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Slider extends Component
{
    public string $id;
    public array $pluginOptions;
    public string $export;

    public function __construct(
        public string $container = 'div',
        public array $options = [],
        public ?string $exportName = null,
        public ?string $clientScript = null,
        public bool $cdn = false,
        ?string $id = null
    ) {
        $this->id = $id ?? 'dtns-' . Str::random(8);
        $this->export = $exportName ?? "slider_" . str_replace('-', '_', $this->id);
        
        $this->pluginOptions = array_merge($options, [
            'container' => "#{$this->id}"
        ]);
    }

    public function render()
    {
        return view('tiny::components.slider');
    }
}