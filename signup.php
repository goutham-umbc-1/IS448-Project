<?php 
    $username = mysql_real_escape_string($_POST['username']); 
    $password = mysql_real_escape_string($_POST['password']);
    $confirmPassword = $_POST['confirmPassword'];
    if($_POST['password'] !== $_POST['confirmPassword']){
        echo "Passwords do not match";
    } else {
        $db = mysql_connect("studentdb-maria.gl.umbc.edu", "goutham1", "goutham1");
	    if(!$db){
		  exit("Error could not connect to mySQL");
		}
	    $er = mysql_select_db("goutham1");
	    if(!$er){
		  exit("Error could not select database");
		} 
        $numUsers = mysql_num_rows(mysql_query("SELECT * FROM users"));
	    $userID = $numUsers + 1;
	    mysql_query("INSERT INTO users(userID, username, password)
							VALUES('$userID', '$username', '$password')");
        header('Location: Homepage.html');
}
?>
    