<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Brief5/views/css/login.css">
    <title>Document</title>
</head>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="login/auth" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group mt-3">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group mt-4">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>
                            <?php

                                            if(isset($_SESSION['erreurLogin']) && !empty($_SESSION['erreurLogin'])){
                                                echo'<div class="alert alert-danger mt-3">'.$_SESSION['erreurLogin'].'</div>';
                                            }
                                            session_destroy();
                                            ?>

                                            
                            
                            <div class="form-group m-4">
                                <a href="enseignant/inscription" class="float-end">inscription</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>