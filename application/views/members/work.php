<?php //if($this->session->userdata('privilege')!='1' || $this->session->userdata('privilege')!=1)
//$this->load->file('includes/functions.php');
?>
<head>
<?php include('includes/head.php');?>
</head>
<body class="container">
   <?php $this->load->view('templates/header');?>

<h3>List of all works assigned till date</h3>
<?php
$username = $this->session->userdata('username');
$query = $this->db->get_where('users',array('username'=>$username));
if($query->num_rows()>0){
   $row = $query->row_array();
}
$query = $this->db->get_where('work', array('toname' => $row['name']));
if ($query->num_rows() > 0)
{
	echo form_open('member/work');
	echo '<table class="table table-striped table-bordered table-hover">';
   foreach ($query->result() as $row)

   {
   		echo '<tr>';
     echo '<td><input type="radio" name="work" value='.$row->id.'></td>';
   	  
      echo '<td>'.$row->table.'</td>';
      echo '<td>'.$row->fromid.'</td>';
      echo '<td>'.$row->toid.'</td>';
      echo '</tr>';
    
   }
 
?>
</table>
<input type="submit" value="Select this work" name="submit">
</form><?php }else{
   echo 'No work has been alloted to you.<br>';
}
$this->load->view('templates/footer');?>
</body>