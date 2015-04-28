<?php
/*
*	Project: Custom Account System
*
* 	Author: AssaultCommand (Caspar Neervoort)
*	Twitter: http://www.twitter.com/__Caspar__ 
*	Email: caspar.neervoort@gmail.com
*
*	This work is copyrighted but may be used if you ask the creator beforehand.
*	You may not modify this work or use this without asking the creator or showing explicit credit to the creator.
*/

/* --- Error Handling --- */

	ini_set("error_prepend_string", '<section class="notification error"><p><b>PHP ERROR:</b>');
	ini_set("error_append_string", '<br />Please report this error to the site administrator!</p></section>');


/* --- Session Handling Functions --- */

	function SessionCheck()
	{
		if(!isset($_SESSION['logged']))
		{
			ClearSession();
			$_SESSION['logged'] = 'false';
		}
	}
	
	function ClearState()
	{
		$_SESSION['state'] = '';
		$_SESSION['status'] = '';
	}
	
	function ClearSession()
	{
		session_destroy();
		session_start();
	}
	
	function LoggedIn()
	{
		if($_SESSION['logged'] == 'true')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function LoggedInCheck()
	{
		if(!LoggedIn())
		{
			echo '	<header class="pagetop">
				</header>
				
				<section class="container">
					<div class="logocontainer">
						<img class="logo" src="images/static/logo+text+shadow.png" />
						<!--<h1 class="title">Armor Watcher</h1>
						<h2 class="tagline">Armor, Emblems & Gamercards</h2>-->
					</div>
					<h3 class="pagetitle">You are not logged in.</h3>
					<p class="contenttext">You need to be logged in to access this page.</p>
				</section>';
			include '/home/armorwat/public_html/resources/parts/footer.php';
			exit();
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function PermissionCheck($ranks)
	{
		Connect();
		$uid = mysqli_real_escape_string($GLOBALS['connection'], $_SESSION['uid']);
		$sql = 'SELECT * FROM users WHERE uid = "'.$uid.'"';
		$result = mysqli_query($GLOBALS['connection'], $sql);
		$db_field = mysqli_fetch_assoc($result);
		
		if(in_array($db_field['rank'], $ranks))
		{
			return true;
		}
		else
		{
			return false;
		}
		Disconnect();
	}

/* --- Miscellaneous Functions --- */

	function passwordNew($password, $cost=10)
	{
	        $salt = substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
	        $salt = str_replace("+",".",$salt);
	        $param = '$'.implode('$',array("2y", str_pad($cost,2,"0",STR_PAD_LEFT), $salt));
	        return crypt($password,$param);
	}
	
	function passwordValidate($password, $hash)
	{
	        return crypt($password, $hash) == $hash;
	}
	
	function charLimit($string, $limit) 
	{
		return substr($string, 0, $limit) . (strlen($string) > $limit ? "..." : '');
	}
	
	
	/* -- Date & Time -- */
	
	function getAge($dob) 
	{
		list($y,$m,$d) = explode('-', $dob);
		
		if (($m = (date('m') - $m)) < 0) 
		{
			$y++;
		} 
		else if ($m == 0 && date('d') - $d < 0) 
		{
			$y++;
		}
		
		return date('Y') - $y;
	}
	
	
/* --- Database Functions --- */

	function Connect()
	{
		$GLOBALS['connection'] = mysqli_connect("localhost", "delta_website", "admin", "delta_website");
		if (mysqli_connect_errno($GLOBALS['connection']))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		} 
		else
		{
			return true;
		}
	}
	
	function Disconnect()
	{
		@mysqli_close($GLOBALS['connection']);
	}
	
	
/* --- User Data Functions --- */
	
	function Username($uid)
	{
		Connect();
		$uid = mysqli_real_escape_string($GLOBALS['connection'], $uid);
		$sql = 'SELECT * FROM users WHERE uid = "'.$uid.'"';
		$result = mysqli_query($GLOBALS['connection'], $sql);
		$db_field = mysqli_fetch_assoc($result);
		return $db_field['username'];
		Disconnect();
	}
	
	function Avatar($uid, $size, $classes)
	{
		Connect();
		$uid = mysqli_real_escape_string($GLOBALS['connection'], $uid);
		$sql = 'SELECT * FROM users WHERE uid = "'.$uid.'"';
		$result = mysqli_query($GLOBALS['connection'], $sql);
		$db_field = mysqli_fetch_assoc($result);
		
		$hash = md5( strtolower(trim($db_field['email'])));
		return '<img class="' . $classes . '" src="http://www.gravatar.com/avatar/' . $hash . '?d=http%3A%2F%2Farmorwatcher.com%2Fimages%2Favatar%2Fdefaultavatar.png&s=' . $size . '" width="' . $size . '" height="' . $size . '" />';
		/*return '<img class="' . $classes . '" src="images/avatar/'.$uid.'.png" width="'.$size.'" height="'.$size.'" />';*/
		Disconnect();
	}
	
	function AvatarURL($uid, $size)
	{
		Connect();
		$uid = mysqli_real_escape_string($GLOBALS['connection'], $uid);
		$sql = 'SELECT * FROM users WHERE uid = "'.$uid.'"';
		$result = mysqli_query($GLOBALS['connection'], $sql);
		$db_field = mysqli_fetch_assoc($result);
		
		$hash = md5( strtolower(trim($db_field['email'])));
		return 'http://www.gravatar.com/avatar/' . $hash . '?d=http%3A%2F%2Farmorwatcher.com%2Fimages%2Favatar%2Fdefaultavatar.png&s=' . $size;
		/*return '<img class="' . $classes . '" src="images/avatar/'.$uid.'.png" width="'.$size.'" height="'.$size.'" />';*/
		Disconnect();
	}
	
	
/* --- Control Panel Functions --- */

	function PostArticle($title, $cover, $coverpos, $tags, $display, $article)
	{
		$title = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($title));
		$cover = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($cover));
		$coverpos = mysqli_real_escape_string($GLOBALS['connection'],  htmlspecialchars($coverpos));
		$tags = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($tags));
		$display = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($display));
		$article = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($article));
		$uid = mysqli_real_escape_string ($GLOBALS['connection'], $_SESSION['uid']);
		
		$sql = "INSERT INTO articles (title, uid, cover, coverpos, article, tags, state) VALUES ('".$title."', '".$uid."', '".$cover."', '".$coverpos."', '".$article."', '".$tags."', '".$display."')";
					
		if (!mysqli_query($GLOBALS['connection'], $sql))
		{
			$_SESSION['state'] = 'error';
			$_SESSION['status'] = '<b>Submission failed:</b> Database Error, please contact an admin.';
		}
		else
		{
			$_SESSION['state'] = 'success';
			$_SESSION['status'] = '<b>Submission succesful:</b> Your article was posted succesfully! You can find it below in the articles list.';
		}
	}
	
	function EditArticle($index, $title, $cover, $coverpos, $tags, $display, $article)
	{
		$index = mysqli_real_escape_string ($GLOBALS['connection'], $index);
		$title = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($title));
		$cover = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($cover));
		$coverpos = mysqli_real_escape_string($GLOBALS['connection'],  htmlspecialchars($coverpos));
		$tags = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($tags));
		$display = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($display));
		$article = mysqli_real_escape_string($GLOBALS['connection'], htmlspecialchars($article));
		$uid = mysqli_real_escape_string ($GLOBALS['connection'], $_SESSION['uid']);
		
		$sql = "UPDATE articles SET title = '".$title."', cover = '".$cover."', coverpos = '".$coverpos."', article = '".$article."', tags = '".$tags."', state = '".$display."' WHERE aid = " . $index;
					
		if (!mysqli_query($GLOBALS['connection'], $sql))
		{
			$_SESSION['state'] = 'error';
			$_SESSION['status'] = '<b>Submission failed:</b> Database Error, please contact an admin. ' . $index;
		}
		else
		{
			$_SESSION['state'] = 'success';
			$_SESSION['status'] = '<b>Submission succesful:</b> Your article was posted succesfully! You can find it below in the articles list.';
		}
	}
	
	function DeleteArticle()
	{
		if(ctype_digit($_POST['article']))
		{
			$sql = "DELETE FROM articles WHERE aid = ".$_POST['article'];
			if (!mysqli_query($GLOBALS['connection'], $sql))
			{
				$_SESSION['state'] = 'error';
				$_SESSION['status'] = '<b>Deletion failed:</b> Database Error, please contact an admin.';
			}
			else
			{
				$_SESSION['state'] = 'success';
				$_SESSION['status'] = '<b>Deletion succesful:</b> You deleted the article.';
			}
		}
	}

	
