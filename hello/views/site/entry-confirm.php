<?php
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
	<li><label>Login</label>: <?= Html::encode($model->login) ?></li>
	<li><label>Password</label>: <?= Html::encode($model->password) ?></li>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Surname</label>: <?= Html::encode($model->surname) ?></li>
    <li><label>Gender</label>: <?= Html::encode($model->gender) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>             
    <li><label>Postalcode</label>: <?= Html::encode($model->postalcode) ?></li>
    <li><label>Country</label>: <?= Html::encode($model->country) ?></li>
    <li><label>City Name</label>: <?= Html::encode($model->city_name) ?></li>
    <li><label>Street Name</label>: <?= Html::encode($model->street_name) ?></li>
    <li><label>House Number</label>: <?= Html::encode($model->house_number) ?></li>
    <li><label>Office/Appartment Number</label>: <?= Html::encode($model->office_appartment_number) ?></li>    
</ul>