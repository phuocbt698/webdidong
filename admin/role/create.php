<?php
include_once "../layout/header.php";
include_once "../layout/sidebar.php";
?>
<?php
    if (isset($_POST['submit']))
    {
        $role_name = ucfirst($_POST['role_name']);
        $sql = "INSERT INTO tbl_role (name) VALUES ('$role_name')";
        execute($sql);
        header("Location:index.php");
    }
?>

    <div class="main-content">
        <div class="header-main">
            <h2>CREATE NEW ROLE</h2>
            <a class="add-new-data" href="<?= URL_ADMIN ?>/role">
                <i class="fas fa-list-alt"></i>
                <strong>LIST</strong>
            </a>
        </div>
        <div class="form-add-new">
            <form action="./create.php" method="POST">
                <label for="role_name">Name:</label>
                <input type="text" name="role_name" id="role_name">
                <div class="button-submit">
                    <button type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
<?php
include_once "../layout/footer.php";
?>