<?php

namespace App\Presenters;

use Nette,
    App\Model;

use App\Model\UserManager;

use Tracy\Debugger;
use Nette\Utils\Json;

class HomepagePresenter extends BasePresenter
{
    private $database;
    

    private $userManager;
    
    private $position = array();
    
    private $username = array();
    
    public function __construct(Nette\Database\Context $database, UserManager $userManager) {
        $this->database = $database;
        $this->userManager = $userManager;
    }
    
    public function renderDefault()
	{
	
	}
        
    public function handleReceiveData(){
        $position = explode("&", $this->getHttpRequest()->getRawBody());
        $this->userManager->setPosition($this->getUser()->getId(), substr($position[1], 4), substr($position[0], 4));
    }

    public function handleGetData(){
        $this->payload->message=$this->userManager->getPosition();
        $this->sendPayload();

           // $this->location->position = $this->getHttpRequest()->getRawBody();
           // $this->location['Něco je špatně'] = $this->getHttpRequest()->getRawBody();
        //array_push($this->location, $this->getHttpRequest()->getRawBody());
          /*  $this->payload->message = $this->location['pica'];
            $this->sendPayload();*/
    }
    
    /*public function handleGetData(){
       // Debugger::dump($this->location);
        if($this->isAjax()){
            $this->payload->message = $this->location['pica'];
            $this->sendPayload();
           
         }
        

    }*/
        
}
