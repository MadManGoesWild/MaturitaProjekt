<?php

namespace App\Presenters;

use Nette,
    App\Model;

use App\Model\LocationManager;

use Tracy\Debugger;

class FavouriteLocationPresenter extends BasePresenter
{
    // Vytvoření privátní proměnné
    private $locationManager;
    
    
    public function __construct(LocationManager $locationManager) {
        // Injektování metod modelu userManager
        $this->locationManager = $locationManager;
    }
       
    public function renderLocations($order = 'id ASC') {
        // Vložení výsledku userManager do proměnné userove
        $this->template->lokace = $this->locationManager->getAll($order);
    }    
    
    public function renderView($id) {
        // Vložení výsledku userManager do proměnné users
        $this->template->locations = $this->locationManager->getById($id);
    }

    public function actionDelete($id) {
        // Smazání podle ID
        $this->locationManager->delete($id);
        // Po smazání "obnovení" stránky (přesměrování na tu samou)
        $this->redirect("FavouriteLocation:favouriteLocation");
        }
        
}
