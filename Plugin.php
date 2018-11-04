<?php namespace Eriks\Highcode;

use Backend;
use System\Classes\PluginBase;

use Backend\Widgets\Form;
//use Lang;
//use App;
use Event;
//use Config;
//use Markdown;


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
        $this->extendBlogPostForm();

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


    /**
     * Extends form to edit Blog Post
     *  - add button for Typographus.Lite.UTF8
     */
    protected function extendBlogPostForm() {
//        if (!Config::get('graker.blogarchive::addTypofilterToMarkdown', FALSE)) {
//            return ;
//        }
        Event::listen('backend.form.extendFields', function (Form $widget) {
            // attach to post forms only
            if (!($widget->getController() instanceof \RainLab\Blog\Controllers\Posts)) {
                return ;
            }
            if (!($widget->model instanceof \RainLab\Blog\Models\Post)) {
                return ;
            }
            //add javascript extending Markdown editor
            $widget->addJs('/plugins/eriks/highcode/assets/vendor/typofilter/typofilter.js');
            $widget->addJs('/plugins/eriks/highcode/assets/vendor/typofilter/plugins/octobercms-markdown/typofilter-markdown-extend.js');

            $widget->addJs('/plugins/eriks/highcode/assets/js/syntaxhighlighter-markdown-extend.js');
        });
    }

}
