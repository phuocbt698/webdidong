<?php
include_once "../layout/header.php";
include_once "../layout/sidebar.php";
?>

<?php
    //Lấy thông tin cần sửa
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_role WHERE id = $id";
        $role = executeResult($sql, 1);
    }

?>

<?php
    //khi submit của form update gửi đi
    if (isset($_POST['submit']))
    {
        $role_name = $_POST['role_name'];
        $id = $_GET['id'];
        $sql = "UPDATE tbl_role SET name = '$role_name' WHERE id = $id";
        execute($sql);
        header('Location:index.php');
    }
?>

    <div class="main-content">
        <div class="header-main">
            <h2>UPDATE ROLE</h2>
            <a class="add-new-data" href="<?= URL_ADMIN ?>/role">
                <i class="fas fa-list-alt"></i>
                <strong>LIST</strong>
            </a>
        </div>
        <div class="form-add-new">
            <form action="" method="POST">
                <label for="role_name">Name:</label>
                <input type="text" name="role_name" id="role_name" value="<?= (isset($role['name'])) ? $role['name'] : '' ?>">
                <div class="button-submit">
                    <button type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
<?php
include_once "../layout/footer.php";
?>