<?php 

namespace KirbyCasts\Kirby\Blade;

use Philo\Blade\Blade;
use \c as Config;
use KirbyCasts\Kirby\View\View;

/**
 * Enables Kirby to use Laravel's Blade template engine
 * instead of default native PHP templates
 *
 * @uses Philo\Blade\Blade
 */
class BladeView extends View
{
    /**
     * Template file extension
     *
     * @var string
     */
    protected static $extension = '.blade.php';
    
    /**
     * Create an instance of the view
     *
     * @param array $options
     * @return void
     */
    public function __construct($options = array())
    {
        $views = 
            isset($options['views']) ? 
            $options['views'] : 
            Config::get('blade_views_dir', kirby()->roots()->templates());

        $cache = 
            isset($options['cache']) ? 
            $options['cache'] : 
            Config::get('blade_cache_dir', kirby()->roots()->cache() . DS . 'views');


        $this->engine = new Blade($views, $cache);

        $this->setEchoFormat();
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
        return $this->engine->view()->make($view, $data);
    }

    /**
     * Sets the echo format for compiled Blade templates.
     *
     * Blade compiles templates to raw PHP, and it sends all echo data
     * through Laravel's `e()` function. But in Kirby, `e()` is already 
     * defined and has a different use.
     *
     * This sets the echo format to use Kirby's `html()` function instead.
     * So your compiled templates will look like `<?php echo html([value]) ?>`
     * instead of `<?php echo e([value]) ?>`.
     *
     * You may use Blade's `{!! $value !!}` syntax if you don't want
     * the data escaped for HTML.
     *
     * @param string $format
     * @return void
     */
    private function setEchoFormat($format = 'html(%s)')
    {
        $this->engine->getCompiler()->setEchoFormat($format);
    }
}