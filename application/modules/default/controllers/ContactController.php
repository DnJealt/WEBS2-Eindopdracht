<?php

/**
 * @author Danny van Wijk (dwijk@deactro.nl)
 * @copyright Copyright (c) 2012, Deactro BV - All rights reserved
 * @version 1.0.0
 */

class ContactController extends Zend_Controller_Action
{
    const controllerLangKey     = "Contact";
    const indexActionLangKey    = "Algemeen";

	/**
	 * Display contact page
	 * 
	 * @return void
	 */
	public function indexAction()
	{
		$form = new Form_Contact();
		$this->view->form = $form;
		
		if($this->getRequest()->isPost())
		{
			if($form->isValid($this->getRequest()->getPost()))
			{
				$settingModel = new Model_Setting();
				
				$emailAddress = $settingModel->getSettings('emailaddress');
				if($form->getValue('about') == 3)
				{
					$emailAddress = $settingModel->getSettings('newsEmailaddress');	
				}
				
				$mail = new Deactro_Mail();
				$mail->setFrom($emailAddress);
				$mail->addTo($emailAddress);
				$mail->setReturnPath($emailAddress);
				$mail->setSubject('[' . $settingModel->getSettings('siteTitle') . '] Contact');
				$mail->setBodyHtml('
					Naam: ' . $form->getValue('name') . ' <br /><br />
					E-mailadres: ' . $form->getValue('emailaddress') . ' <br /><br />
					Over: ' . $this->view->aboutList($form->getValue('about')) . ' <br /><br />
					Onderwerp: ' . $form->getValue('subject') . ' <br /><br />
					Bericht: ' . $form->getValue('message') . ' <br /><br />
					IPadres: ' . $_SERVER['REMOTE_ADDR'] . ' <br /><br />
				', 'UTF-8');
				if($mail->send())
				{
					$this->getHelper('flashMessenger')->addMessage(array('message' => 'Bedankt voor uw bericht!', 'status' => 'success'));
					$this->_redirect($this->view->serverUrl($this->view->url(array(), 'default-contact-index')));
				}
			}
		}
	}
}