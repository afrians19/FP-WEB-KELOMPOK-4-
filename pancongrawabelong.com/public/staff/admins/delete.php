<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $result = delete_admin($id);
  $_SESSION['message'] = 'Admin dihapus.';
  redirect_to(url_for('/staff/admins/index.php'));
} else {
  $admin = find_admin_by_id($id);
}

?>

<?php $page_title = 'Hapus Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Kembali ke halaman sebelumnya</a>

  <div class="admin delete">
    <h1>Hapus Admin</h1>
    <p>Apakah anda yakin ingin menghapus admin ini?</p>
    <p class="item"><?php echo h($admin['username']); ?></p>

    <form action="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Admin" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
