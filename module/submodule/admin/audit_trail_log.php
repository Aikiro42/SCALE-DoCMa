
<?php
	
	include('../../../config.php');
	session_save_path('../../../tmp');
	session_start();
	
	$query = 'SELECT * FROM AuditTrailLog';
	$result = mysqli_query($dbc, $query);
	$are_there_entries = false;
	while($row = mysqli_fetch_array($result)){
		$are_there_entries = true;
		$entry_id = $row['entry_id'];
		$timestamp = date('m/d/Y h:i:s a', $entry_id);
		$entry_info = $row['entry_info'];
		
		echo '
		
		<div class="log_entry">
			<p>
				<span class="timestamp">['.$timestamp.']</span>
				::
				<span class="entry_info">'.$entry_info.'</span>
			</p>
		</div>
		
		
		';
		
	}
	
	if(!$are_there_entries){
		echo '
		
			<h2 id="no_entry_warning">There are no recent changes to the database.</h2>
		
		';
	}

?>