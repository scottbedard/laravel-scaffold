<?php

namespace App\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Icon extends Component
{
    public $name;

    public $size;

    public $strokeWidth;
    
    public function __construct(
        string $name, 
        string|float $size = 24, 
        string|float $strokeWidth = 2
    )
    {
        $this->name = $name;
        $this->size = $size;
        $this->strokeWidth = $strokeWidth;
    }

    public function render()
    {
        return function ($data)
        {
            $path = resource_path('icons/' . $this->name . '.svg');

            $svg = preg_replace([
                '/[^-]height="\d+"/',
                '/[^-]width="\d+"/',
                '/stroke-width="\d+"/',
                '/^<svg /',
            ], [
                "height=\"{$this->size}\"",
                "width=\"{$this->size}\"",
                "stroke-width=\"{$this->strokeWidth}\"",
                "<svg data-icon {$data['attributes']->toHtml()}",
            ], File::get($path), 1);

            return $svg;
        };
    }
}
