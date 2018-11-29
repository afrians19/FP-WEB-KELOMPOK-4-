<?php

require_once('../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/menus/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $menu = [];
  $menu['id'] = $id;
  $menu['menu_name'] = $_POST['menu_name'] ?? '';
  $menu['visible'] = $_POST['visible'] ?? '';
  $menu['content'] = $_POST['content'] ?? '';

  $result = update_menu($menu);
  if($result === true) {
    $_SESSION['message'] = 'Menu berhasil diubah.';
  } else {
    $errors = $result;
  }

} else {

  $menu = find_menu_by_id($id);

}

$menu_set = find_all_menus();
$menu_count = mysqli_num_rows($menu_set);
mysqli_free_result($menu_set);

?>

<?php $page_title = 'Ubah Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/menus/index.php'); ?>">&laquo; Back to List</a>

  <div class="page edit">
    <h1>Edit menu</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/menus/edit.php?id=' . h(u($id))); ?>" method="post">
      
      <dl>
        <dt>Menu Name</dt>
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
        <input type="submit" value="Edit menu" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
