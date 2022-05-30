<div class="menu-sidebar">
    <h2>Menu Admin</h2>
    <div class="menu-admin">
        <ul>
            <a href="">
                <li <?= (TITLE == '') ? 'class = "active-menu" ' : '' ?> >Dashboard</li>
            </a>
            <a href="">
                <li <?= (TITLE == 'Banner') ? 'class = "active-menu" ' : '' ?> >Banner</li>
            </a>
            <a href="">
                <li <?= (TITLE == 'Category') ? 'class = "active-menu" ' : '' ?> >Category</li>
            </a>
            <a href="">
                <li <?= (TITLE == 'Product') ? 'class = "active-menu" ' : '' ?> >Product</li>
            </a>
            <a href="">
                <li <?= (TITLE == 'Order') ? 'class = "active-menu" ' : '' ?> >Order</li>
            </a>
            <a href="<?= URL_ADMIN ?>/user">
                <li <?= (TITLE == 'User') ? 'class = "active-menu" ' : '' ?> >User</li>
            </a>
            <a href="<?= URL_ADMIN ?>/role">
                <li <?= (TITLE == 'Role') ? 'class = "active-menu" ' : '' ?> >Role</li>
            </a>
        </ul>
    </div>
</div>