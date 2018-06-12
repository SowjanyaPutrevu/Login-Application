<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1><?=  $login ?></h1>
<div>
    <a href="index.php?r=site/add-address&login=<?php echo $login; ?>">
                <button type=button class="button">Add address</button>
    </a>
</div>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Postal Code</th>
            <th>Country</th>
            <th>City Name</th>
            <th>Street Name</th>
            <th>House Number</th>
            <th>Office/Appartment Number</th>
            <th>Actions</th>
        </tr>
    </thead>
 
<?php foreach ($user_addresses as $user): ?>
    <tr>
        <td><?= $user->postalcode ?></td>
        <td><?= $user->country ?></td>
        <td><?= $user->city_name ?></td>
        <td><?= $user->street_name ?></td>
        <td><?= $user->house_number ?></td>
        <td><?= $user->office_appartment_number ?></td>
        <td>
            <a href="index.php?r=site/address-edit&ID=<?php echo $user->ID; ?>">
                <span class="glyphicon glyphicon-edit"></span>
            </a>
            <a href="index.php?r=site/address-delete&ID=<?php echo $user->ID; ?>">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>

    </tr>
<?php endforeach; ?>
</table>
