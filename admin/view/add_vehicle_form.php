<?php include 'view/header.php'; ?>

<h2>Add Vehicle</h2>
<form action="." method="post" id="add_vehicle_form" class="add_vehicle_form">
    <input type="hidden" name="action" value="add_vehicle">
    <div>
        <label>Make:</label>
        <select name="make_id">
            <?php foreach ($makes as $make) : ?>
            <option value="<?= $make['ID']; ?>">
                <?= $make['Make']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Type:</label>
        <select name="type_id">
            <?php foreach ($types as $type) : ?>
            <option value="<?= $type['ID']; ?>">
                <?= $type['Type']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Class:</label>
        <select name="class_id">
            <?php foreach ($classes as $class) : ?>
            <option value="<?= $class['ID']; ?>">
                <?= $class['Class']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br>
    </div>
    <div>           
        <label for="year">Year:</label>
        <input type="text" name="year" min="1920" max="2100" maxlength="4" pattern="[0-9]{1,5}" required>
        <br>
        <label for="model">Model:</label>
        <input type="text" name="model" maxlength="50" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" name="price" required>
        <br>
        <input type="submit" value="Add Vehicle" class="button blue">
        <br>
    </div>
    
</form>
<?php include('view/footer.php') ?>