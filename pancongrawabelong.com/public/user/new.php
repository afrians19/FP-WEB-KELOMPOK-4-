<?php

require_once('../../private/initialize.php');

if(is_post_request()) {
  //$subject = [];
  $user['first_name'] = $_POST['first_name'] ?? '';
  $user['last_name'] = $_POST['last_name'] ?? '';
  $user['email'] = $_POST['email'] ?? '';
  $user['username'] = $_POST['username'] ?? '';
  $user['address'] = $_POST['address'] ?? '';
  $user['phone'] = $_POST['phone'] ?? '';
  $user['password'] = $_POST['password'] ?? '';
  $user['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = insert_user($user);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    //$_SESSION['message'] = 'Akun anda berhasil dibuat.';
    redirect_to(url_for('/user/login.php'));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $user = [];
  $user["first_name"] = '';
  $user["last_name"] = '';
  $user["email"] = '';
  $user["username"] = '';
  $user['address'] = '';
  $user['phone'] = '';
  $user['password'] = '';
  $user['confirm_password'] = '';
}

?>

<?php $page_title = 'Registrasi'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/user/login.php'); ?>">&laquo; Kembali ke halaman berikutnya</a>

  <div class="user new">
    <h1>Silahkan isi dengan lengkap dan benar</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/user/new.php'); ?>" method="post">
      <dl>
        <dt>Nama Depan</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($user['first_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Nama Belakang</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($user['last_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="username" value="<?php echo h($user['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Email </dt>
        <dd><input type="text" name="email" value="<?php echo h($user['email']); ?>" /><br /></dd>
      </dl>
		
	  <dl>
        <dt>Alamat Lengkap</dt>
        <dd><input type="text" name="address" value="<?php echo h($user['address']); ?>" /><br /></dd>
      </dl>
	  
	  <dl>
        <dt>Nomor Telepon</dt>
        <dd><input type="text" name="phone" value="<?php echo h($user['phone']); ?>" /><br /></dd>
      </dl>
	  
      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="password" value="" /></dd>
      </dl>

      <dl>
        <dt>Konfimasi Password</dt>
        <dd><input type="password" name="confirm_password" value="" /></dd>
      </dl>
      <p>
        Password setidaknya harus memiliki 12 karakter dan setidaknya harus memiliki satu huruf besar, huruf kecil, angka, dan simbol.
      </p>
      <br />

      <div id="operations">
        <input type="submit" value="Tambahkan user" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
