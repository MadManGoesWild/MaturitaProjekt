<?php

namespace App\Presenters;

use Nette,
    App\Model;

use App\Model\UserManager;
use App\Model\LocationManager;

use Tracy\Debugger;
use Nette\Utils\Json;

class HomepagePresenter extends BasePresenter
{
    private $database;
    

    private $userManager;
    private $locationManager;
    
    private $position = array();
    
    private $username = array();
    
    public function __construct(Nette\Database\Context $database, UserManager $userManager, LocationManager $locationManager) {
        $this->database = $database;
        $this->userManager = $userManager;
        $this->locationManager = $locationManager;
    }
    
    public function handleReceiveData(){
        $position = explode("&", $this->getHttpRequest()->getRawBody());
        $this->userManager->setPosition($this->getUser()->getId(), substr($position[1], 4), substr($position[0], 4));
    }
    
    public function handleReceiveFavouriteLocationData(){
         $position = explode("&", $this->getHttpRequest()->getRawBody());
         $this->locationManager->setPosition($this->getUser()->getId(), substr($position[1], 4), substr($position[0], 4), substr($position[2], 5));
         $this->payload->message = $position;
         $this->sendPayload();
    }

    public function handleGetData(){
        $ziskejPozici = ($this->userManager->getPosition());
        $arr = [];
        foreach($ziskejPozici as $pozice){
           array_push($arr, $pozice->toArray());           
        }           
        $this->payload->message = $arr;
        $this->sendPayload();

           // $this->location->position = $this->getHttpRequest()->getRawBody();
           // $this->location['Něco je špatně'] = $this->getHttpRequest()->getRawBody();
        //array_push($this->location, $this->getHttpRequest()->getRawBody());
          /*  $this->payload->message = $this->location['pica'];
            $this->sendPayload();*/
    }
    
    public function handleGetFavouriteLocationsData(){
        $ziskejPozici = ($this->locationManager->getAll());
        $arr = [];
        foreach($ziskejPozici as $pozice){
           array_push($arr, $pozice->toArray());           
        }           
        $this->payload->message = $arr;
        $this->sendPayload();
    }
    
    
    
    /*public function handleGetData(){
       // Debugger::dump($this->location);
        if($this->isAjax()){
            $this->payload->message = $this->location['pica'];
            $this->sendPayload();
           
         }
        

    }*/
        
}
