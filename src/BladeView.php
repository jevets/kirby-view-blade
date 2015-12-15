<?php 

namespace KirbyCasts\Kirby\Blade;

use Philo\Blade\Blade;

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
     * A Blade instance
     *
     * @var Philo\Blade\Blade
     */
    protected $blade;

    /**
     * Create an instance of the view
     *
     * @param string $viewsDir
     * @param string $cacheDir
     * @return void
     */
    public function __construct($viewsDir, $cacheDir = '')
    {
        $this->blade = new Blade($viewsDir, $cacheDir);

        $this->blade->getCompiler()->setEchoFormat('html(%s)');
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
        return $this->blade->view()->make($view, $data);
    }
}