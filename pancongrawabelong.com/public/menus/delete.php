<?php

require_once('../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/menus/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_menu($id);
  $_SESSION['message'] = 'Menu berhasil dihapus.';
  redirect_to(url_for('/menus/index.php'));

} else {
  $menu = find_menu_by_id($id);
}

?>

<?php $page_title = 'Hapus Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/menus/index.php'); ?>">&laquo; Kembali ke halaman sebelumnya</a>

  <div class="page delete">
    <h1>Delete menu</h1>
    <p>Are you sure you want to delete this menu?</p>
    <p class="item"><?php echo h($menu['menu_name']); ?></p>

    <form action="<?php echo url_for('/menus/delete.php?id=' . h(u($menu['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Hapus Menu" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
