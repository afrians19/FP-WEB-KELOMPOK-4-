<?php

require_once('../../../private/initialize.php');

require_login();

$id = $_GET['id'] ?? '1'; // PHP > 7.0
$admin = find_admin_by_id($id);

?>

<?php $page_title = 'Lihatkan Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Kembali ke List</a>

  <div class="admin show">

    <h1>Admin: <?php echo h($admin['username']); ?></h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($admin['id']))); ?>">Ubah</a>
      <a class="action" href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>">Hapus</a>
    </div>

    <div class="attributes">
      <dl>
        <dt>Nama Depan</dt>
        <dd><?php echo h($admin['first_name']); ?></dd>
      </dl>
      <dl>
        <dt>Nama Belakang</dt>
        <dd><?php echo h($admin['last_name']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($admin['email']); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($admin['username']); ?></dd>
      </dl>
    </div>

  </div>

</div>
