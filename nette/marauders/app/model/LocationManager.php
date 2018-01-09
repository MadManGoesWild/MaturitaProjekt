<?php

namespace App\Model;

use Nette;
use Nette\Object;

class LocationManager 
{
	use Nette\SmartObject;

	const
		TABLE_NAME = 'favourite_location',
		COLUMN_ID = 'id',
		COLUMN_NAME = 'name',
                COLUMN_LATITUDE = 'latitude',
                COLUMN_LONGITUDE = 'longitude',
		COLUMN_USERS_ID = 'users_id';
        
	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}


	
        
        public function setPosition($id, $long, $lat, $name){
            $data = [self::COLUMN_LATITUDE=>$lat,self::COLUMN_LONGITUDE=>$long,self::COLUMN_NAME => $name,self::COLUMN_USERS_ID=>$id];
            $this->database->table(self::TABLE_NAME)->insert($data);
            
        }
        
        public function getPosition(){
            return $this->database->table(self::TABLE_NAME)->fetchAll();         
        }
        
        public function getAll(){
            // Získání dat z tabulky databáze
            return $this->database->table(self::TABLE_NAME)->fetchAll();
            
        }
        
        public function delete($id) {
            // Smazání záznamu v tabulce databáze
            $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
        }
        
}