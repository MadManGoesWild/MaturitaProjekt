<?php

namespace App\Model;

use Nette;
use Nette\Security\Passwords;


/**
 * Users management.
 */
class UserManager implements Nette\Security\IAuthenticator
{
	use Nette\SmartObject;

	const
		TABLE_NAME = 'users',
		COLUMN_ID = 'id',
		COLUMN_NAME = 'username',
		COLUMN_PASSWORD_HASH = 'password',
		COLUMN_EMAIL = 'email',
		COLUMN_ROLE = 'role';
                
        const
                TABLE_LOCATION = 'position',
                COLUMN_USERREF = 'users_id',
                COLUMN_LATITUDE = 'latitude',
                COLUMN_LONGITUDE = 'longitude',
                COLUMN_ISACTIVE = 'isActive';

	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;

		$row = $this->database->table(self::TABLE_NAME)
			->where(self::COLUMN_NAME, $username)
			->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException('Zadané uživatelské jmeno není správné.', self::IDENTITY_NOT_FOUND);

		} elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
			throw new Nette\Security\AuthenticationException('Zadené heslo není správné.', self::INVALID_CREDENTIAL);

		} elseif (Passwords::needsRehash($row[self::COLUMN_PASSWORD_HASH])) {
			$row->update([
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
			]);
		}

		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);
		return new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr);
	}


	/**
	 * Adds new user.
	 * @param  string
	 * @param  string
	 * @param  string
	 * @return void
	 * @throws DuplicateNameException
	 */
	public function add($username, $email, $password)
	{
		try {
			$this->database->table(self::TABLE_NAME)->insert([
				self::COLUMN_NAME => $username,
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
				self::COLUMN_EMAIL => $email,
			]);
		} catch (Nette\Database\UniqueConstraintViolationException $e) {
			throw new DuplicateNameException;
		}
	}
        
        public function setPosition($id, $long, $lat){
            $data = [self::COLUMN_LATITUDE=>$lat,self::COLUMN_LONGITUDE=>$long,self::COLUMN_ISACTIVE => 1,self::COLUMN_USERREF=>$id];
            if($this->database->table(self::TABLE_LOCATION)->where(self::COLUMN_USERREF,$id)->count()==0){
                $data[self::COLUMN_USERREF]=$id; 
                $this->database->table(self::TABLE_LOCATION)->insert($data);
                
            } else {
                $this->database->table(self::TABLE_LOCATION)->where(self::COLUMN_USERREF,$id)
                    ->update($data);           
            }
        }
        
        public function getPosition(){
            return $this->database->table(self::TABLE_LOCATION)->where(self::COLUMN_ISACTIVE,1)->fetchAll();         
        }
        
        public function getUsername($username){
            return $this->database->table(self::TABLE_NAME)->where(self::COLUMN_NAME,$username);          
        }
        
        public function getAll($column = 'username'){
            // Získání dat z tabulky databáze
            return $this->database->table(self::TABLE_NAME)->order($column)->fetchAll();
            
        }
        
        public function delete($id) {
            // Smazání záznamu v tabulce databáze
            $this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
        }
        
}



class DuplicateNameException extends \Exception
{
}
