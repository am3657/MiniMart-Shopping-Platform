<?php
//Note: this is to resolve cookie issues with port numbers
$domain = $_SERVER["HTTP_HOST"];
if (strpos($domain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = true; //some people have issues with localhost for the cookie params
//if you're one of those people make this false

//this is an extra condition added to "resolve" the localhost issue for the session cookie
if (($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60 * 60,
        "path" => "/",
        //"domain" => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
}
session_start();
//include functions here so we can have it on every page that uses the nav bar
//that way we don't need to include so many other files on each page
//nav will pull in functions and functions will pull in db
require(__DIR__ . "/../lib/functions.php");
?>
<nav>
    <ul>
      <?php if (is_logged_in()) : ?>
        <li><a href="home.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
      <?php endif; ?>
      <?php if (!is_logged_in()) : ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      <?php endif; ?>
      <?php if (has_role("Admin")) : ?>
        <li><a href= "list_roles.php"> List Roles</a></li>
      <?php endif; ?>
      <?php if (is_logged_in()) : ?>
        <li style ="float:right"><a class = "active" href="logout.php">Logout</a></li>
      <?php endif; ?>
      <li><a href= "shop.php">Shop</a></li>
      <?php if (is_logged_in()) : ?>
        <li> <a href="cart.php">Cart</a></li>
      <?php endif; ?>
    </ul>
</nav>
<style>
nav li:hover {
    background-color: navy;
  }
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>