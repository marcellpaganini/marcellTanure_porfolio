<?php
$pageTitle = "Login";
    include 'includes/header.php';
    error_reporting(0);
?>
<body>
    <main id="main"> 
        <section id="facts" class="facts">
            <div class="container">
                <div class="section-title">
                    <h2>Login</h2><br />   
                    <?php
                        // If the user is registered, show msg
                        if(isset($_SESSION['userName'])){
                            echo "You're already logged in as <strong>", $_SESSION['userName'], "</strong>";
                            echo "<br><br><a href='index.php'>Home</a>";
                        }
                        // check if form has been submitted
                        else if ($_SERVER['REQUEST_METHOD']== "POST") {
                            // check for empty fields
                            if (!empty($_POST['userName']) && !empty($_POST['password'])) {
                                // Store escaped $_POST values in variables
                                $uName = htmlentities($_POST['userName']);
                                $password = htmlentities($_POST['password']);
                                if(($uName == "delon" && $password == secret) || ($uName == "marcell" && $password == secret)) {
                                    $_SESSION['userName'] = $uName;
                                    $_SESSION['password'] = $password;
                                echo "Thanks for logging in <strong>", $uName, "</strong>";
                                echo "<br><br><a href='index.php' class='btn btn-secondary btn-sm'>Home</a>";
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>
                                             Wrong user name or password.
                                          </div>";
                                    echo "<br><br><a href='login.php' class='btn btn-secondary btn-sm'>Try again</a>";
                                } 
                            } else{
                                echo "<div class='alert alert-danger' role='alert'>
                                             Please fill out both fields.
                                    </div>";
                                echo "<br><br><a href='login.php' class='btn btn-secondary btn-sm'>Try again</a>";
                            }

                        } 
                        
                        //If the form wasn't submitted,show the html
                        else {
                            if(isset($_GET['logout'])){
                                if($_GET['logout'] == 1){
                                    echo 'You have been logged out. ';
                                }
                            }
                            ?>

                                <form action="login.php" class="row g-3" method="post">
                                    <label for="userName">Username:</label>
                                    <input type="text" class="form-control" name="userName" placeholder="Ex: delon"/> <br />
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter you 'secret' password"/>
                                    <div style= "color:white;"> BLANK <div>
                                    <input class="btn btn-secondary" type="submit" value="Login" />
                                </form>

                            <?php
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>
<?php
    include 'includes/footer.php';
?>
