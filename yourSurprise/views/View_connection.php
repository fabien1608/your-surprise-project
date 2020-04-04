<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8" />
    <title>Connection </title>
    <!--css --> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body >
    <div class='main-text container-fluid f-h'>
        <div  class="f-h row justify-content-center align-items-center">
            <div class="Register-main">      
                <form class="form" action="connection.php" method="post">
                    <div class="form-group">
                        <div class= 'col'>
                            <label for="pseudo">Nickname</label>
                        </div>
                        <!--Getting the $_POST['nickname']-->
                        <div class='col'>
                            <input type="text" name="nickname" required autofocus />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class= 'col'>
                            <label for="password">Password</label>
                        </div>
                        <!--Getting the $_POST['password']-->
                        <div class= 'col'>
                            <input type="password" name="password" required />
                        </div>
                    </div>
                    <!--Using a checkbox t oask to the user if he want to log automatically next time-->
                    <div class='col checkbox'>
                      <label><input type="checkbox" name="autoC" /> Automatic connection</label>
                  </div>
                  <div class='col'>
                    <input type="submit" id='btn-co' class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div id='register-link' class='col'>
                <p>Still not registered? <a href="inscription.php">Register</a></p>
            </div>
            <!-- if SetConnection is returning 1 we are sending an alert message-->
                <?php           
                if($error==1)
                {   
                ?>
                    <div class="alert alert-danger" role="alert">
                    Wrong nickname or password
                    </div>
                <?php 
                }
                ?>
            </div> 
        </div>
    </div>
</div>
<!--js-->
<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>