
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

<h1>FORM</h1>
<h2><?php if(isset($message)){echo $message;} ?></h2>

<form method="post" enctype="multipart/form-data" action="<?php echo base_url('index.php/new_control/insert'); ?>">	
	
name <input type="text" name="name"  ><?php echo form_error('name'); ?>
<br><br>

email<input type="email" name="email"   ><?php echo form_error('email'); ?>
<br><br>


Designation<input type="text" id="designation" name="designation"  ><?php echo form_error('designation'); ?>
<br><br>

Salary<input type="number" name="salary" step="any" ><?php echo form_error('salary'); ?>
<br><br>

Date<input type="date" name="date" ><?php echo form_error('date'); ?>
<br><br>


<?php echo $captchaImg; ?>
<br><br>

Captcha<br>
<input type="text" name="captcha" required><?php echo form_error('captcha'); ?>

<br><br>

<input type="submit" name="sumbit" value="submit">


</form>
<a href="<?php echo base_url('index.php/new_control/select_data'); ?>"><button>showall</button></a>


<br>

<h1> SELECTED DATA</h1>


 <table  style="width:100%">
 
 <tr>
 <th>id</th>
 <th>name</th>
 <th>email</th>
 <th>designation</th>
 <th>salary</th>
 <th>date</th>
 <th>action</th>
 <th>action</th>
 </tr>
 
   
 <?php
 if(isset($res)){
foreach($res as $value)
          {

?>


  <tr>
            <td><?php echo $value->id; ?> </td>
            <td><?php echo $value->name; ?> </td>
            <td><?php echo $value->email; ?> </td>
            <td><?php echo $value->designation; ?> </td>
            <td><?php echo $value->salary; ?> </td>
            <td><?php echo $value->date; ?> </td>
            <td><a href="<?php echo base_url();?>/index.php/new_control/getbyid?id=<?php echo $value->id; ?>" >update</a></td>
            <td><a href="<?php echo base_url();?>/index.php/new_control/delete?id=<?php echo $value->id; ?>" >delete</a></td>
</tr>

<?php
 }}
?>     
     
   
</table> 




</body>

</html>