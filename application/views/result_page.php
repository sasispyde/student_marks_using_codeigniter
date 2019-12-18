
<html>
	  <title>Result Page</title>

	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="		sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<body>

		<h1><center>Student Name : <?php echo $student_name[0]['student_name']; ?></center></h1>
		<h2><center>Total Marks : <?php echo $total_mark; ?> / 500</center></h2>
		<h2><center>Average : <?php echo $average; ?> / 100</center></h2>

		<table class="table table-striped table-dark table-bordered">
			<thead>
			    <tr>
				     <th >Subject</th>
				     <th >Marks</th>
				     <th >Grade</th>
			   </tr>
			</thead>
			<tbody>
				 <?php foreach ($marks[0] as $key => $value){ ?>
				  <tr>
				    <td>
				     <?php 

				     	echo ucfirst($key);

				     ?>
				    </td>
				    <td><?php echo $value ?></td>
				    <td>

				      <?php 
				      if($value<$minimum_pass_mark)
				      {
				      echo "FAIL";
				      }
				      else
				      {
				      echo "PASS";
				      }
				      ?>

				    </td>

				   </tr>
					  <?php } ?>
			 </tbody>
			</table>
		</body>
</html>