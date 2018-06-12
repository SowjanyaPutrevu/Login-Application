<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?php 
    	$list = [ 'male' => 'male', 'female' => 'female', 'not available' => 'no information'];
    ?>

 	<?= $form->field($model, 'gender')->radioList($list) ?>

    <?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>