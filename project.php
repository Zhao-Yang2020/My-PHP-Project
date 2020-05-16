<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME,"3308");
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
                <h1>Zhao Yang's PHP Website</h1>
                <a href="home.php"><i class="fas fa-home"></i>Home</a>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="home.php"><i class="fas fa-project-diagram"></i>Projects</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>


            <!-- Creat a table to show my projects, looks more organized. -->
            <style>
            table, td, th {  
            border: 1px solid #ddd;
            text-align: left;
            }

            table {
            border-collapse: collapse;
            width: 100%;
            }

            th, td {
            padding: 15px;
            }
            </style>


            <!-- Table start -->
            <h2>Hi! Welcome to my Project Page</h2>
            <p>These are the project that I made from my 1st year of University to the end of University Career.</p>

            <table>
            <tr>
                <th>Preview</th>
                <th>Web Domain</th>
                <th>Working(Yes/No)</th>
            </tr>
            <tr>
                <td class="center"><img src="image\lcbakery.png" alt="lcbakery" style="width:250px;height:128px;"></td>
                <td><a href="www.lcnlbakery.ca">www.lcnlbakery.ca</a></td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="center"><img src="image\nlcc.png" alt="nlcc" style="width:250px;height:128px;"></td>
                <td><a href="www.nlccgroup.ca">www.nlccgroup.ca</a></td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="center"><img src="image\dragon88.png" alt="dragon88" style="width:250px;height:128px;"></td>
                <td><a href="www.dragon88.ca">www.dragon88.ca</a></td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="center"><img src="image\citylight.png" alt="citylight" style="width:250px;height:128px;"></td>
                <td><a href="www.citylightbuffet.com">www.citylightbuffet.com</a></td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="center"><img src="image\heardgi.png" alt="heardgi" style="width:250px;height:128px;"></td>
                <td><a href="www.heardgi.com">www.heardgi.com</a></td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="center"><img src="image\gardermoen.png" alt="gardermoen" style="width:250px;height:128px;"></td>
                <td><a href="www.gardermoen.com">www.gardermoen.com</a></td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="center"><img src="image\chnmed.png" alt="chnmed" style="width:250px;height:128px;"></td>
                <td><a href="www.chnmed.ca">www.chnmed.ca</a></td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="center"><img src="image\university.png" alt="university" style="width:250px;height:128px;"></td>
                <td><a href="home.php">www.universitydemo.heardgi.com</a></td>
                <td>No</td>
            </tr>
            </table>
            </div>
        </div>
        


	</body>
</html>