Starting to write everything down for testing since lesson 7-predefined variables
<br>
<?php
//outputs "somefile.php"
print $_SERVER['SCRIPT_NAME'].'<br>';
// outputs host header and ?port?
print $_SERVER['HTTP_HOST'].'<br>';
//This method can be useful when you have a lot of images on your server
//and need to transfer the website to another host.
//Instead of changing the path for each image, you can do the following:
//Create a config.php file, that holds the path to your images:
$host = $_SERVER['HTTP_HOST'];
$imagePath = $host.'/images/';
//use config.php
require 'config.php';
print '<img src="'.$imagePath.'header.png" />'.'<br>';
//$_SERVER['PHP_SELF'] Returns the filename of the currently executing script
//$_SERVER['SERVER_ADDR'] Returns the IP address of the host server
//$_SERVER['SERVER_NAME'] Returns the name of the host server
//$_SERVER['HTTP_HOST'] Returns the Host header from the current request
//$_SERVER['REMOTE_ADDR'] Returns the IP address drom where the user is viewing the current page
//$_SERVER['REMOTE_HOST'] Returns the Host name from where the user is viewing the current page
//$_SERVER['REMOTE_PORT'] Returns the port being used on the users machine to communicate with the web server
//$_SERVER['SCRIPT_FILENAME'] Returns the absolute pathname of the currently executing script
//$_SERVER['SERVER_PORT'] Returns the port on the server machine being used by the web server for communication
//$_SERVER['SCRIPT_NAME'] Returns the path of the current script
//$_SERVER['SCRIPT_URI'] Returns the URI of the current page
print <<<FORMS
<form action="first.php" method="post">
<p>Name: <input type="text" name="name"/></p>
<p>Age: <input type="text" name="age"/></p>
<p><input type="submit" name="submit" value="Submit"/></p>
</form>
FORMS;
//start the session (in the beginning of the document?)
session_start();
$_SESSION['color'] = 'red';
$_SESSION['name'] = 'John';
//Now, the color and name session variables
//are accessible on multiple pages, throughout the entire session.
print<<<SESSIONTEST
<a href="sessionCheck.php">here test</a>
<br>
SESSIONTEST;
//Your session variables remain available in the $_SESSION superglobal
//until you close your session.
//All global session variables can be removed manually
//by using session_unset(). You can also destroy the session with session_destroy().
/* cookie
setcookie(name, value, expire, path, domain, secure, httponly);
PHP
name: Specifies the cookie's name
value: Specifies the cookie's value
expire: Specifies (in seconds) when the cookie is to expire. The value: time()+86400*30, will set the
cookie to expire in 30 days. If this parameter is omitted or set to 0, the cookie will
expire at the end of the session (when the browser closes). Default is 0.
path: Specifies the server path of the cookie. If set to "/", the cookie
will be available within the entire domain. If set to "/php/", the cookie
will only be available within the php directory and all sub-directories of php.
The default value is the current directory in which the cookie is being set.
domain: Specifies the cookie's domain name. To make the cookie available on
all subdomains of example.com, set the domain to "example.com".
secure: Specifies whether or not the cookie should only be transmitted over a
secure, HTTPS connection. TRUE indicates that the cookie will only be set if a
secure connection exists. Default is FALSE.
httponly: If set to TRUE, the cookie will be accessible only through the HTTP
protocol (the cookie will not be accessible to scripting languages). Using httponly
helps reduce identity theft using XSS attacks. Default is FALSE.
The name parameter is the only one that's required. All of the other parameters are optional.
*/
$value = 'John';
setcookie('user', $value, time()+(86400*30), '/');
if (isset($_COOKIE['user']))
{
    print 'Value is: '.$_COOKIE['user'];
}
//The setcookie() function must appear BEFORE the <html> tag.
//The value of the cookie is automatically encoded when the cookie is sent,
//and is automatically decoded when it's received. Nevertheless,
//NEVER store sensitive information in cookies.


















