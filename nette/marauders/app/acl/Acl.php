<?php

namespace App\Acl;

use Nette\Security\Permission;

class Acl extends Permission {

    public function __construct() {
        //roles
        $this->addRole('guest');
        $this->addRole('user');
        $this->addRole('administrator');
        // resources
        $this->addResource('Homepage');
        $this->addResource('Sign');
        $this->addResource('News');
        $this->addResource('Users');
        // privileges
        $this->allow(Permission::ALL, 'Homepage', Permission::ALL);
        $this->allow(Permission::ALL, 'Sign', Permission::ALL);
        
        $this->deny('guest', 'Homepage', ['insert','update','delete','create']);
        
        $this->deny('user', ['Homepage','Users'], Permission::ALL);
        
        $this->allow('administrator', Permission::ALL, Permission::ALL);
    }
}