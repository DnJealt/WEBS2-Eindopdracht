<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Shop_CartController extends Zend_Controller_Action
{
    const controllerLangKey     = "Winkelwagen";
    const indexActionLangKey    = "Overzicht";

    /**
     * Display index page
     *
     * @return void
     */
    public function indexAction()
    {
        $settingModel = new Model_Setting();

    }

    public function shoppingAction(){

    }
}