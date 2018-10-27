<?php namespace Eriks\Highcode;

use Backend;
use System\Classes\PluginBase;

/**
 * highcode Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'HighCode',
            'description' => 'Подсветка синтаксиса кода.',
            'author'      => 'eriks',
            'icon'        => 'icon-file-code-o'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Eriks\Highcode\Components\Highlight' => 'Highlight',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'eriks.highcode.some_permission' => [
                'tab' => 'HighCode',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'highcode' => [
                'label'       => 'HighCode',
                'url'         => Backend::url('eriks/highcode/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['eriks.highcode.*'],
                'order'       => 500,
            ],
        ];
    }
}
