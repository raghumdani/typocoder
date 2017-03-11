<?php
function display_user_name ($user, $tagb = "<b>", $tage = "</b>", $tag1b = "<b style = 'color: green;'>"
						        , $tag1e = "</b>", $tag2b = "<b style = 'color: red;'>", $tag2e = "</b>") {
	//$conn = mysqli_connect("localhost", "root", "", "typocoder");
	include("Connect_db.php");
	if(!$conn) {
		return $tagb.$user.$tage;
	}
	$sql = "SELECT COUNT(*) FROM admins WHERE user_name = '$user';";
	$result = mysqli_query($conn, $sql);
	if(!$result) {
		mysqli_close($conn);
		return $tag2b.$user.$tag2e;
	} 
	$row = mysqli_fetch_array($result);
	$cnt = $row[0];
	settype($cnt, "integer");
	if($cnt > 0) {
		mysqli_close($conn);
		return $tagb.$user.$tage;
	}
	// not an admin
	if($conn) {
		$sql = "SELECT max(login_id) FROM logins WHERE user_name = '$user';";
		$result = mysqli_query($conn, $sql);
		if($result) {
			$row = mysqli_fetch_array($result);
			$login_id = $row[0];
			settype($login_id, "integer");
			$sql = "SELECT COUNT(*) FROM logins WHERE login_id = $login_id and login_time = logout_time;";
			$result = mysqli_query($conn, $sql);
			if(!$result) {
				mysqli_close($conn);
				return $tag2b.$user.$tag2e;
			}
			$row = mysqli_fetch_array($result);
			$cnt = $row[0];
			settype($cnt, "integer");
			if($cnt > 0) {
				mysqli_close($conn);
				return $tag1b.$user.$tag1e;
			} else {
				mysqli_close($conn);
				return $tag2b.$user.$tag2e;
			}
		} else {
			mysqli_close($conn);
			return $tag2b.$user.$tag2e;
		}
	} else {
		mysqli_close($conn);
		return $tag2b.$user.$tag2e;
	}
	mysqli_close($conn);
}

function admin($str) {
	//$conn = mysqli_connect("localhost", "root", "", "typocoder");
	include("Connect_db.php");
	if(!$conn) {
		return $tagb.$user.$tage;
	}
	$sql = "SELECT COUNT(*) FROM admins WHERE user_name = '$str';";
	$result = mysqli_query($conn, $sql);
	if(!$result) {
		mysqli_close($conn);
		return $tag2b.$user.$tag2e;
	} 
	$row = mysqli_fetch_array($result);
	$cnt = $row[0];
	settype($cnt, "integer");
	if($cnt > 0) {
		mysqli_close($conn);
	    return true;
	}
	mysqli_close($conn);
	return false;
}
?>