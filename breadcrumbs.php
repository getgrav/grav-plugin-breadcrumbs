<?php
namespace Grav\Plugin;

use \Grav\Common\Plugin;

class BreadcrumbsPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents() {
        return [
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ];
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * Set needed variables to display breadcrumbs.
     */
    public function onTwigSiteVariables()
    {
        require_once __DIR__ . '/classes/breadcrumbs.php';

        $this->grav['twig']->twig_vars['breadcrumbs'] = new Breadcrumbs();

        if ($this->config->get('plugins.breadcrumbs.built_in_css')) {
            $this->grav['assets']->add('plugin://breadcrumbs/css/breadcrumbs.css');
        }
    }
}
