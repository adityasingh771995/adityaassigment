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
<body >
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
