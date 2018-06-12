<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\validators;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $login;
    public $password;
    public $surname;
    public $gender;
    public $postalcode;
    public $country;
    public $city_name;
    public $street_name;
    public $house_number;
    public $office_appartment_number;

    public function rules()
    {
        return [

            array( array('login','password','name','surname','gender','email','postalcode','country','city_name','street_name','house_number','office_appartment_number'), 'safe'),
                    array( array('login','password','name','surname','gender','email','postalcode','country','street_name','city_name','house_number'), 'required'),
            ['login','unique','targetClass' => 'app\models\Userdetails','message' => 'this username has already been taken'],
            ['email','unique','targetClass' => 'app\models\Userdetails','message' => 'this email is already present'],
            ['email', 'email'],
            ['login','string','min' => 4],
            ['password','string', 'min' => 6],
            ['country','match','pattern' => '/^.*(?=.*[A-Z]).*$/'],
            ['country','string','length' => 2],
            ['name','match','pattern'=> '/^.*(?=.*[A-Z][a-z0-9_-]).*$/','message' =>'first letter should be capital letter'],
            ['surname','match','pattern'=> '/^.*(?=.*[A-Z][a-z0-9_-]).*$/','message' =>'first letter should be capital letter'],            
            ['postalcode','integer']
        ];
    }    
}
