<?php

namespace App\Controllers;

use App\Lib\Util;

class Controller
{
    private $_varView;

    public function render($view)
    {

        $aViewVar   = $this->getVarView();
        $oUtil      = Util::class;

        require_once PATH. '/App/Views/layouts/header.php';
        require_once PATH. '/App/Views/layouts/menu.php';
        require_once PATH. '/App/Views/'.$view.'.php';
        require_once PATH. '/App/Views/layouts/footer.php';

    }

    public function json($array)
    {
        header('Content-Type: application/json');
        echo json_encode($array);

        exit;
    }

    public function error($code)
    {
        require_once PATH. "/App/Views/error/$code.php";
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