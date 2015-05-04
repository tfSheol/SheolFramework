<?php
/**
 * BackController.php made by Sheol
 * 28/04/2015 - 12:57
 */

namespace Core;

abstract class BackController extends ApplicationComponent {
    protected $_action = '';
    protected $_module = '';
    protected $_page = null;
    protected $_view = '';
    protected $_managers = null;

    public function __construct(Application $app, $module, $action) {
        parent::__construct($app);

        $this->_managers = new Managers('PDO', (new PDOFactory($app->getName()))->getMysqlConnexion());
        $this->_page = new Page($app);

        $this->setModule($module);
        $this->setAction($action);
        $this->setView($action);
    }

    public function execute() {
        $method = 'execute'.ucfirst($this->_action);
        if (!is_callable([$this, $method])) {
            throw new \RuntimeException('Action : "'.$this->_action.'", is not defined in this module.');
        }
        $this->$method($this->_app->getHttpRequest());
    }

    public function getPage(){
        return $this->_page;
    }

    public function setModule($module){
        if (!is_string($module) || empty($module)){
            throw new \InvalidArgumentException('The module must be a valid string.');
        }
        $this->_module = $module;
    }

    public function setAction($action){
        if (!is_string($action) || empty($action)){
            throw new \InvalidArgumentException('This action must be a valid string.');
        }
        $this->_action = $action;
    }

    public function setView($view)
    {
        if (!is_string($view) || empty($view)) {
            throw new \InvalidArgumentException('The view must be a valid string.');
        }
        $this->_view = $view;
        $this->_page->setContentFile(__DIR__.'/../../App/'.$this->_app->getName().'/Modules/'.$this->_module.'/Views/'.$this->_view.'.php');
    }
}
