<?php

namespace App\Controllers;

use App\Lib\Util;

class Controller
{
    private $_varView;
    private $_viewJs = [];
    private $_viewCss = [];
    private $existeLayout = true;


    public function render($view)
    {

        $aViewVar   = $this->getVarView();
        $aViewJs    = $this->getViewJs();
        $aViewCss   = $this->getViewCss();
        $oUtil      = Util::class;

        require_once PATH . '/App/Views/layouts/header.php';
        ($this->existeLayout) ? require_once PATH . '/App/Views/layouts/menu.php' : "";
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/layouts/footer.php';

    }

    public function json($array)
    {
        header('Content-Type: application/json');
        echo json_encode($array);

        exit;
    }

    public function error($code)
    {
        require_once PATH . "/App/Views/error/$code.php";
    }

    public function redirect($view)
    {
        Util::redirect($view);
    }

    public function getVarView()
    {
        return $this->_varView;
    }

    public function getViewCss()
    {
        $strView = "";

        if (is_array($this->_viewCss)) {

            if (count($this->_viewCss)) {

                $strView .= "<!-- CSS -->\n";

                foreach ($this->_viewCss as $Css) {
                    $strView .= "\t<link href=\"$Css\" rel=\"stylesheet\">\n";
                }

                $strView .= "\t<!-- CLOSE CSS -->\n\n";

            }
        }


        return (!empty($strView)) ? $strView : "";
    }

    public function getViewJs()
    {
        $strView = "";

        if (is_array($this->_viewJs)) {

            if (count($this->_viewJs)) {

                $strView .= "<!-- JS --> \n";

                foreach ($this->_viewJs as $Js) {
                    $strView .= "\t<script type=\"text/javascript\" src=\"$Js\" rel=\"stylesheet\"></script> \n";
                }

                $strView .= "\t<!-- CLOSE JS --> \n";
            }

        }

        return (!empty($strView)) ? $strView : "";
    }

    public function setViewParam($nameVar, $valueVar)
    {
        if ($nameVar != "" && $valueVar != "") {
            $this->_varView[$nameVar] = $valueVar;
        }
    }

    public function setViewJs($valueVar)
    {
        if ($valueVar != "") {
            $this->_viewJs[] = $valueVar;
        }
    }

    public function setViewCss($valueVar)
    {
        if ($valueVar != "") {
            $this->_viewCss[] = $valueVar;
        }
    }

    public function existeLayout($isLayout)
    {
        $this->existeLayout = $isLayout;
    }


}