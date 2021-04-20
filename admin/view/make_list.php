<?php include 'view/header.php'; ?>


<section class="add_container">
    
    <section>
        <h2>Vehicle Make List</h2>
        <div class="admin-table-overflow">
            <?php if ( sizeof($makes) != 0) { ?>
            <table class="admin-table">
                <tr>
                    <th colspan="2">Name</th>
                </tr>
                <?php foreach ($makes as $make) : ?>
                <tr>
                    <td><?= $make['Make']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_make">
                            <input type="hidden" name="make_id" value="<?= $make['ID']; ?>" />
                            <input type="submit" value="Remove" class="button red button-slim" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php } else { ?>
            <p>
                There are no vehicle makes in your database.
            </p>
            <?php } ?>
        </div>
    </section>
    
    <section>
        <h2>Add Vehicle make</h2>
        <form action="." method="post" id="add_make_form">
            <input type="hidden" name="action" value="add_make">

            <label>Name:</label>
            <input type="text" name="make_name" max="20" required><br>

            <input id="add_make_button" type="submit" class="button blue" value="Add make"><br>
        </form>
    </section>
</section>
<?php include('view/footer.php') ?>