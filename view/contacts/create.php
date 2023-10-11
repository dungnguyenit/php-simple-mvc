<link rel="stylesheet" href="../../public/css/globalStyles.css">
<link rel="stylesheet" href="../../public/css/create.css">

<?php if (isset($_SESSION['err_message'])) { ?>
  <div class="alert alert-success" id="err_message" role="alert">
    <?php echo $_SESSION['err_message'] ?>
  </div>
<?php unset($_SESSION['err_message']);
} ?>
<?php if (isset($_SESSION['err_phone'])) { ?>
  <div class="alert alert-success" id="err_phone" role="alert">
    <?php echo $_SESSION['err_phone'] ?>
  </div>
<?php unset($_SESSION['err_phone']);
} ?>
<div class="container">
  <h1>create new contact</h1>
  <form action="add" method="POST">
    <div class="form-row">
      <div class="input-data">
        <input type="text" name="firstName">
        <div class="underline"></div>
        <label for="">First Name</label>
      </div>
      <div class="input-data">
        <input type="text" name="lastName">
        <div class="underline"></div>
        <label for="">Last Name</label>
      </div>
    </div>
    <div class="form-row">
      <div class="input-data">
        <input type="text" name="email">
        <div class="underline"></div>
        <label for="">Email </label>
      </div>
      <div class="input-data">
        <input type="text" name="phone">
        <div class="underline"></div>
        <label for="">Phone</label>
      </div>
    </div>
    <div class="form-row">
      <div class="input-data textarea">
        <textarea rows="8" cols="80" name="address"></textarea>
        <br />
        <div class="underline"></div>
        <label for="">Address</label>
        <br />
      </div>
    </div>
    <div class="form-row submit-btn">
      <div class="input-data">
        <div class="inner"></div>
        <input type="submit" value="add" name="create">
      </div>
      <div class="input-data">
        <div class="inner"></div>
        <a href="index">
          <input type="button" value="Exit" name="show">
        </a>
      </div>
    </div>
  </form>
</div>

<script>
  setTimeout(function() {
    var errorMessage = document.getElementById('err_message');
    var errorPhone = document.getElementById('err_phone');
    if (errorMessage) {
      errorMessage.style.display = 'block';
      setTimeout(function() {
        errorMessage.style.display = 'none';
      }, 2000);
    } else if (errorPhone) {
      errorPhone.style.display = 'block';
      setTimeout(function() {
        errorPhone.style.display = 'none';
      }, 2000);
    q}
  }, 0);
</script>