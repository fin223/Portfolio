<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>

            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <link href="Projet_style.scss" media="screen" rel="stylesheet" type="text/css">
            <title>Connexion</title>
        </head>
        <body>
        <div class="text-center">
            <h1 class="p-3"> Grégory FOLLAIN </h1>
        </div>

        <div class="btn-menu-2"></div>
        <div class="btn-menu-1"></div>
        
        <div class="login-form">
            
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="Projet_Login_connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center" ><a href="Projet_Login_inscription.php">Inscription</a></p>
            
        </div>
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
                border-radius: 15px;
                color: white;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #515151;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
                border-radius: 15px;
                
            }
            .login-form h2 {
                margin: 0 0 15px;
                
            }
            .form-control {
                color: white;
            }

            .form-control, .btn {
                min-height: 38px;
                border-radius: 15px;
                background-color: #808080;
                
                
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
                color: white;
            }
        </style>
        </body>
</html>