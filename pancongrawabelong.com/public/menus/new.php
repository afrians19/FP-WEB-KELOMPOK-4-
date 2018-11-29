<?php

require_once('../../private/initialize.php');

require_login();

if(is_post_request()) {

  $menu = [];
  $menu['menu_name'] = $_POST['menu_name'] ?? '';
  $menu['visible'] = $_POST['visible'] ?? '';
  $menu['content'] = $_POST['content'] ?? '';

  $result = insert_menu($menu);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Menu berhasil ditambahkan.';
  } else {
    $errors = $result;
  }

} else {

  $menu = [];
  $menu['menu_name'] = '';
  $menu['visible'] = '';
  $menu['content'] = '';

}

$menu_set = find_all_menus();
$menu_count = mysqli_num_rows($menu_set) + 1;
mysqli_free_result($menu_set);

?>

<?php $page_title = 'Tambah Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/menus/index.php'); ?>">&laquo; Kembali ke halaman sebelumnya</a>

  <div class="page new">
    <h1>Tambah Menu</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/menus/new.php'); ?>" method="post">
      <dl>
        <dt>Nama Menu</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($menu['menu_name']); ?>" /></dd>
      </dl>
      
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php if($menu['visible'] == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
	  
      <dl>
        <dt>Content</dt>
        <dd>
          <textarea name="content" cols="60" rows="10"><?php echo h($menu['content']); ?></textarea>
        </dd>
      </dl>
	  
      <div id="operations">
        <input type="submit" value="Tambah Menu" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
