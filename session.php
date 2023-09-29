<?php 
// this code is for the purpose of not having internet or being AFK in a long while.
// It saves the old data from the session and then create a new data from the new session
session_start();
include 'dbcon.php';

if(isset($_SESSION['destroyed']) && $_SESSION['destroyed'] < time() - 300) {

	remove_all_authentication_flag_from_active_sessions($_SESSION['user_id']);
	throw(new DestroyedSessionAccessException);
}

$old_sessionid = session_id();

$_SESSION['destroyed'] = time(); // session_regenerate_id() saves old session data

// Simply calling session_regenerate_id() may result in lost session, etc.
// See next example.
session_regenerate_id();

// New session does not need destroyed timestamp
unset($_SESSION['destroyed']);

$new_sessionid = session_id();

echo "Old Session: $old_sessionid<br />";
echo "New Session: $new_sessionid<br />";

print_r($_SESSION);
?>