<?php include 'view/header.php'; ?>

<section class="add_container">
    <section>
        <h2>Vehicle Type List</h2>
        <div class="admin-table-overflow">
            <?php if ( sizeof($types) != 0) { ?>
            <table class="admin-table">
                <tr>
                    <th colspan="2">Name</th>
                </tr>
                <?php foreach ($types as $type) : ?>
                <tr>
                    <td><?= $type['Type']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="type_id" value="<?= $type['ID']; ?>" />
                            <input type="submit" value="Remove" class="button red button-slim" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php } else { ?>
            <p>
                There are no vehicle types in your database.
            </p>
            <?php } ?>
        </div>
    </section>
    <section>
        <h2>Add Vehicle Type</h2>
        <form action="." method="post" id="add_type_form">
            <input type="hidden" name="action" value="add_type">

            <label>Name:</label>
            <input type="text" name="type_name" max="20" required><br>

            <input id="add_type_button" type="submit" class="button blue" value="Add Type"><br>
        </form>
    </section>
</section>
<?php include('view/footer.php') ?>