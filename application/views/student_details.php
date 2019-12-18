<!DOCTYPE html>
<html>
<head>

  <title>Task3</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style type="text/css">

  p
  {
    color: red;
  }


  </style>

</head>
    <body style="text-align: center;margin-top: 50px;">
      	<form method="post">

      		<label>Student Name :<input id="name" class="form-control" type="text" value="<?php echo set_value('name');?>" name="name" maxlength="50"></label>
          <?php echo form_error('name');  ?>
      		<br><br>
      		<label>Phone Number :<input type="text" value="<?php echo set_value('phone_number');?>" class="form-control" name="phone_number"  id="phone_number" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="10"></label>
          <?php echo form_error('phone_number');  ?>
      		<br><br>
      		<label>Reg Number :<input type="text" class="form-control" value="<?php echo set_value('reg_number');?>" name="reg_number"  id="reg_number"onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="6"></label>
          <?php echo form_error('reg_number');  ?>
      		<br><br>
      		<label>Address :<textarea type="text" value="<?php echo set_value('address');?>" maxlength="250" name="address" class="form-control"  id="address" maxlength="250"></textarea></label>
          <?php echo form_error('address');  ?>
      		<br><br>
      		<input type="submit" class="btn btn-default">

      	</form>
    </body>
</html>