/* --- Action Switch --- */

	switch($_POST['formpost'])
	{
		case 'login':
			Connect();
			Login($_POST['user'], $_POST['pass']);
			Disconnect();
			break;
		case 'logout':
			Logout();
			break;
		case 'register':
			Connect();
			Register($_POST['username'], $_POST['password'], $_POST['passwordconfirm'], $_POST['email'], $_POST['securitya'], $_POST['securityq']);
			Disconnect();
			break;
		case 'recoveraccount':
			Connect();
			RecoverAccount($_POST['email'], $_POST['securityq'], $_POST['securitya']);
			Disconnect();
			break;
		case 'recoverpassword':
			Connect();
			RecoverPassword($_POST['newpassword'], $_POST['newpasswordconfirm'], $_POST['uid']);
			Disconnect();
			break;
		case 'changepassword':
			Connect();
			ChangePassword($_POST['newpassword'], $_POST['newpasswordconfirm'], $_POST['oldpassword']);
			Disconnect();
			break;
		case 'changeemail':
			Connect();
			ChangeEmail($_POST['newemail'], $_POST['newemailconfirm'], $_POST['passwordemail']);
			Disconnect();
			break;
		case 'changegamertag':
			Connect();
			ChangeGamertag($_POST['gamertag']);
			Disconnect();
			break;
		case 'changeabout':
			Connect();
			ChangeAbout($_POST['about'], $_POST['location'], $_POST['gender'], $_POST['birthday'], $_POST['birthdaydisplay']);
			Disconnect();
			break;
		case 'changecover':
			Connect();
			ChangeCover($_POST['cover']);
			Disconnect();
			break;
		case 'seth4gamercard':
			Connect();
			SetH4Gamercard($_POST['updaterate'], $_POST['size'], $_POST['background'], $_POST['pose']);
			Disconnect();
			break;
		case 'postarticle':
			Connect();
			PostArticle($_POST['title'], $_POST['cover'], $_POST['coverpos'], $_POST['tags'], $_POST['display'], $_POST['article']);
			Disconnect();
			break;
		case 'editarticle':
			Connect();
			EditArticle($_POST['index'], $_POST['title'], $_POST['cover'], $_POST['coverpos'], $_POST['tags'], $_POST['display'], $_POST['article']);
			Disconnect();
			break;
		case 'deletearticle':
			Connect();
			DeleteArticle();
			Disconnect();
			break;
		default:
			ClearState();
	}
?>