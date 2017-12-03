<?php

namespace App\Presenters;

use Nette,
    App\Model;

use Tracy\Debugger;


class HomepagePresenter extends BasePresenter
{
    private $database;
    
    private $position = array();
    
    public function __construct(Nette\Database\Context $database) {
        $this->database = $database;
    }
    
    public function renderDefault()
	{
	
	}
        
    public function handleReceiveData($position){
        echo $position;
        array_push($this->position, $this->getHttpRequest()->getPost());
        Debugger::dump($this->position);
    }

    public function handleGetData(){
        foreach ($this->position as $position) {
            echo $position[0];
            Debugger::dump($this->position);
        }
        return $this->position;       
    }
        
}
