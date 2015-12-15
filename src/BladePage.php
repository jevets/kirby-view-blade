<?php 

namespace KirbyCasts\Kirby\Blade;

use KirbyCasts\Kirby\View\ViewPage;
use \Page as KirbyPage;

class BladePage extends ViewPage
{
    /**
     * Use .blade.php as our file extension
     *
     * @var string
     */
    protected $extension = '.blade.php';
}