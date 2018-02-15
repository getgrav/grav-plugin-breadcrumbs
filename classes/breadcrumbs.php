<?php
namespace Grav\Plugin;

use Grav\Common\Grav;

class Breadcrumbs
{

    /**
     * @var array
     */
    protected $breadcrumbs;
    protected $page;
    protected $config;

    /**
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Get all items in breadcrumbs.
     *
     * @return array
     */
    public function get($page)
    {
        if (!$this->breadcrumbs || $this->page !== $page) {
            $this->build($page);
            $this->page = $page;
        }
        return $this->breadcrumbs;
    }

    /**
     * Build breadcrumbs.
     *
     * @internal
     */
    protected function build($page)
    {
        $hierarchy = array();
        $grav = Grav::instance();
        $current = $page ?? $grav['page'];
        
        // Page cannot be routed.
        if (!$current) {
            $this->breadcrumbs = array();
            return;
        }

        if (!$current->root()) {

            if ($this->config['include_current']) {
                $hierarchy[$current->url()] = $current;
            }

            $current = $current->parent();

            while ($current && !$current->root()) {
                $hierarchy[$current->url()] = $current;
                $current = $current->parent();
            }
        }

        if ($this->config['include_home']) {
            $home = $grav['pages']->dispatch('/');
            if ($home && !array_key_exists($home->url(), $hierarchy)) {
                $hierarchy[] = $home;
            }
        }

        $this->breadcrumbs = array_reverse($hierarchy);
    }
}
