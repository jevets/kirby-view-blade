<?php 

namespace KirbyCasts\Kirby;

use KirbyCasts\Kirby\View\ViewInterface;

/**
 * Enables Kirby to use Laravel's Blade template engine
 * instead of default native PHP templates
 *
 * @uses Philo\Blade\Blade
 */
class BladeView implements ViewInterface
{
    /**
     * Create an instance of the view
     *
     * @param string $viewsDir
     * @param string $cacheDir
     * @return void
     */
    public function __construct($viewsDir, $cacheDir = '')
    {

    }

    /**
     * Get a rendered view as a string
     *
     * @param string $view filename of view
     * @param array $data Data to pass to the view
     * @return string
     */
    public function make($view, $data = [])
    {

    }
}