<link rel="stylesheet" href="../../public/css/globalStyles.css">
<link rel="stylesheet" href="../../public/css/edit.css">

<div class="container">
  <form action="update" method="POST">
    <input type="hidden" name="id" value="<?php echo $detail['id'] ?>">
    <div class="content">
      <h2>Edit Form</h2>
      <div class="form-input">
        <label for="">first name</label>
        <input type="text" placeholder="Please enter first name" name="firstName" value="<?php echo $detail['first_name'] ?>" />
      </div>
      <div class="form-input">
        <label for="">last name</label>
        <input type="text" placeholder="Please enter last name" name="lastName" value="<?php echo $detail['last_name'] ?>" />
      </div>
      <div class="form-input">
        <label for="">email</label>
        <input type="text" placeholder="Please enter email" name="email" value="<?php echo $detail['email'] ?>" />
      </div>
      <div class="form-input">
        <label for="">phone</label>
        <input type="text" placeholder="Please enter phone" name="phone" value="<?php echo $detail['phone'] ?>" />
      </div>
      <div class="form-input">
        <label for="">address</label>
        <textarea name="address" cols="30" rows="10" placeholder="Please enter address"><?php echo $detail['address'] ?></textarea>
      </div>
      <div class="form-button">
        <button type="submit" name="saveData">Save</button>
        <button>Exit</button></a>
      </div>
    </div>
  </form>
</div>