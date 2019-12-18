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
      <form method="post" >
        <select style="color: black;" id="user" name="user">

            <option value="">Select the name</option>
        <?php foreach ($results as $key => $value) { ?>
            <option value="<?php echo $value["id"]; ?>" ><?php echo $value["student_name"] ?></option>
       <?php } ?>

        </select>
        <?php echo form_error('user');  ?>
        <br><br>

        <label>Tamil :<input type="text" class="form-control" name="tamil" id="tamil"  value="<?php echo set_value('tamil');?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" ></label>
        <?php echo form_error('tamil');  ?>
        <br><br>

        <label>English :<input type="text" class="form-control"  value="<?php echo set_value('english');?>" id="english" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="english" max="3"></label>
        <?php echo form_error('english');  ?>
        <br><br>

        <label>Maths :<input type="text" class="form-control" value="<?php echo set_value('maths');?>" id="maths" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="maths" max="3"></label>    
        <?php echo form_error('maths');  ?> 
        <br><br>

        <label>Science :<input type="text" class="form-control"  value="<?php echo set_value('science');?>" id="science" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="science" max="3"></label>
        <?php echo form_error('science');  ?>
        <br><br>

        <label>Social Science :<input type="text" class="form-control"  value="<?php echo set_value('social_science');?>" id="sscience" onkeypress="return event.charCode >= 48 && event.charCode <= 57  " maxlength="3" name="social_science" max="3"></label>
        <?php echo form_error('social_science');  ?>
        <br><br>
        <input type="submit" class="btn btn-default">

    </form>
</body>
</html>