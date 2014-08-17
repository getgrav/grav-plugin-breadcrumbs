<?php
namespace Grav\Plugin;

use \Grav\Common\Plugin;
use \Grav\Common\Registry;

class BreadcrumbsPlugin extends Plugin
{
    /**
     * Add current directory to twig lookup paths.
     */
    public function onAfterTwigTemplatesPaths()
    {
        Registry::get('Twig')->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * Set needed variables to display breadcrumbs.
     */
    public function onAfterTwigSiteVars()
    {
        require_once __DIR__ . '/classes/breadcrumbs.php';

        Registry::get('Twig')->twig_vars['breadcrumbs'] = new Breadcrumbs();

        if ($this->config->get('plugins.breadcrumbs.built_in_css')) {
            Registry::get('Assets')->add('@plugin/breadcrumbs/css:breadcrumbs.css');
        }
    }
}
