
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
     <title>NETTUTS > Sign up</title>
     <link href="css/style.css" type="text/css" rel="stylesheet" />
 </head>
 <body>
     <!-- start header div -->
     <div id="header">
         <h3>NETTUTS > Sign up</h3>
     </div>
     <!-- end header div -->

     <!-- start wrap div -->
     <div id="wrap">

         <!-- start php code --><?php
include('php-includes/connect.php');

// Return Success - Valid Email
$msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
// Example output: f4552671f8909587cf485ea990207f3b
$password = rand(1000,5000); // Generate random number between 1000 and 5000 and assign it to a local variable.
// Example output: 4568

mysql_query("INSERT INTO users (username, password, email, hash) VALUES(
    '". mysql_escape_string($name) ."',
    '". mysql_escape_string(md5($password)) ."',
    '". mysql_escape_string($email) ."',
    '". mysql_escape_string($hash) ."') ") or die(mysql_error());


    $to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject
$message = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$name.'
Password: '.$password.'
------------------------

Please click this link to activate your account:
http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$hash.'

'; // Our message above including the link

$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email









?>

         <!-- stop php code -->

         <!-- title and description -->
         <h3>Signup Form</h3>
         <p>Please enter your name and email addres to create your account</p>

         <!-- start sign up form -->
         <form action="" method="post">
             <label for="name">Name:</label>
             <input type="text" name="name" value="" />
             <label for="email">Email:</label>
             <input type="text" name="email" value="" />

             <input type="submit" class="submit_button" value="Sign up" />
         </form>
         <!-- end sign up form -->

     </div>
     <!-- end wrap div -->
 </body>
 </html>