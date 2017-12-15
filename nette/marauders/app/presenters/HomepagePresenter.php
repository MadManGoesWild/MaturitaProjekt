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
    
<<<<<<< HEAD
    private $userManager;
    
    private $position = array();
=======
    public $location = ['hovno' => 'sracka'];
>>>>>>> f3803aa0f511c77450bd7cedc03370e34e5875dc
    
    public function __construct(Nette\Database\Context $database, UserManager $userManager) {
        $this->database = $database;
        $this->userManager = $userManager;
    }
    
    public function renderDefault()
	{
	
	}
        
    public function handleReceiveData(){
<<<<<<< HEAD
        $position = explode("&", $this->getHttpRequest()->getRawBody());
        $this->userManager->setPosition($this->getUser()->getId(), substr($position[1], 4), substr($position[0], 4));
    }

    public function handleGetData(){
        $this->payload->message=$this->userManager->getPosition()->latitude;
        $this->sendPayload();
=======
           // $this->location->position = $this->getHttpRequest()->getRawBody();
            $this->location['pica'] = $this->getHttpRequest()->getRawBody();
        //array_push($this->location, $this->getHttpRequest()->getRawBody());
          /*  $this->payload->message = $this->location['pica'];
            $this->sendPayload();*/
    }

    public function handleGetData(){
       // Debugger::dump($this->location);
        if($this->isAjax()){
            $this->payload->message = $this->location['pica'];
            $this->sendPayload();
           
         }
        
>>>>>>> f3803aa0f511c77450bd7cedc03370e34e5875dc
    }
        
}
