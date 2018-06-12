<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Users</h1>
<div>
    <a href="index.php?r=site/entry">
                <button type=button class="button">Add User</button>
    </a>
</div>
<table class="table table-striped">
	<thead class="thead-dark">
    	<tr>
        	<th>Login  </th>
	        <th>Name</th>
	        <th>Surname</th>
	        <th>Actions</th>
	        <th>Address</th>
	    </tr>
	</thead>
 
<?php foreach ($users as $user): ?>
    <tr>

        <td><?= Html::encode("{$user['login']}") ?></td>
        <td><?= $user['name'] ?> </td>
        <td><?= $user['surname'] ?></td>
        <td>
        	<a href="index.php?r=site/user-edit&login=<?php echo $user->login; ?>">
        		<span class="glyphicon glyphicon-edit"></span>
        	</a>
        	<a href="index.php?r=site/user-delete&login=<?php echo $user->login; ?>">
        		<span class="glyphicon glyphicon-trash"></span>
        	</a>
        </td>
        <td>
        	<a href="index.php?r=site/show-address&login=<?php echo $user->login; ?>">
        		<button type=button class="button">view/modify addresses</button>
        	</a>
        </td>

    </tr>
<?php endforeach; ?>
</table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>