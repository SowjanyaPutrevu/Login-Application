<?php

namespace app\models;

use \yii\db\ActiveRecord;
use yii;

class UserAddress extends ActiveRecord {

	public static function tableName(){
		return "useraddress";
	}

	public function rules(){
	    return array (
	       			array( array('login','postalcode','country','city_name','street_name','house_number','office_appartment_number'), 'safe'),
	       			array( array('login','postalcode','country','street_name','city_name','house_number'), 'required'),
	       			['postalcode','integer'],
	       			['country','match','pattern' => '/^.*(?=.*[A-Z]).*$/']
	       		);
	}
	 public function attributeLabels()
    {
        return [            
            'login' => Yii::t('app','login')
        ];
    }

}