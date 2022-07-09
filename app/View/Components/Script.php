<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Script extends Component
{
    /**
     * Source
     *
     * @var string
     */
    public string $src = '';

    /**
     * Construct
     *
     * @param string $src
     *
     * @return void
     */
    public function __construct(string $src)
    {
        $this->src = $src;
    }

    /**
     * Render
     *
     * @return string
     */
    public function render(): string
    {
        return app('client')->script($this->src);
    }
}
