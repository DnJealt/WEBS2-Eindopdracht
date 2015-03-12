<?php

/**
 * @author Mark van Kleef (mkleef@avans.nl)
 * @copyright Copyright (c) 2015, Avans Hogeschool - All rights reserved
 * @version 1.0.0
 */

class Avans_View_Helper_FlashMessages extends Zend_View_Helper_Abstract
{
	/**
	 * flashMessages
	 * 
	 * Samples for in a controller
	 * $this->getHelper('flashMessenger')->addMessage(array('message' => 'Success message', 'status' => 'success'));
	 * $this->getHelper('flashMessenger')->addMessage(array('message' => 'Error message', 'status' => 'error'));
	 * 
	 * @return string
	 */
	public function flashMessages()
	{
		$flashMessages = Zend_Controller_Action_HelperBroker::getStaticHelper('FlashMessenger')->getMessages();
		$statusMessages = array();
		$content = '';
		
		if(count($flashMessages) > 0)
		{
			foreach($flashMessages as $flashMessage)
			{
				if(!array_key_exists($flashMessage['status'], $statusMessages))
				{
					$statusMessages[$flashMessage['status']] = array();
					
					if($this->view->translate() instanceof Zend_Translate)
					{
						array_push($statusMessages[$flashMessage['status']], $this->view->translate($flashMessage['message']));
					}
					else
					{
						array_push($statusMessages[$flashMessage['status']], $flashMessage['message']);	
					}
				}
			}
			
			foreach($statusMessages as $status => $messages)
			{
				$content .= '<div class="alert block-message alert-' . $status . '"><a class="close" data-dismiss="alert">&times;</a>';
				
				if(count($messages) == 1)
				{
					$content .= $messages[0];
				}
				else
				{
					$content .= '<ul>';
					foreach($messages as $message)
					{
						$content .= '<li>' . $message . '</li>';
					}
					$content .= '</ul>';
				}
				
				$content .= '</div>';
			}
		}
		
		return $content;
	}
}