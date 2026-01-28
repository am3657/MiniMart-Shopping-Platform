<?php
require(__DIR__ . "/partials/nav.php");
?>
<div class = "container">
    <h1>Login</h1>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email or Username</label>
        <input type="text" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <input type="submit" value="Login" />
</form>
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        //validate username and email with regex
        let email = form.email.value;
        let password = form.password.value;
        let isValid = true;
        const emailReq = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        // if(!emailReq.test(email)){
        //     message.push("*Email is not valid");
        //     isValid = false;
        // }
        // if(!isValid){
        //     errorElement.innerHTML = message.join("<br>");
        // }
    }
    return isValid;
    // const form = document.querySelector("form");
    // form.addEventListener('submit', (e)=>{
    //     if(!validate(e.target)){
    //         e.preventDefault();
            
    //     }
    // });
</script>
<style>
body{
    background-color: green;
}
.container{
    margin: 60px auto;
    max-width: 500px;
    background-color: #fff;
    padding: 30px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}
h1{
    text-align: center;
    font-size: 40px;
    margin-bottom: 30px;
    font-family: sans-serif;
}
form{
    display: flex;
    flex-direction: column;
}
label{
    display: block;
    font-size: 20px;
    margin-bottom: 5px;
    font-family: sans-serif;
}
input[type= "text"], input[type = "password"]{
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;    
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2)
}
input[type = "submit"]{
    padding: 10px;
    border: none;
    border-radius: 10px;
    color: #fff;
    background-color: blue;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}
.error{
   background-color: yellow; 
   border: 2px;
   border-radius: 50%;
   text-align: center;
   color: red; 
   font-size: 17px;
   padding: 20px;
}
</style>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $db = getDB();
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        echo "Email must not be empty";
        $hasError = true;
    }
    if(str_contains($email, "@")){
        //sanitize
        // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = sanitize_email($email);
    
        //validate
        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if(!is_valid_email($email)){
            echo "<div class= 'error'>*Invalid emaill*</div>";
            $hasError = true;
        }
    }
    else{
            $stmt = $db->prepare("SELECT * from Users where username = :email");
            $stmt->execute([":email" =>$email]);
            if(!($stmt->rowCount()> 0)){
                echo "<div class= 'error'>*Invalid username! Use different username or email*</div>";
                $hasError = true;
            }
        }
    
    if (empty($password)) {
        echo "<div class= 'error'>*Password must not be empty* </div>";
        $hasError = true;
    }
    if (strlen($password) < 8) {
        echo "<div class= 'error'>*Password too short* </div>";
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $stmt = $db->prepare("SELECT email, password, username, id from Users where email = :email OR username = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        echo "Welcome $email";
                        $_SESSION["user"] = $user;

                        try {
                            //lookup potential roles
                            $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                        JOIN UserRoles on Roles.id = UserRoles.role_id 
                        where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                            $stmt->execute([":user_id" => $user["id"]]);
                            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        } catch (Exception $e) {
                            error_log(var_export($e, true));
                        }
                        //save roles or empty array
                        if (isset($roles)) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }  

                        die(header("Location: home.php"));
                    } else {
                        echo "<div class= 'error'>*Invalid password* </div>";
                    }
                } else {
                    echo "<div class= 'error'>*Email not found* </div>";
                }
            }
        } catch (Exception $e) {
            echo "<pre>" . var_export($e, true) . "</pre>";
        }
    }
}
?>