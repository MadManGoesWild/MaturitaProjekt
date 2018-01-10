<?php

namespace App\Presenters;

use Nette,
    App\Model;

use App\Model\UserManager;

use Tracy\Debugger;

class UsersPresenter extends BasePresenter
{
    // Vytvoření privátní proměnné
    private $userManager;
    
    
    public function __construct(UserManager $userManager) {
        // Injektování metod modelu userManager
        $this->userManager = $userManager;
    }
       
    public function renderUsers($order = 'id ASC') {
        // Vložení výsledku userManager do proměnné userove
        $this->template->userove = $this->userManager->getAll($order);
    }    

    public function actionDelete($id) {
        // Smazání podle ID
        $this->userManager->delete($id);
        // Po smazání "obnovení" stránky (přesměrování na tu samou)
        $this->redirect("Users:users");
        }
        
}
