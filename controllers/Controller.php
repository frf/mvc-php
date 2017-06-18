<?php
/**
 * Created by PhpStorm.
 * User: fabiorocha
 * Date: 17/06/17
 * Time: 21:05
 */

class Controller
{
    private $_varView;

    public function render($view)
    {

        $aViewVar = $this->getVarView();

        require_once PATH. '/views/layouts/header.php';
        require_once PATH. '/views/layouts/menu.php';
        require_once PATH. '/views/'.$view.'.php';
        require_once PATH. '/views/layouts/footer.php';

    }

    public function redirect($view)
    {
        header('Location: /' . $view);
    }

    /**
     * @return mixed
     */
    public function getVarView()
    {
        return $this->_varView;
    }

    public function setViewParam($nameVar,$valueVar)
    {
        if($nameVar != "" && $valueVar != "") {
            $this->_varView[$nameVar] = $valueVar;
        }
    }

}