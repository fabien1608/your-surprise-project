<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8" />
    <title>Register</title>
    <!--css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body >
    <div class='main-text container-fluid f-h'>
        <div  class="f-h row justify-content-center align-items-center">
            <div class="Register-main">      
               <form class="form" action="inscription.php" method="post">
                   <div class="form-group"> 
                    <div class= 'col'>
                        <label for="nickname">Nickname</label>
                    </div>
                    <div class='col'>
                         <!--Getting the $_POST['nickname']-->
                        <input type="text" name="nickname" required autofocus />
                    </div>
                </div>
                <div class="form-group">
                    <div class='col'>
                        <label for="password">Password</label>
                    </div>
                    <div class= 'col'>
                        <!--Getting the $_POST['password']-->
                        <input type="password" name="password" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class= 'col'>
                        <label for="passwordC">Confirm your password</label>
                    </div>
                    <div class= 'col'>
                        <!--Getting the $_POST['passwordC']-->
                        <input type="password" name="passwordC" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class= 'col'>
                        <label for="email">Email</label>
                    </div>
                    <!--Getting the $_POST['email']-->
                    <div class='col mb'>
                        <input type="text" name="email" required  />
                    </div>
                </div>
                <div class='col mb'>
                    <input type="submit" id='btn-co' class="btn btn-primary" value="Register" />
                </div>      
            </form>
                <?php
                //Sending an alert message if SetInscription() returning 1,2,3 or 4           
                if($error==1)
                {   
                ?>
                    <div class="alert alert-danger" role="alert">
                    This Nickname is already taken"
                    </div>
                <?php
                }
                elseif ($error==2) 
                {
                ?>   
                    <div class="alert alert-danger" role="alert">
                    This email is not valid
                    </div>
                <?php
                }
                elseif ($error==3) 
                {
                ?>   
                    <div class="alert alert-danger" role="alert">
                    This email is already taken
                    </div>
                <?php
                }
               elseif ($error==4) 
                {
                ?>   
                    <div class="alert alert-danger" role="alert">
                    Your password didn't match
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
