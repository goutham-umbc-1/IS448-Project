<?php 
    $username = mysql_real_escape_string($_POST['username']); 
    $password = mysql_real_escape_string($_POST['password']);
    
     $db = mysql_connect("studentdb-maria.gl.umbc.edu", "goutham1", "goutham1");
	    if(!$db){
		  exit("Error could not connect to mySQL");
		}
	    $er = mysql_select_db("goutham1");
	    if(!$er){
		  exit("Error could not select database");
		} 
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $result = mysql_query($query);
    $numrows = mysql_num_rows($result);
    if($numrows == 1) {
        echo 'Welcome';
   } else {
    echo 'Invalid username or password';
   }
    header('Location: Homepage.html');
?>