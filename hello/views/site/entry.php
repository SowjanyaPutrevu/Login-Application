
<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>	
    
    <div class="border-group">

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?php 
    	$list = [ 'male' => 'male', 'female' => 'female', 'not available' => 'no information'];
    ?>

 	<?= $form->field($model, 'gender')->radioList($list) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'postalcode') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'city_name')->label('City Name') ?>

    <?= $form->field($model, 'street_name')->label('Street Name') ?>

    <?= $form->field($model, 'house_number')->label('House Number') ?>

    <?= $form->field($model, 'office_appartment_number')->label('Office/Appartment number') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    </div>

    <?php ActiveForm::end(); ?>    

     <style>
    .border-group{
        padding-left: 15px;
        padding-right: 15px;
        border-style: solid;
    }
    </style>