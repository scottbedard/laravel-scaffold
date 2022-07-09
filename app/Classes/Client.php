<?php

namespace App\Classes;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Client
{
    /**
     * Production manifest
     *
     * @var ?array
     */
    private ?array $manifest = null;

    /**
     * Javascript assets
     *
     * @var array
     */
    private array $scripts = [];

    /**
     * Construct
     *
     * @return void
     */
    public function __construct()
    {
        if (config('app.env') === 'production' || env('LARAVEL_DUSK')) {
            $this->manifest = Cache::remember('manifest', 86400, function() {
                return json_decode(File::get(public_path('dist/manifest.json')), true);
            });
        }
    }

    /**
     * Generate script tags
     *
     * @param string $script
     *
     * @return string
     */
    public function script(string $script): string
    {
        $assets = [];

        if ($this->manifest) {
            if (empty($this->scripts)) {
                $path = $this->manifest["resources/scripts/global.ts"]['file'];

                $assets[] = "<script type=\"module\" src=\"/dist/{$path}\"></script>";
            }

            if (!in_array($script, $this->scripts)) {
                $path = $this->manifest["resources/scripts/{$script}"]['file'];
                
                $assets[] = "<script type=\"module\" src=\"/dist/{$path}\"></script>";
            }
        } else {
            if (empty($this->scripts)) {
                $assets[] = "<script type=\"module\" src=\"http://localhost:3000/@@vite/client\"></script>";
            }

            if (!in_array($script, $this->scripts)) {
                $assets[] = "<script type=\"module\" src=\"http://localhost:3000/resources/scripts/{$script}\"></script>";
            }
        }

        $this->scripts[] = $script;

        return implode(array_unique($assets));
    }

    /**
     * Generate the global style tag
     *
     * @return string
     */
    public function styles(): string
    {
        if (!$this->manifest) {
            return '';
        }

        return implode(
            array_map(
                fn ($style) => "<link href=\"/dist/{$style}\" rel=\"stylesheet\" />",
                $this->manifest['resources/scripts/global.ts']['css']
            )
        );
    }
}
