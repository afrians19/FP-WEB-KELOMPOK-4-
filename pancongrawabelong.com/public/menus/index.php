<?php require_once('../../private/initialize.php'); ?>

<?php

  require_login();

  $menu_set = find_all_menus();
  
?>

<?php $page_title = 'menus'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="pages listing">
    <h1>Menus</h1>
    
    <div class="actions">
      <a class="action" href="<?php echo url_for('/menus/new.php'); ?>">Tambah Menu</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Visible</th>
  	    <th>Menu</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($menu = mysqli_fetch_assoc($menu_set)) { ?>
        <tr>
          <td><?php echo h($menu['id']); ?></td>
          <td><?php echo $menu['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo h($menu['menu_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('/menus/edit.php?id=' . h(u($menu['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/menus/delete.php?id=' . h(u($menu['id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php mysqli_free_result($menu_set); ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
