<?php
include_once "../layout/header.php";
include_once "../layout/sidebar.php";
?>

<?php
    $sql = "SELECT * FROM tbl_role";
    $role = executeResult($sql);
?>

<?php
    if (isset($_POST['submit']))
    {
        $user_name = ucfirst($_POST['user_name']);
        $user_email = $_POST['user_email'];
        $user_pass = md5($_POST['user_pass']);
        $user_phone = $_POST['user_phone'];
        $user_address = $_POST['user_address'];
        $user_role = $_POST['user_role'];

        //Xu ly hinh anh
        $image_name = $_FILES['user_image']['name'];
        $image_tmp = $_FILES['user_image']['tmp_name'];
        $image_new_name = time().'-'.$image_name;
        $folder_image =  FOLDER_ROOT  .  '/public/image/user/';
        $sql = "INSERT INTO tbl_user (name, email, password, image, phone, address, role_id) 
                VALUES ('$user_name', '$user_email', '$user_pass', '$image_new_name', '$user_phone', '$user_address', '$user_role')";
        execute($sql);
        move_uploaded_file($image_tmp, $folder_image.$image_new_name);
        header('Location:index.php');
    }
?>
    <div class="main-content">
        <div class="header-main">
            <h2>CREATE NEW USER</h2>
            <a class="add-new-data" href="<?= URL_ADMIN ?>/user">
                <i class="fas fa-list-alt"></i>
                <strong>LIST</strong>
            </a>
        </div>
        <div class="form-add-new">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="user_name">User name:</label>
                <input type="text" name="user_name" id="user_name">
                <label for="user_email">User email:</label>
                <input type="email" name="user_email" id="user_email">
                <label for="user_pass">User password:</label>
                <input type="password" name="user_pass" id="user_pass">
                <label for="user_phone">User phone:</label>
                <input type="text" name="user_phone" id="user_phone">
                <label for="user_address">User address:</label>
                <input type="text" name="user_address" id="user_address">
                <label for="user_image">User image:</label>
                <input type="file" name="user_image" id="user_image" onchange="loadImage(event);">
                <div class="preImage">
                    <img id="previewImage" src="" alt="" style="margin-top: 10px; border-radius: 50%; width: 30%">
                </div>
                <label for="user_role">User role:</label>
                <select name="user_role" id="user_role">
                    <?php foreach ($role as $item) : ?>
                        <option value="<?= $item['id'] ?>"> <?= $item['name'] ?> </option>
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
