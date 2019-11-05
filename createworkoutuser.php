<?php
/**
 * Created by PhpStorm
 * User: aaronkeith
 * Date: 9/29/2019
 * Time: 6:55 PM
 */
$pagetitle = "Create Workout Account";
include_once "header.php";
//initiate variables
$showform = 1;
$errormsg = 0;
$errorfirstname = "";
$errorlastname = "";
$errorusername = "";
$erroremail = "";
$errorpassword = "";
$errorpassword2 = "";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //Sanitize user data
    $formdata['firstname'] = trim($_POST['firstname']);
    $formdata['lastname'] = trim($_POST['lastname']);
    $formdata['username'] = trim(strtolower($_POST['username']));
    $formdata['email'] = trim(strtolower($_POST['email']));
    $formdata['password'] = $_POST['password'];
    $formdata['password2'] = $_POST['password2'];

    //Checks all form data has been entered
    if (empty($formdata['firstname'])) {
        $errorfirstname = "First name is required."; $errormsg = 1; }
    if (empty($formdata['lastname'])) {
        $errorlastname = "Last name is required."; $errormsg = 1; }
    if (empty($formdata['username'])) {
        $errorusername = "Username is required."; $errormsg = 1; }
    if (empty($formdata['email'])) {
        $erroremail = "Email is required."; $errormsg = 1; }
    if (empty($formdata['password'])) {
        $errorpassword = "Password is required."; $errormsg = 1; }
    if (empty($formdata['password2'])) {
        $errorpassword2 = "Confirmation password is required."; $errormsg = 1; }

    //store variable for password length statements
    $passwordlength = strlen($formdata['password']);

    //Checks password too short
    if ($passwordlength < 8){
        $errormsg = 1;
        $errorpasswordlength = "The password is too short. Must be between 8-64 characters.";
    }
    //Checks password too long
    if ($passwordlength > 64) {
        $errormsg = 1;
        $errorpasswordlength = "The password is too long. Must be between 8-64 characters.";
    }
    //Make sure password and confirmation password match
    if ($formdata['password'] != $formdata['password2']) {
        $errormsg = 1;
        $errorpassword2 = "The Passwords Don't Match";
    }
    //Checks for duplicate username
    $sql = "SELECT * FROM workoutaccount WHERE username = ?";
    $count = checkDup($pdo, $sql, $formdata['username']);
    if($count > 0) {
        $errormsg = 1;
        $errorusername = "The Username you've entered has already been used.";
    }
    //Checks for duplicate email
    $sql = "SELECT * FROM workoutaccount WHERE email = ?";
    $count = checkDup($pdo, $sql, $formdata['email']);
    if($count > 0) {
        $errormsg = 1;
        $erroremail = "This Email has already been used.";
    }
    //Checks for valid email
    if(filter_var($formdata['email'], FILTER_VALIDATE_EMAIL)){
        //echo "Email is valid.";
    }
    else{
        $errormsg = 1;
        $erroremail = "Email is invalid.";
    }
    //Error handling
    if($errormsg == 1) {
        echo "<p class='error'>There is errors. Please resubmit.</p>";
    }
    else{
        //Hash the password
        $hashpassword = password_hash($formdata['password'], PASSWORD_BCRYPT);
        //Insert the user into the database
        try{
            $sql = "INSERT INTO workoutaccount (firstname, lastname, username, email, password) VALUES (:firstname, :lastname, :username, :email, :password) ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':firstname', $formdata['firstname']);
            $stmt->bindValue(':lastname', $formdata['lastname']);
            $stmt->bindValue(':username', $formdata['username']);
            $stmt->bindValue(':email', $formdata['email']);
            $stmt->bindValue(':password', $hashpassword);
            $stmt->execute();
            $showform =0;
            echo "<p class='good'>Congratulations, Your Account was Successfully created!</p>";
            echo "<p class='good'>Please Login and Choose Your Workout</p>";
        }
        catch (PDOException $e) {
            die( $e->getMessage() );
        }
    }
}
if($showform == 1)
{
    ?>
    <form name="createuser" id="createuser" method="post" action="createworkoutuser.php">
        <table class="center">
            <tr><th><label for="firstname">First Name:</label><span class="important">*</span></th>
                <td><input name="firstname" id="firstname" type="text" size="20" placeholder="First Name"
                           value="<?php if(isset($formdata['firstname'])){echo $formdata['firstname'];}?>"/>
                    <span class="error"><?php if(isset($errorfirstname)){echo $errorfirstname;}?></span></td>
            </tr>
            <tr><th><label for="lastname">Last Name:</label><span class="important">*</span></th>
                <td><input name="lastname" id="lastname" type="text" size="20" placeholder="Last Name"
                           value="<?php if(isset($formdata['lastname'])){echo $formdata['lastname'];}?>"/>
                    <span class="error"><?php if(isset($errorlastname)){echo $errorlastname;}?></span></td>
            </tr>
            <tr><th><label for="username">Username:</label><span class="important">*</span></th>
                <td><input name="username" id="username" type="text" size="20" placeholder="Required username"
                           value="<?php if(isset($formdata['username'])){echo $formdata['username'];}?>"/>
                    <span class="error"><?php if(isset($errorusername)){echo $errorusername;}?></span></td>
            </tr>
            <tr><th><label for="email">Email:</label><span class="important">*</span></th>
                <td><input name="email" id="email" type="email" size="20" placeholder="Required email"
                           value="<?php if(isset($formdata['email'])){echo $formdata['email'];}?>"/>
                    <span class="error"><?php if(isset($erroremail)){echo $erroremail;}?></span></td>
            </tr>
            <tr><th><label for="password">Password:</label><span class="important">*</span></th>
                <td><input name="password" id="password" type="password" size="20" placeholder="Required password" />
                    <span class="error"><?php if(isset($errorpassword)){echo $errorpassword;}?></span></td>
            </tr>
            <tr><th><label for="password2">Password Confirmation:</label><span class="important">*</span></th>
                <td><input name="password2" id="password2" type="password" size="20" placeholder="Required confirmation password" />
                    <span class="error"><?php if(isset($errorpassword2)){echo $errorpassword2;}?></span></td>
            </tr>
            <tr><th><label for="submit">Submit:</label></th>
                <td><input type="submit" name="submit" id="submit" value="Click Here"/></td>
            </tr>

        </table>
    </form>
    <p class="important">* Indicates required field</p>
    <?php
}
include_once "footer.php";
?>
