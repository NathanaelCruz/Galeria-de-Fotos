<?php

namespace PhotoGallery;

use PhotoGallery\DB\Sql;

class User extends Model
{
    CONST SESSION = "User";

    public static function loginUser($login, $password)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM users WHERE deslogin = :deslogin", array(

            ":deslogin" => $login

        ));

        if (count($results) === 0) {
            header("Location: /photogallery/admin?s=error");
            exit;
        }

        $data = $results[0];

        if(password_verify($password, $data["despassword"]) === true){

			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		}else{
            
            header("Location: /photogallery/admin?s=error");
            exit;
		}

    }

    public static function verifyLogin()
    {

        if(!isset($_SESSION[User::SESSION]) || !$_SESSION[User::SESSION] || !(int)$_SESSION[User::SESSION]["iduser"] > 0){
            header("Location: /photogallery/admin");
            exit;
        }        

    }

	public static function logout(){

		$_SESSION[User::SESSION] = NULL;

	}

}

?>