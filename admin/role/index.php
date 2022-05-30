<?php
    include_once "../layout/header.php";
    include_once "../layout/sidebar.php";
?>

<?php
    /*
     * Xoa du lieu
     */
    if (isset($_GET['action']) && $_GET['action'] == 'delete')
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM tbl_role WHERE id = $id";
        execute($sql);
        header('Location:index.php');
    }
?>

<?php
    /*
     * Phan trang
     * lay toan bo du lieu hoac theo tim kiem
     */

    /*
     * Phan trang
     */
    $text_search = '';
    if (isset($_GET['text_search']))
    {
        $text_search = $_GET['text_search'];
    }

    $page = 1;
    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    $sql = "SELECT COUNT(*) FROM tbl_role WHERE name LIKE '%$text_search%'";
    $total_result = executeResult($sql, 1)['COUNT(*)'];
    $total_result_page = 5;
    $total_page = ceil($total_result/$total_result_page);
    $skip_result = $total_result_page * ($page - 1);

    /*
     * lay toan bo du lieu hoac theo tim kiem
     */
    $sql = "SELECT * FROM tbl_role WHERE name LIKE '%$text_search%' LIMIT $total_result_page OFFSET $skip_result";
    $role = executeResult($sql);
?>

<div class="main-content">
    <div class="header-main">
        <h2>LIST ROLE</h2>
        <a class="add-new-data" href="<?= URL_ADMIN ?>/role/create.php">
            <i class="fas fa-plus-square"></i>
            <strong>CREATE NEW</strong>
        </a>
    </div>
    <div class="data-table">
        <div class="text-search">
            <form action="" method="GET">
                <label for="text_search">Search :</label>
                <input type="search" name="text_search" id="text_search" value="<?= $text_search ?>">
            </form>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($role as $item) : ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td>
                        <a href="<?= URL_ADMIN ?>/role/update.php?id=<?= $item['id'] ?>">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="?action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Bạn có thực sự muốn xóa dòng dữ liệu này!')">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paging">
        <?php for ($i=1; $i<=$total_page; $i++) : ?>
            <a href="?page=<?= $i ?>&text_search=<?=$text_search?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
</div>
<?php
    include_once "../layout/footer.php";
?>

