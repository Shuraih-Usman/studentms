<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=APP_NAME?> | Login </title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ASSETS?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=ASSETS?>/css/app.css">
    <link rel="stylesheet" href="<?=ASSETS?>/css/pages/auth.css">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                    <h1 class="auth-title">DSSI</h1>
                    </div>
                    <h3 class="">Log in.</h3>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <?php if(isset($success)) : ?>
                    <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> <?=$success;?> 
                    </div>
                    <?php elseif(isset($error)) : ?>
                    
                    <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i>
                        <?=$error;?>
                    </div>
                    <?php endif;?>
                    

                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" value="Log in">
                    </form>
  
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>