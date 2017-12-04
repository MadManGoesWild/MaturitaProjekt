<?php

namespace App\Presenters;

use Nette,
    App\Model;

use Tracy\Debugger;
use Nette\Utils\Json;

class HomepagePresenter extends BasePresenter
{
    private $database;
    
    public $location = ['hovno' => 'sracka'];
    
    public function __construct(Nette\Database\Context $database) {
        $this->database = $database;
    }
    
    public function renderDefault()
	{
	
	}
        
    public function handleReceiveData(){
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
        
    }
        
}
