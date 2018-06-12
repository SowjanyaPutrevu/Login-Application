<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'login')->textInput()->input('login',['disabled' => true]) ?>   

	<?= $form->field($model, 'postalcode') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'city_name')->label('city name') ?>

    <?= $form->field($model, 'street_name')->label('street name') ?>

    <?= $form->field($model, 'house_number')->label('house number') ?>

    <?= $form->field($model, 'office_appartment_number')->label('office/appartment number') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>