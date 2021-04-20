<?php include 'view/header.php'; ?>

<section class="add_container">
    <section>
    <h2>Vehicle Class List</h2>
        <div class="admin-table-overflow">
            <?php if ( sizeof($classes) != 0) { ?>
            <table class="admin-table">
                <tr>
                    <th colspan="2">Name</th>
                </tr>
                <?php foreach ($classes as $class) : ?>
                <tr>
                    <td><?php echo $class['Class']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="class_id" value="<?php echo $class['ID']; ?>" />
                            <input type="submit" value="Remove" class="button red button-slim" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php } else { ?>
            <p>
                There are no vehicle classes in your database.
            </p>
            <?php } ?>
        </div>
    </section>
    <section>
        <h2>Add Vehicle Class</h2>
        <form action="." method="post" id="add_class_form">
            <input type="hidden" name="action" value="add_class">

            <label>Name:</label>
            <input type="text" name="class_name" max="20" required><br>

            <input id="add_class_button" type="submit" class="button blue" value="Add Class"><br>
        </form>
    </section>
</section>
<?php include('view/footer.php') ?>