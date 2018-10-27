<?php namespace Eriks\Highcode\Components;

use Cms\Classes\ComponentBase;

class Highlight extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Синтаксис',
            'description' => 'Подсветка синтаксиса кода.'
        ];
    }

    public function defineProperties()
    {
        return [
            'theme' => [
                'title'       => 'Тема оформления',
                'description' => 'Выберите тему оформления подсветки синтаксиса.',
                'type'        => 'dropdown',
                'default'     => 'default'
            ],
        ];
    }

    public function getThemeOptions()
    {
        return [
            'default' => 'Default',
            'django' => 'Django',
            'eclipse' => 'Eclipse',
            'emacs' => 'Emacs',
            'fadetogrey' => 'FadeToGrey',
            'mdultra' => 'MDUltra',
            'midnight' => 'Midnight',
            'rdark' => 'RDark',
        ];
    }

    public function onRun()
    {
        $this->addJs('assets/vendor/syntaxhighlighter/scripts/XRegExp.js');
        $this->addJs('assets/vendor/syntaxhighlighter/scripts/shCore.js');
        $this->addJs('assets/vendor/syntaxhighlighter/scripts/shAutoloader.js');
        $this->addJs('assets/js/syntaxhighlighter.js');

        $this->addCss('assets/vendor/syntaxhighlighter/styles/shCore.css');
        $this->addCss('assets/vendor/syntaxhighlighter/styles/shTheme' . $this->getThemeOptions()[$this->property('theme')] . '.css');
        $this->addCss('assets/css/syntaxhighlighter.css');
    }

}
