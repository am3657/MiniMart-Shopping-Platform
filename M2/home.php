<?php
require(__DIR__ . "/partials/nav.php");
?>
<h1>Home</h1>
<?php
// if (isset($_SESSION["user"]) && isset($_SESSION["user"]["email"])) {
//     echo "<Welcome, " . $_SESSION["user"]["email"];
// } 
if(is_logged_in()){
    $email = get_user_email();
    echo "<div class = 'welcome'> Welcome, $email <br></div>";
}
else {
    echo "You're not logged in";
}
//shows session info
echo "<pre>" . var_export($_SESSION, true) . "</pre>";
?>
<style>
    .welcome{
        font-family: sans-serif;
        font-size: 40px;
        padding: 60px;
        text-align: center;
        font-weight: bold; 
    }
    body{
        background-color: #04AA6D;
    }