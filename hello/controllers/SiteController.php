<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Userdetails;
use app\models\UserAddress;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }



    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionEntry()
    {
        $model = new EntryForm();
       //$request    = Yii::$app->request; 


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model

            // do something meaningful here about $model ...
            $userdetails = new Userdetails();
            $userdetails->login = $model->login;
            $userdetails->password = $model->password;
            $userdetails->name = $model->name;
            $userdetails->surname = $model->surname;
            $userdetails->gender = $model->gender;
            $userdetails->email = $model->email;
            
            if($userdetails->save() ){
                
            }else{
                $errors = $userdetails->getErrors();
                $msg = "";
                foreach ($errors as $key => $value) {
                  $msg .= implode($value) . "\n" ;
                }
                return $this->render('error', ['name' => 'Formerrors', 'message' => $msg ]);
            }

            $useraddress = new UserAddress;

            $useraddress->login = $model->login;
            $useraddress->postalcode = $model->postalcode;
            $useraddress->country = $model->country;
            $useraddress->city_name = $model->city_name;
            $useraddress->street_name = $model->street_name;
            $useraddress->house_number = $model->house_number;
            $useraddress->office_appartment_number = $model->office_appartment_number;

            if($useraddress->save() ){                
            }else{
                $errors = $useraddress->getErrors();
                $msg = "";
                foreach ($errors as $key => $value) {
                  $msg .= implode($value) . "\n" ;
                }
                return $this->render('error', ['name' => 'Formerrors', 'message' => $msg ]);
            }
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        }
   /* if ($model->load(Yii::$app->request->post())) {
            $model->name = $request->post('name');
            $model->email = $request->post('email');
            $model->surname = $request->post('surname');
            $model->validate();

            if($model->has_errors){

            }

            $model->save();
            Yii::$app->getSession()->setFlash('success', 'Your message has been successfully recorded.');
        }

        return $this->render('entry', [
            'model' => $model
        ]);*/
    }

    public function actionShow()
    {
        $query = Userdetails::find();
        //$posts = Yii::$app->db->createCommand('SELECT * FROM userdetails')
           // ->All();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $users = $query->orderBy('login')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $addresses = [];
        foreach ($users as $value ) {
            $user_addresses = UserAddress::find()
                        ->where(['login' => $value->login])
                        ->all();
            $addresses[ $value->login ]= $user_addresses;
        }

        return $this->render('show', [
            'users' => $users,
            'user_addresses' => $addresses,
            'pagination' => $pagination,
        ]);
    }

    public function actionUserEdit($login){
    
        $error_msg = "";
        $is_error = false;
        if(!$login){
            $error_msg = "Please give a login";
            $is_error = true;
        }

        $userdetails = new Userdetails();
        $user = userdetails::findOne([ 'login' => $login ]);

        if(!$user){
            $is_error = true;
            $error_msg = "Please enter valid login";
        }

        if($is_error){
            return $this->render('error', [ 'name' => 'Error', 'message' => $error_msg ]);
        }

        if($user->load(Yii::$app->request->post()) && $user->validate()){
            $user->save();
            return $this->redirect(array('site/show'));
        }else{
            return $this->render('user-edit',['model' => $user ]);
        }

    }
    
    public function actionUserDelete($login){
        $error_msg = "";
        $is_error = false;
        if(!$login){
            $error_msg = "Please give a login";
            $is_error = true;
        }else{
            $userdetails = new Userdetails();
            $user = userdetails::findOne([ 'login' => $login ]);
            if(!$user){
                $is_error = true;
                $error_msg = "Please enter valid login";
            }
            if($is_error){
                return $this->render('error', [ 'name' => 'Error', 'message' => $error_msg ]);
            }
            $user->delete();

            $useraddress = new UserAddress();
            $useraddress->deleteAll(['login' => $login]);

        }
        return $this->render('delete-confirm');
    }

    public function actionShowAddress($login)
    {       
        $user_addresses = UserAddress::find()
                        ->where(['login' => $login])
                        ->all();        

        return $this->render('show-address', [
            'login' => $login,
            'user_addresses' => $user_addresses            
        ]);
    }

    public function actionAddAddress($login){
        $error_msg = "";
        $is_error = false;
        if(!$login){
            $error_msg = "Please give a login";
            $is_error = true;
        }else{
            $address = new UserAddress();
            if($address->load(Yii::$app->request->post()) && $address->validate()){
                $address->save();
                return $this->redirect(['site/show-address','login' => $login]);            
            } 
            $address->login = $login;
            return $this->render('add-address',['model' => $address]);
        }
               
    }

    public function actionAddressEdit($ID){
        

        $userdetails = new UserAddress();
        $user = UserAddress::findOne([ 'ID' => $ID ]);   


        if($user->load(Yii::$app->request->post()) && $user->validate()){
            $user->save();
            return $this->redirect(['site/show-address','login' => $user->login ]);            
        }else{
            return $this->render('address-edit',['model' => $user ]);
        }
    }

    public function actionAddressDelete($ID){
        $error_msg = "";
        $is_error = false;
        if(!$ID){
            $error_msg = "Please give a login";
            $is_error = true;
        }else{
            $userdetails = new UserAddress();
            $user = UserAddress::findOne([ 'ID' => $ID ]);   
            if(!$userdetails){
                $is_error = true;
                $error_msg = "Please enter valid login";
            }
            if($is_error){
                return $this->render('error', [ 'name' => 'Error', 'message' => $error_msg ]);
            }
            $user->delete();
        }
        return $this->render('delete-confirm');
        }
    

}
