<?php
	include('session.php');
	include('ChromePhp.php');

	ChromePhp::log("Broadcasting from scale/main.php");

	$query = "SELECT ual_id FROM Users WHERE user_id = " . $_SESSION['user_id'];
	$result = mysqli_query($dbc, $query);
	$ual_id = mysqli_fetch_array($result)['ual_id'];

	$query = "SELECT name FROM UserAccessLevels WHERE ual_id = " . $ual_id;
	$result = mysqli_query($dbc, $query);
	$ual_name = mysqli_fetch_array($result)['name'];

	ChromePhp::log('Retrieved ual_id: ' . $ual_id);

	$_SESSION['ual_id'] = $ual_id;
	$_SESSION['ual_name'] = $ual_name;

	ChromePhp::log('Session ual_id: ' . $_SESSION['ual_id']);

	ChromePhp::log('Broadcast end.');

	function trail_log($info){
		$entry_info = $info;
		$entry_id = time();

		//insert into table
		$query = 'INSERT INTO AuditTrailLog VALUES ('.$entry_id.', "'.$entry_info.'")';
		mysqli_query($dbc, $query);
		ChromePhp::log('['.$entry_id.'] :: ' . $entry_info);
	}

?>
<html>
	<head>

		<title>SCALE Docma</title>


		<link href="css/var.css" rel="stylesheet" type="text/css" />

		<!--Main CSS-->
		<link href="css/main.css" rel="stylesheet" type="text/css" />
		<link href="css/main_page.css" rel="stylesheet" type="text/css" />
		<link href="css/module.css" rel="stylesheet" type="text/css" />

		<!--Module CSS-->
		<link href="module/css/download.css" rel="stylesheet" type="text/css" />
		<link href="module/css/profile.css" rel="stylesheet" type="text/css" />
		<link href="module/css/administrative.css" rel="stylesheet" type="text/css" />
		<link href="module/css/people.css" rel="stylesheet" type="text/css" />
		<link href="module/css/activities.css" rel="stylesheet" type="text/css" />

		<!--Special CSS-->
		<link href="module/activity_wizard/act_wiz.css" rel="stylesheet" type="text/css" />
		<link href="css/radio_check_css.css" rel="stylesheet" type="text/css" />
		<link href="css/scrollbar.css" rel="stylesheet" type="text/css" />

		<!--Administrative Form CSS-->
		<link href="module/css/submodule/admin/add_user.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/admin/edit_user.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/admin/form_list.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/admin/delete_activity.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/admin/audit_trail_log.css" rel="stylesheet" type="text/css" />

		<!--Sub-module CSS-->
		<link href="module/css/submodule/activity_management.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/activity_information.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/activity_progress_checklist.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/version_list_container.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/submit_version_file_container.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/pending_actions.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/assoc_activities.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/activity_people.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/activity_people_list.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/assigned_people_list.css" rel="stylesheet" type="text/css" />
		<link href="module/css/submodule/profile_information.css" rel="stylesheet" type="text/css" />

		<!--Javascript Variables-->
		<script>
			var post_user_id = <?php echo $_SESSION['user_id']?>
		</script>

		<!--jQuery-->
		<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</head>
	<body>

	<!--===[Miscellaneous Stuff]==========================-->
	<div id="activity_wizard">
		<div id="act_wiz_container">
			<div id="close_popup">X</div>
			<div id="act_wiz_wrapper">
			</div>
		</div>
	</div>
	<div id="debug_block"></div>
	<div id="anti_interaction_wall">
		<h1>Loading...</h1>
	</div>
	<!--==================================================-->

	<div id="wrapper">
	<div id="flex-wrapper">
		<ul id="navpane">
			<li id="profile_administrator">My Profile</li>
			<li id="download">Downloadable Forms</li>
			<?php
				if($ual_id == 1){
					echo '

						<li id="administrative">Administrative</li>

					';
				}
			?>
			<li id="people">People</li>
			<li id="activities">Activities</li>
			<li id="about">About</li>
		</ul>

		<div id="header-body-container">

			<header>
				<img id="burger-button" src="img/burger-button-white.png"/>
				<h1>SCALE DoCMa</h1>
			</header>

			<div id="moduleContainer">
				<!--contains the modules loaded by jquery-->
			</div>

		</div>
	</div>


	</div>
	<script>

	function remind_me(){
		alert('Todo:'
			+'\n Bugfixing'
			+'\n [!] CRUD Functions'
			+'\n [!] People'
			+'\n [!] Interface Updates (if action is undertaken e.g. approval, submission)'
			+'\n [!] Function Limitations'
			+'\n [!] Cross-User Interaction'

			+'\n Downloadable Forms Bug'
			+'\n edit user'
			+'\n Form-Activity Approval System'
			+'\n Form Samples'

			+'\n UI - dont curve the border corneres too much'

			+'\n\n Optional:'

			+'\n About tab'
			+'\n Privacy Policy'
			+'\n Audit Trail Log'
			+'\n Remove custom user id, default autogen id'

			+'\n "FPDF" autofill api'
			+'\n Fix Animations'
			+'\n Rewrite Code'
			+'\n Compatibility'
			+'\n Profile Customization'
			+'\n Night Mode'
			+'\n Social Network Links'

			//20190121
			+'\n admin are informed when activity is proposd'
			+'\n PHYSICAL make flowchart'
		);
	}

	/*
	Give adviser permission to access progress checklist
	
	lagay sa scope and limitations na may seckyu issues sa site
	
	vulnerable to xss

	Login UI

	footer - copyright, identity if programmer
	portal must define the system
	possibly widgets?

	Quick & Dirty - hide leadership if member
	In-depth - validate leadership achievement

	Disclaimer: The Docma is for the collection of forms and for visual interface that will help people involved in the SCALE
	program manage their activities and achievements.
	
	
	
	
	MySQL: Encrypt passwords

	*/

	</script>
	</body>
</html>
