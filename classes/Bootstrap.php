<?php

class Bootstrap
{
    private $controller;
    private $action;
    private $request;

    public function __construct($request)
    {
        $this->request = $request;

        if ($this->request['controller'] == "") {
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }

        if ($this->request['action'] == "") {
            $this->action = 'index';
        } else {
            $this->action = $this->request['controller'];
        }

        echo $this->controller;
    }

    public function createController()
    {
        //Check Class
        if (class_exists($this->controller)) {
            $parents = class_parents($this->controller);

            //check Extend
            //in_array("Glenn", $array)
            if (in_array('Controller', $parents)) {
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->action, $this->request);
                } else {
                    // method doesnt exist
                    echo '<h1>Method does not exist</h1>';
                    return;
                }
            } else {
                echo '<h1>Base controller does not exist</h1>';
                return;
            }
        } else {
            echo '<h1>Controller Class does not exist</h1>';
            return;
        }
    }
}