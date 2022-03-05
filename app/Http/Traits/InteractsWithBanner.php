<?php

namespace App\Http\Traits;

trait InteractsWithBanner
{
    /**
     * @param string $message
     * @param string $style
     */
    public function banner(string $message, string $style)
    {
        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', $style);
    }
}
