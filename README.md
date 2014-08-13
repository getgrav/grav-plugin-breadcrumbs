# Grav Breadcrumbs Plugin

`Breadcrumbs` is a [Grav](http://github.com/getgrav/grav) plugin that adds links to the previous pages (following the hierarchical structure).
It is particularly useful if you are using Grav to run a blog.

# Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `breadcrumbs`.

You should now have all the plugin files under

	/your/site/grav/user/plugins/breadcrumbs

>> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav), the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) plugins, and a theme to be installed in order to operate.

# Usage

The `breadcrumbs` plugin doesn't require any configuration. The moment you install it, it is ready to use.

Something you might want to do is to override the look and feel of the breadcrumbs, and with Grav it is super easy.

Copy the template file [breadcrumbs.html.twig](templates/breadcrumbs.html.twig) into the `templates` folder of your custom theme, and that is it. 

```
/your/site/grav/user/themes/custom-theme/templates/breadcrumbs.html.twig
```

You can now edit the override and tweak it however you prefer.
