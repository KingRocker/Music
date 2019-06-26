<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account($con);

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>

<!DOCTYPE html>
<html>
<head >
    <title>Welcome to Slucious</title>
    <link rel="stylesheet" href="assets/css/register.css" class="">
    <link rel="stylesheet" href="assets/css/normalize.css" class="">
    <script src="assets/js/jquery.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="assets/js/register.js"></script>

</head>
<body style="height: 100vh;" >



    <?php
    //to choose which script is shown

    if(isset($_POST['registerButton'])){
        echo '<script>
              $(document).ready(function() {
            
                $("#loginForm").hide();
                $("#registerForm").show();
              });
                </script>';
    } else {
        echo   '<script>
                $(document).ready(function() {
        
                $("#loginForm").show();
                $("#registerForm").hide();
                });
                </script>';
    }

    ?>
                <script>
            $(document).ready(function() {
            
                $("#loginForm").show();
                $("#registerForm").hide();
            });
                </script>

    <div  id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. johnDoe" value="<?php getInputValue('loginUsername') ?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password" required>
                    </p>

                    <button type="submit" name="loginButton">Login</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? Sign-up here.</span>
                    </div>

                </form>



                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free account</h2>
                    <p>
                    <?php echo $account->getError(Constants::$userNameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" placeholder="e.g. johnDoe" value="<?php getInputValue('username') ?>" required>
                    </p>

                    <p>
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" type="text" placeholder="e.g. John" value="<?php getInputValue('firstName') ?>" required>
                    </p>

                    <p>
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" type="text" placeholder="e.g. Doe" value="<?php getInputValue('lastName') ?>" required>
                    </p>

                    <p>
                    <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="e.g. johnd@gmail.com" value="<?php getInputValue('email') ?>" required>
                    </p>

                    <p>
                        <label for="cEmail">Confirm E-mail</label>
                        <input id="cEmail" name="cEmail" type="email" placeholder="e.g. johnd@gmail.com" value="<?php getInputValue('cEmail') ?>" required>
                    </p>

                    <p>
                    <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                    <?php echo $account->getError(Constants::$passwordsNotAlphanumeric); ?>
                    <?php echo $account->getError(Constants::$passwordsCharacters); ?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="Your Password" required>
                    </p>

                    <p>
                        <label for="cPassword">Confirm Password</label>
                        <input id="cPassword" name="cPassword" type="password" placeholder="Your Password" required>
                    </p>

                    <button type="submit" name="registerButton">SIGN UP</button>
                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Log in here.</span>
                    </div>
                </form>



            </div>
            

            <div id="loginText">
            <h1>Get the best of music, at your fingertips</h1>
            <h2>Listen to your favourite songs for free</h2>
            <ul>
                <li>Discover new music you'll fall in love with</li>
                <li>Create your own playlists</li>
                <li>Follow your favourite artists and keep up to date</li>
            </ul>
            
            </div>



        </div>
       
    </div>
                
</body>
</html>