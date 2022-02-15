<?php
include 'database.php';

template_header('homepagina');

if(isset($_GET['logout']) && $_GET['logout'] == "true"){
    // $_SESSION['user'] = null;
    session_destroy();
    header("location: index.php");
} 


    ini_set('display_errors', 1); // 0 = uit, 1 = aan
    error_reporting(E_ALL);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset($_POST['username']) && trim($_POST['username']) != '' &&
            isset($_POST['password']) && trim($_POST['password']) != '')
        {
            try
            {
                
                //ophalen gebruikersinformatie, testen of wachtwoord en gebruikersnaam overeenkomen
                $checkUsers =
                    "SELECT
                        id, rid, password
                    FROM
                        users
                    WHERE
                        username = :username
                    AND
                        password = :password";
                $userStmt = $database->prepare($checkUsers);
                $userStmt->execute(array(
                                    ':username' => $_POST['username'],
                                    ':password' => $_POST['password']
                                    ));
                $user = $userStmt->fetchAll();
                
               
                
                if (count($user) == 1)
                {
                    $_SESSION['user'] = $user[0]['id'];
                    $_SESSION['role'] = $user[0]['rid'];
                    // $_SESSION['user'] = array('user_id' => $user[0]['id']);
                    // $_SESSION['role'] = array('role' => $user[0]['rid']);
                    //pagina waar naartoe nadat er succesvol is ingelogd
                    header('Location: dashboard.php');
                    die;
                }

                    else
                    {
                        $message = 'invalid username/password. Please try again';
                    
                }
            }
            catch (PDOException $e)
            {
                $message = $e->getMessage();
            }
            $database = NULL;
        }
        else
        {
            $message = 'please fill in all required information';
        }
    }
?>    
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>login</title>
    </head>
    
    <body>
        <?php
            if (isset($message))
            {
                echo $message;
            }
        ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>