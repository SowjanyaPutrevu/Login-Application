<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use yii;

class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();
        $posts = Yii::$app->db->createCommand('SELECT * FROM userdetails')
            ->queryAll();


        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $posts,
            'pagination' => $pagination,
        ]);
    }
}