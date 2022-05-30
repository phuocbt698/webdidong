<?php
    include_once "../layout/header.php";
    include_once "../layout/sidebar.php";
?>

<?php
    $sql = "SELECT * FROM tbl_role";
    $role = executeResult($sql);
?>

<?php
    //Lấy thông tin cần sửa
    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_user WHERE id = $id";
        $user = executeResult($sql, 1);
    }
?>

<?php
    if (isset($_POST['submit']))
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_user WHERE id = $id";
        $user = executeResult($sql, 1);
        $link_image_old = FOLDER_ROOT . '/public/image/user/' . $user['image'];
        $user_name = ucfirst($_POST['user_name']);
        $user_email = $_POST['user_email'];
        $user_pass = md5($_POST['user_pass']);
        $user_phone = $_POST['user_phone'];
        $user_address = $_POST['user_address'];
        $user_role = $_POST['user_role'];
        if (!empty($_FILES['user_image']['name']))
        {
            //Xu ly hinh anh
            $image_name = $_FILES['user_image']['name'];
            $image_tmp = $_FILES['user_image']['tmp_name'];
            $image_new_name = time().'-'.$image_name;
            $folder_image =  FOLDER_ROOT  .  '/public/image/user/';
            $sql = "UPDATE tbl_user SET name = '$user_name', email = '$user_email', password = '$user_pass', image = '$image_new_name', phone = '$user_phone', address = '$user_address', role_id = '$user_role'
                    WHERE id = $id";
            execute($sql);
            move_uploaded_file($image_tmp, $folder_image.$image_new_name);
            unlink($link_image_old);
        }
        else
        {
            $sql = "UPDATE tbl_user SET name = '$user_name', email = '$user_email', password = '$user_pass', phone = '$user_phone', address = '$user_address', role_id = '$user_role'
                    WHERE id = $id";
            execute($sql);
        }
        header('Location:index.php');
    }
?>
<div class="main-content">
    <div class="header-main">
        <h2>UPDATE USER</h2>
        <a class="add-new-data" href="<?= URL_ADMIN ?>/user">
            <i class="fas fa-list-alt"></i>
            <strong>LIST</strong>
        </a>
    </div>
    <div class="form-add-new">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="user_name">User name:</label>
            <input type="text" name="user_name" id="user_name" value="<?= (isset($user['name'])) ? $user['name'] : '' ?>">
            <label for="user_email">User email:</label>
            <input type="email" name="user_email" id="user_email" value="<?= (isset($user['name'])) ? $user['email'] : '' ?>">
            <label for="user_pass">User password:</label>
            <input type="password" name="user_pass" id="user_pass" value="<?= (isset($user['name'])) ? $user['password'] : '' ?>">
            <label for="user_phone">User phone:</label>
            <input type="text" name="user_phone" id="user_phone" value="<?= (isset($user['name'])) ? $user['phone'] : '' ?>">
            <label for="user_address">User address:</label>
            <input type="text" name="user_address" id="user_address" value="<?= (isset($user['name'])) ? $user['address'] : '' ?>">
            <label for="user_image">User image:</label>
            <input type="file" name="user_image" id="user_image" onchange="loadImage(event);">
            <div class="preImage">
                <img id="previewImage" src="<?= isset($user['image']) ? URL_ROOT . '/public/image/user/' . $user['image'] : '' ?>" alt="" style="margin-top: 10px; border-radius: 50%; width: 30%">
            </div>
            <label for="user_role">User role:</label>
            <select name="user_role" id="user_role">
                <?php foreach ($role as $item) : ?>
                    <option value="<?= $item['id'] ?>" <?= (isset($user['role_id']) && ($user['role_id']) == $item['id']) ? 'selected' : '' ?> > <?= $item['name'] ?> </option>
                <?php endforeach; ?>
            </select>
            <div class="button-submit">
                <button type="submit" name="submit">Save</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "../layout/footer.php";
?>
<script type="text/javascript">
    let loadImage = function(event) {
        let preImage = document.getElementById('previewImage');
        preImage.src = URL.createObjectURL(event.target.files[0]);
        preImage.onload = function() {
            URL.revokeObjectURL(preImage.src);
        }
    };
</script>
