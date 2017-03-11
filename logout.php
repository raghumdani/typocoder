<?php
session_start();
$user_name = "";
if(isset($_SESSION["logged_in_user_name"])) {
	$user_name = $_SESSION["logged_in_user_name"];
}

unset($_SESSION["logged_in_user_name"]);
unset($_SESSION["logged_in_password"]);

setcookie("typocoder_user_name", "", time() - 100);
setcookie("typocoder_password", "", time() - 100);

//$conn = mysqli_connect("localhost", "root", "", "typocoder");
include("Util/Connect_db.php");
if($conn) {
	$sql = "SELECT max(login_id) FROM logins WHERE user_name = '$user_name';";
	$result = mysqli_query($conn, $sql);
	if($result) {
		$row = mysqli_fetch_array($result);
		$login_id = $row[0];
		settype($login_id, "integer");
		$sql = "UPDATE logins SET logout_time = CURRENT_TIMESTAMP WHERE login_id = $login_id;";
		$result = mysqli_query($conn, $sql);
	}
}

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
header("Location: login.html");
?>