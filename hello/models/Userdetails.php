<?php

namespace app\models;

use \yii\db\ActiveRecord;

class Userdetails extends ActiveRecord {

	public static function tableName(){
		return "userdetails";
	}

	public function rules(){
	    return array (
	       			array( array('login','password','name','surname','gender','email'), 'safe'),
	       			array( array('login','password','name','surname','gender','email'), 'required'),
	       			['email', 'email'],
            		['password','string', 'min' => 6],
            		['name','match','pattern'=> '/^.*(?=.*[A-Z][a-z0-9_-]).*$/','message' =>'first letter should be capital letter'],
            		['surname','match','pattern'=> '/^.*(?=.*[A-Z][a-z0-9_-]).*$/','message' =>'first letter should be capital letter'],            
            	);
	}

}