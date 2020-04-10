<?php
# Author: John Gardner
# Date:   7th June 2007
# From:   http://www.braemoor.co.uk/software/passwords.php

# ******************************************************************************

#  THIS SECTION SHOULD BE MODIFIED TO REFLECT YOUR REQUIREMENTS
#  ============================================================

# Set up the password strings and associated URLs. Note that the elements of all
# but the last of this hash list are separated by commas.
$urlList = array ('onco'  => 'valid.html',
                  'Onco' => 'valid.html'
           );

# Set up the invalid URL - you should also set this up in the JavaScript  
$invalidURL = 'invalid.html';

# The cookie name - this should be the same as in the JavaScript
$cookieName = 'validpassword';

# ******************************************************************************

# If there is nothing in the form's submit field, this is the first time in. 
# Simply display the form and await the user's input. Othwerwise, pick up the 
# password from the form.

if (isset ($_POST['submit']) && strlen($_POST['password']) > 0) {
  
  # See if the password provided by the user exists in the list.
  if (array_key_exists ($_POST['password'], $urlList)) {

    # Password found - first set the cookie 
    setcookie ($cookieName, 0, NULL,'/');
    
    # Now invoke the page associated with the password.
    header ("Location: " . $urlList[$_POST['password']]);
  }
  else {

    # Password not found - goto the invalid password page
    header ("Location: " . $invalidURL);
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  lang="en-GB" xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>PHP Script for Password Protecting a Web Site</title>
<meta name="description" content="A free PHP script for password protecting web pages" />
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="author" content="John Gardner" />
<meta name="copyright" content="1998-2009 John Gardner" />
<meta name="robots" content="index, follow" />
<meta name="rating" content="General" />
<meta name="sitemap-priority" content=".8" />
<meta name="sitemap-changefreg" content="monthly" />
<meta name="robots" content="index, follow" />
<link rel="stylesheet" type="text/css" href="_private/software.css" />
<link rel="icon" href="http://braemoor.co.uk/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="http://braemoor.co.uk/favicon.ico" type="image/x-icon" />
<script src="_private/functions.js" type="text/javascript"></script>
</head>

<body>

<div id="rh-col">
<p class="pageheading">PHP Script for Password Protecting Web Pages</p>

<p>This simple PHP script allows you to provide password protection for part of 
a web site, for those who do not have access to their web server's 
implementation of the HTTP basic authentication scheme. It works in conjunction  
with a JavaScript function which is called in the header of each protected web 
page.</p>

<p>The functionality protects against a casual attempt to access protected 
pages, but because it requires JavaScript to be enabled in the user's browser, 
it shouldn't be considered for anything where security is a critical issue,
although the user would need to know the specific URI of the protected page in
order to access it, as it would not be referenced directly by any page.</p>

<p style="margin-bottom: 5px;">This password mechanism will be effective 
providing that:</p>

<ol style="margin-top: 5px;">
<li>There are no direct links to protected pages.</li>
<li>Protected pages are excluded from search engines.</li>
<li>JavaScript is enabled in the user's browser.</li>
</ol>

<p>It assumes that access to the protected part of the web site is through an
entry page, with a form containing a password prompt:</p>

<form id="myform" action="passwords.php" method="post">
<p>Try it: (passwords are <span style="color: #ff0000;">xyzzy, abcdef, 123456):</span> 
<span style="color: #ff0000; margin-left: 20px;">Enter password: 
<input type="password" name="password" maxlength="12" size="12" style="margin-left: 10px;" />
<input type="submit" name="submit" value="submit" style="margin-left: 30px; color: #f00;" />
</span></p>
</form>

<p>The normal route through the PHP script when called as above simply checks 
the given password against one contained within a list, and displays either  
the required entry web page of the protected part of the site, or reports that 
an invalid password has been given. The script allows for multiple passwords / 
entry web page combinations.</p>

<p>The script also sets up a cookie, which may be interrogated by the supplied 
JavaScript function inserted in the header of each page of the protected part of 
the site. This optional facility is intended to prevent the page from being 
accessed directly. If a valid password has been previously provided, the page is 
displayed as normal, otherwise an invalid password error is reported.</p>

<p>The basic form is coded as follows (without the styling):</p>

<pre style="font-size: 90%;">
&lt;form id="myform" action="passwords.php" method="post">
Enter password: 
&lt;input type="password", name="password", maxlength="12" />
&lt;input type="submit",  name="submit" value="submit" />
&lt;/form>
</pre>

<p>The password field must be called <em>password</em>, and the <em>action</em> 
attribute must contain the URL for the <em>password.cgi</em> script. If the 
password is valid the CGI script invokes one web page; if it is invalid it 
invokes a second.</p>

<p>The PHP script includes the following lines which determine valid password / 
URL combinations, which should be adjusted to meet your own requirements.</p>

<pre style="font-size: 90%;">
# Set up the password strings and associated URLs. Note that the elements of all
# but the last of this hash list are separated by commas.
$urlList = array ('xyzzy'  => 'valid.html',
                  'abcdef' => 'valid.html',
                  '123456' => 'valid.html'
                 );

# Set up the invalid URL      
my $invalidurl = "invalid.html";
</pre>

<p>The JavaScript code which should be incorporated in the header of each of 
the protected pages, has the following line, which should be modified to reflect
your own requirements:</p>

<pre style="font-size: 90%;">
var invalidurl = "invalid.html";
</pre>

<p>The download contains a sample passwords interface page complete with the 
required PHP code, a CSS file, sample valid and invalid web pages, and the 
JavaScript file. Install these in your main web directory, and then invoke
the passwordstest.php web page.</p>

</div>
</body>
</html>