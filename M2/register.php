<?php
require(__DIR__ . '/partials/nav.php');
?>
<div class= container>
    <h2>Register</h2>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value = "<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required />
    </div>
    <div>
        <label for="user">Username</label>
        <input type="text" name="user" value = "<?php echo isset($_POST["user"]) ? $_POST["user"] : ''; ?>" required/>
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" name="confirm" required minlength="8" />
    </div>
    <input type="submit" value="Register" />
    <div id="error"></div>

</form>
</div>
<script>
    const errorElemenet = document.getElementById("error");
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        
        let isValid = true;
        let email = form.email.value;
        let username = form.user.value;
        let password = form.password.value;
        let confirm = form.confirm.value;
        let errorElement = document .getElementById("error");
        let message = [];
        const emailReq = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if(!emailReq.test(email)){
            message.push("*Email is not valid");
            isValid = false;
        }
        if(username.trim()===''){
            message.push("*Username must be entered");
            isValid = false;
        }
        if(password.length < 8){
            message.push("*Password must be longer than 8 characters");
            isValid = false;
        }
        if(password.length > 0 && password !== confirm){
            message.push("*Both passwords are not the same");
        }
        if(!isValid){
            errorElement.innerHTML = message.join("<br>");
        }

        return isValid;
    }
    const form = document.querySelector("form");
    form.addEventListener('submit', (e)=>{
        if(!validate(e.target)){
            e.preventDefault();
            
        }
    });
</script>
<style>
    #error{
        color: red;
    }
    .redText{
    background-color: green;
    color: red;
    padding: 10px;
    border: 1px solid #ccc;
    margin: 10px auto;
    border-radius: 5px;

    }
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
h2{
    text-align: center;
    font-size: 25px;
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
.message{
   background-color: yellow; 
   border: 2px;
   width: 50%;
   border-radius: 5px;
   text-align: center;
   color: red; 
   font-size: 17px;
   padding: 20px;
   margin: 20px auto;
   display: block;
   font-size:15px;

}
</style>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $username = $_POST["user"];
    $confirm = se(
        $_POST,
        "confirm",
        "",
        false
    );
    //TODO 3
    $db = getDB();
    $hasError = false;
    if (empty($email)) {
        echo "<div class ='message'>Email must not be empty<br></div>";
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if(!is_valid_email($email)){
        echo "<div class ='message'>*Invalid email address<br></div>";
        $hasError = true;
    }
    
    if (empty($password)) {
        echo "<div class = 'message'>*Password must not be empty.<br></div>";
        $hasError = true;
    }
    if (empty($confirm)) {
        echo "<div class = 'message'>*Confirm password must not be empty. <br></div>";
        $hasError = true;
    }
    if (strlen($password) < 8) {
        echo "<div class = 'message'>*Password too short.<br></div>";
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        echo "<div class = 'message'>*Passwords must match.<br></div>";
        $hasError = true;
    }
    $stmt = $db->prepare("SELECT email,username from Users where email = :email OR username = :username");
            $stmt->execute([":email" =>$email, ":username" =>$username]);
            if($stmt->rowCount()> 0){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result['email'] === $email){
                echo "<div class= 'error'>*Email already taken! Try different email*</div>";
                $hasError = true;
                }   
                if($result['username'] === $username){
                    echo "<div class= 'error'>*Username already taken! Try different username<br></div>";
                    $hasError = true;
                 }
            }
    
    if (!$hasError) {
    //     //TODO 4
         $hash = password_hash($password, PASSWORD_BCRYPT);
         $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
         try {
             $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
             echo "<div class='message'>Successfully registered!<br></div>";
             echo "<div class='message'>Welcome, $email<br></div>";
         } catch (Exception $e) {
             echo "<div class='message'>Registration failed<br></div>";
             "<pre>" . var_export($e, true) . "</pre>";
         }
    }
}
?>