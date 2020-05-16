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
                <a href="project.php"><i class="fas fa-project-diagram"></i>Projects</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
            <div id="wrapper">
                <div class="wrapper-mid">
                    <!-- Begin Paper -->
                    <div id="paper">
                    <div class="paper-top"></div>
                    <div id="paper-mid">
                        <div >
                        <!-- Begin Personal Information -->
                        <div>
                            <h1 style="font-size:50px">Zhao Yang <br /></h1>
                            <h3><span>New Graduate Student Looking For Software Developer Job</span></h3>
                            <ul>
                            <li class="ad">67 Carrick Drive, St. John's, NL, A1A 4N5</li>
                            <li class="mail">yangzhao264@gmail.com</li>
                            <li class="tel">+1 709-763-8054</li>
                            <li class="web">www.heardgi.com</li>
                            </ul>
                        </div>
                        <!-- End Personal Information -->
                        </div>
                        <!-- Begin 1st Row -->
                        <div>
                        <h2>SUMMARY</h2>
                        <p>4 years of IT service experience. Full-stack website developer, specializing in React & Angular Framework Web development.</p>
                        <h2>EDUCATION</h2>
                        <div>
                            <h3>Graduation: May. 2020</h3>
                            <p>Memorial University of Newfoundland, Canada 
                            <em>—— Bachelor of Science, Computer Science Major</em></p>
                        </div>
                        <h2>CERTIFICATIONS</h2>
                        <ul class="info">
                            <li>AWS Cloud Practitioner Essentials (Second Edition) (AWS 23 Dec., 2019)</li>
                            <li>AWS Certified Developer – Associate (Digital) - in progress (2019-2020)</li>
                            <li>Full Stack Web and Multiplatform Mobile App Development(2019-2020)</li>
                        </ul>   
                        </div>
                        <!-- End 2nd Row -->
                        <!-- Begin 3rd Row -->
                        <div >
                        <h2>EXPERIENCE</h2>
                        <div>
                            <h3>Heardgi Website Design Co., St. John’s</h3>
                            <p>April 2016 to Present, Canada <br />
                            <em>Freelance Website Designer/Co-Founder</em></p>
                            <ul class="info">
                            <li>Improved the online visibility of a website in a web search engine's unpaid results (SEO).</li>
                            <li>Supported small business customers, like Sun Sushi, Dragon 88, Jin Dragon Chinese Restaurant to create their own website and provide them with distance support.</li>
                            <li>Provided website maintenance and update.</li>
                            </ul>
                        </div>
                        <div>
                            <h3>BoomIT, St.John’s </h3>
                            <p>June 2019 to Present, St. John’s, Canada <br />
                            <em>Student Assistant Web Developer</em></p>
                            <ul class="info">
                            <li>Website developer on web development team project by using Wordpress, HTML5, Javascript, Opencart, MongoDB.</li>
                            <li>Teaching clients how to operate web tools.</li>
                            <li>Provided remote solutions and support including RDP, and teamviewer.</li>
                            <li>Mastery of using office software including Microsoft Excel, Desktop Remote, OpenVPN, Microsoft software</li>
                            </ul>
                        </div>
                        <div>
                            <h3>NLCC Service Group Corp. , St.John’s</h3>
                            <p>Jan 2019 to Dec 2019, NLCC Group, NL, Canada <br />
                            <em>Software Developer</em></p>
                            <ul class="info">
                            <li>Software Developer on Website design team focuses on Front-end Development by using HTML, PHP+MySQL, Bootstrap, and Javascript.</li>
                            <li>Provided UI/UX solutions and support including troubleshooting with Wordpress, server side problems with CPanel.</li>
                            <li>Developed SEO (Search engine optimization) in Google, Bing, Yelp ranking up to the top 10 of the first page list in Google with specific keywords.</li>
                            <li>Optimized existing code structure to improve run-time performance, and code maintenance.</li>
                            <li>Provided Big Data analytic solution to the Security and Marketing program at NLCC.</li>
                            </ul>
                        </div>
                        <div>
                            <h3>FAW-VOLKSWAGEN IT Department, China  </h3>
                            <p>April 2016 to August 2016, China <br />
                            <em>Internship</em></p>
                            <ul class="info">
                            <li>Worked with Senior Developer to manage large, complex design projects for corporate clients.</li>
                            <li>Carried out quality assurance tests to discover errors and optimize usability.</li>
                            <li>Developed project concepts and maintained optimal workflow.</li>
                            </ul>
                        </div>
                        <div>
                            <h3>Memorial University -Network Operation Center, St.John’s </h3>
                            <p>December 2015 to September of 2019, Memorial University, Canada <br />
                            <em>Student Assistant</em></p>
                            <ul class="info">
                            <li>Responsible for troubleshooting broken phones for students and staff within university.</li>
                            <li>Maintain the website for all networks of university.</li>
                            <li>Using Excel and Word software to record data collection for the ITS department.</li>
                            <li>Responsible for organizing the port and switches in buildings.</li>
                            <li>Office devices activation by using AutoNoc System.</li>
                            </ul>
                        </div>
                        <div>
                            <h3>Memorial University Chinese Student & Scholar Association, St. John’s </h3>
                            <p>October 2014 to October 2015 <br />
                            <em>Association President of MUNCSSA</em></p>
                            <ul class="info">
                            <li>Responsible for the operation of the association.
                            <li>Atlantic Region Chinese Association Leaders Council member, Memorial University representative.</li>
                            <li>Liaison between Embassy and faculty advisor/Memorial University NL section/other societies.</li>
                            <li>Attend Ottawa Canada Chinese Association executive meeting as Memorial University Chinese Student representative.</li>
                            </ul>
                        </div>
                        </div>
                        <!-- End 3rd Row -->
                        <!-- Begin 4th Row -->
                        <div >
                        <h2>SKILLS</h2>
                        <div>
                            <h3>Programming languages</h3>
                            
                            <ul class="skills">
                            <h4>Back-end: </h4>
                            <li>Java</li>
                            <li>Python</li>
                            <li>Node.js</li>
                            <li>TypeScript</li>
                            <h4>Front: </h4>
                            <li>Angular</li>
                            <li>H5</li>
                            <li>Bootstrap</li>
                            <li>JS(VueJS, React)</li>
                            <h4>UI Design Softwares: </h4>
                            <li>Adobe DW, AI, PS, AE</li>
                            <li>Access, Powerpoint, Word,Excel, etc</li>
                            </ul>
                        </div>
                        <div >
                        <h2>WORKS</h2>
                            <ul class="works">
                                <li>http://www.lcnlbakery.com/</li>
                                <li>http://www.nlccgroup.com/</li>
                                <li>http://www.canl.ca/</li>
                                <li>http://www.gardermoen.com/</li>
                                <li>http://www.dragon88.ca/</li>
                                <li>http://www.citylightbuffet.com/</li>
                                <li>http://www.game.heardgi.com/</li>
                                <li>http://www.universitydemo.heardgi/</li>
                            </ul>
                        </div>
                        <div >
                        <h2>REFERENCES</h2>
                            <ul class="works">
                            <li>Memorial University
                            Communication Group
                            Manager:
                            Squires, Jean
                            (709) 864-4829</li>
                            <li>Memorial University ITS (IT
                            Service) Manager:
                            Penny, Greg
                            (709) 864-3747</li>
                            <li>NLCC Group Leader
                            Kevin Zhao
                            (709)749-6798</li>
                            <li>FAW-VOLKSWAGEN
                            Internship:
                            Reference supplied if needed.</li>
                            </ul>
                        </div>
                        <!-- Begin 5th Row -->
                    </div>
                    <div class="clear"></div>
                    <div class="paper-bottom"></div>
                    </div>
                    <!-- End Paper -->
            </div>
            <div class="wrapper-bottom"></div>
            </div>
            </div>
        </div>
        


	</body>
</html>