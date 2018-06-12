<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Users</h1>
<ul>
<?php foreach ($countries as $country): ?>
    <li>
        <?= Html::encode("{$country['login']} ({$country['name']})") ?>:
        <?= $country['surname'] ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>