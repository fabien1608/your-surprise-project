<body>
    <div id="profil-title" class="mt text-center container">
        <h2>My profile</h2>
    </div>
    <div class="mb container">
        <div id="profil-card" class="row justify-content-center bg align-items-center">
            <div id="first-profil" class="col-md-5">

             <?php
            // puting the resusult of the request of GetProfile inside data
             while ($data=$req->fetch()){
                ?>
                <p> Nickname: <?= htmlspecialchars($data['nickname'])?></p>
                <p>mail: <?= htmlspecialchars($data['email'])?></p>

                <?php
                $req->closeCursor();
                }
                ?>

                <p>Comments numbers: <?= htmlspecialchars($commentaries_numbers)?></p>
            </div>
            <div id="second-profil" class="col-md-5 text-center">
                <form action="Profil.php" method="post">
                    <div class="form-group">
                        <div class= 'col'>
                            <label for="new_nickname">New nickname</label>
                        </div>
                        <div class='col pb'>
                            <!--Getting the $_POST['new_nickname']-->
                            <input type="text" name="new_nickname" required />
                        </div> 
                        <div class='col'>
                            <input type="submit" id='btn-co' class="btn btn-primary" value="Submit"/>
                        </div>
                    </div>
                </form>
                <hr>
                <form action="Profil.php" method="post">
                    <div class="form-group">
                        <div class= 'col'>
                            <label for="new_password">New password</label>
                        </div>
                        <div class='col'>
                            <!--Getting the $_POST['new_password']-->
                            <input type="password" name="new_password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class= 'col'>
                            <label for="new_password-confirm">Confirm new password</label>
                        </div>
                        <div class= 'col'>
                            <!--Getting the $_POST['new_password_confirm']-->
                            <input type="password" name="new_password_confirm"/>
                        </div>
                    </div>
                    <div class='col'>
                        <input type="submit" id='btn-co' class="btn btn-primary" value="Submit" />
                    </div>
                </form>
                <hr>
                <form action="Profil.php" method="post">
                    <div class="form-group pt">
                        <div class= 'col'>
                            <label for="new_email">New email</label>
                        </div>
                        <div class='col pb'>
                            <!--Getting the $_POST['new_email']-->
                            <input type="text" name="new_email" required />
                        </div> 
                        <div class='col'>
                            <input type="submit" id='btn-co' class="btn btn-primary" value="Submit"/>
                        </div>
                    </div>
                </form>

                <?php
                //if one ur function have for result one of thie number, we're putting the alert message wich is matching with it           
                if($result==1)
                {   
                ?>
                    <div class="alert alert-danger" role="alert">
                    This Nickname is already taken
                    </div>
                <?php
                }
                elseif ($result==2) 
                {
                ?>   
                    <div class="alert alert-danger" role="alert">
                    This email is not valid
                    </div>
                <?php
                }
                elseif ($result==3) 
                {
                ?>   
                    <div class="alert alert-danger" role="alert">
                    This email is already taken
                    </div>
                <?php
                }
               elseif ($result==4) 
                {
                ?>   
                    <div class="alert alert-danger" role="alert">
                    Your password didn't match
                    </div>
                <?php
                }   
                elseif ($result==5) 
                {
                ?>   
                    <div class="alert alert-success" role="alert">
                    Password change with success
                    </div>
                <?php
                }   
                ?>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-light" href="Articles.php">Back to articles</a>
    </div>
</body>
</html>