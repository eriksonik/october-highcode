<?php namespace Eriks\Highcode\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Highlights Back-end Controller
 */
class Highlights extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Eriks.Highcode', 'highcode', 'highlights');
    }

}
