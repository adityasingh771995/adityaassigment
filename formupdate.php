

<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
	
</head>
<body>

<h1>UDDATE FORM</h1>
<h2><?php if(isset($message)){echo $message;} ?></h2>

<form method="post" enctype="multipart/form-data" action="<?php echo base_url('index.php/new_control/update_data'); ?>">	
	
name <input type="text" name="name" value="<?php echo $result[0]->name; ?>"  ><?php echo form_error('name'); ?>

<br><br>

email<input type="email" name="email" value="<?php echo $result[0]->email; ?>"  ><?php echo form_error('email'); ?>

<br><br>


Designation<input type="text" id="designation" name="designation" value="<?php echo $result[0]->designation; ?>"  ><?php echo form_error('designation'); ?>

<br><br>

Salary<input type="number" name="salary" step="any" value="<?php echo $result[0]->salary; ?>" ><?php echo form_error('salary'); ?>

<br><br>

Date<input type="date" name="date" value="<?php echo $result[0]->date; ?>" ><?php echo form_error('date'); ?>

<br><br>
<input type="hidden" name="id" value="<?php echo $result[0]->id; ?>">

<?php echo $captchaImg; ?>
<br><br>

Captcha<br>
<input type="text" name="captcha" required><?php echo form_error('captcha'); ?>

<br><br>

<input type="submit" name="update" value="update">


</form>
<a href="<?php echo base_url('index.php/new_control/select_data'); ?>"><button>showall</button></a>






</body>

</html>