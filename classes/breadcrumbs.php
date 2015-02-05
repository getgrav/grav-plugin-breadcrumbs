<?php
namespace Grav\Plugin;

use Grav\Common\Grav;
use Grav\Common\GravTrait;

class Breadcrumbs
{
    use GravTrait;

    /**
     * @var array
     */
    protected $breadcrumbs;

    /**
     * Get all items in breadcrumbs.
     *
     * @return array
     */
    public function get()
    {
        if (!$this->breadcrumbs) {
            $this->build();
        }
        return $this->breadcrumbs;
    }

    /**
     * Build breadcrumbs.
     *
     * @internal
     */
    protected function build()
    {
        $hierarchy = array();
        $current = self::getGrav()['page'];

        while ($current && !$current->root()) {
            $hierarchy[$current->url()] = $current;
            $current = $current->parent();
        }

        // Page cannot be routed.
        if (!$current) {
            $this->breadcrumbs = array();
            return;
        }

        $home = self::getGrav()['pages']->dispatch('/');
        if ($home && !array_key_exists($home->url(), $hierarchy)) {
            $hierarchy[] = $home;
        }

        $this->breadcrumbs = array_reverse($hierarchy);
    }
}
