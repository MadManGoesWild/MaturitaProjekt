<?php

namespace App\Presenters;

use Nette,
    App\Model;

use App\Model\UserManager;

use Tracy\Debugger;

class UsersPresenter extends BasePresenter
{
    private $userManager;
    
    
    public function __construct(UserManager $userManager) {
        $this->userManager = $userManager;
    }
       
    public function renderUsers($order = 'id ASC') {
        $this->template->userove = $this->userManager->getAll($order);
    }    
    
    public function renderView($id) {
        $this->template->users = $this->userManager->getById($id);
    }    
        
}
