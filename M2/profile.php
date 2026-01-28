<?php
require_once(__DIR__ . "/partials/nav.php");
if (!is_logged_in()) {
    die(header("Location: login.php"));
}
?>
<?php
if (isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);

    $params = [":email" => $email, ":username" => $username, ":id" => get_user_id()];
    $db = getDB();
    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username where id = :id");
    try {
        $stmt->execute($params);
        echo "Email and Username updated successfully! <br>";
    } catch (Exception $e) {
        echo "Error updating email or username: ", $e->getMessage(), "danger";
    }
    //select fresh data from table
    $stmt = $db->prepare("SELECT id, email, username from Users where id = :id LIMIT 1");
    try {
        $stmt->execute([":id" => get_user_id()]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            //$_SESSION["user"] = $user;
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
        } else {
            echo "User doesn't exist danger <br>";
        }
    } catch (Exception $e) {
        echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
    }

    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            //TODO validate current
            $stmt = $db->prepare("SELECT password from Users where id = :id");
            try {
                $stmt->execute([":id" => get_user_id()]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($result["password"])) {
                    if (password_verify($current_password, $result["password"])) {
                        $query = "UPDATE Users set password = :password where id = :id";
                        $stmt = $db->prepare($query);
                        $stmt->execute([
                            ":id" => get_user_id(),
                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                        ]);

                        echo "Password reset success <br>";
                    } else {
                        echo "Current password is invalid, WARNING <br>";
                    }
                }
            } catch (Exception $e) {
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            echo "New passwords don't match. Warning! <br>";
        }
    }
}
?>

<?php
$email = get_user_email();
$username = get_username();
?>

<div class = "container">
<h1> Profile details</h1>
<form method="POST" onsubmit="return validate(this);">
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php se($email); ?>" />
    </div>
    <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php se($username); ?>" />
    </div>
    <!-- DO NOT PRELOAD PASSWORD -->
    <div id = "resest">Password Reset</div>
    <div class="mb-3">
        <label for="cp">Current Password</label>
        <input type="password" name="currentPassword" id="cp" />
    </div>
    <div class="mb-3">
        <label for="np">New Password</label>
        <input type="password" name="newPassword" id="np" />
    </div>
    <div class="mb-3">
        <label for="conp">Confirm Password</label>
        <input type="password" name="confirmPassword" id="conp" />
    </div>
    <input type="submit" value="Update Profile" name="save" />
    <div id = "notice"></div>
</form>
</div>

<script>
    const messageEle = document.getElementById("notice");
    function validate(form) {
        let message = [];
        let email = form.email.value;
        let username = form.username.value;
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let isValid = true;
        
        const emailReq = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if(!emailReq.test(email)){
            message.push("*Email is not valid");
            isValid = false; 
        }
        if(username.trim()===''){
            message.push("*Username must be entered");
            isValid = false;
        }
        
        if(pw != con){
            message.push("*New passwords must watch");
            isValid = false;
        }
        if(!isValid){
            messageEle.innerHTML = message.join("<br>");
        }
        return isValid;
        
    }
    const form = document.querySelector("form");
    form.addEventListener("submit", (e)=>{
        if(!validate(e.target)){
            e.preventDefault();
        }
    });

</script>

<style>
#notice{
    color: red;
}
body{
    background-color: #04AA6D
}
    .container{
    margin: 60px auto;
    max-width: 500px;
    background-color: #fff;
    padding: 30px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
}
h1{
    text-align: center;
    font-size: 40px;
    margin-bottom: 30px;
}
form{
    display: flex;
    flex-direction: column;
}
label{
    display: block;
    font-size: 20px;
    margin-bottom: 5px;
}
input[type= "email"], input[type = "text"], input[type = "password"]{
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
#reset{
    font-family: sans-serif;
    font-size: 20px;
    font-type: bold;
}
</style>

