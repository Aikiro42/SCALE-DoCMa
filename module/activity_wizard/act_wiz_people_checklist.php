
<?php

include('../../config.php');
session_start();

$search = ',';

if(isset($_POST)){
	$search = $_POST['search'];
}



$query = "SELECT * From Persons WHERE Persons.user_id != " . $_SESSION['user_id'] . ' ORDER BY lastName';
$result = mysqli_query($dbc, $query);
$name = $user_id = '';


while($row = mysqli_fetch_array($result)){
	
	$name = $row['lastName'] . ', ' . $row['firstName'];
	$user_id = $row['user_id'];
	
	if(strpos(strtolower($name), strtolower($search)) !== false){
		
		
		echo '
		<label class="custom_checkbox_container">'.$name.'
			<input type="checkbox" class="person_checkbox" value="'.$user_id.'" />
			<span class="custom_checkbox"></span>
		</label>
		';
		
	}
	
}

?>