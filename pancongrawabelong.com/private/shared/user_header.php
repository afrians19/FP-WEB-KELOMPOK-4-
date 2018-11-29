<?php
  if(!isset($page_title)) { $page_title = 'Registrasi Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Pancong Cake RawaBelong - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff_user.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>Pancong Cake RawaBelong</h1>
    </header>

   <navigation>
      <ul>
        <li>User: <?php echo $_SESSION['username'] ?? ''; ?></li>
        <li><a href="<?php echo url_for('/user/logout.php'); ?>">Logout</a></li>
      </ul>
    </navigation>
   
    <?php echo display_session_message(); ?>
