<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ASSETS ?>css/formulaire.css">
    <link rel="shortcut icon" href="<?= ASSETS ?>images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS ?>fonts/font-awesome-pro-master/css/all.css">
    <link rel="manifest" href="<?= RACINE ?>manifest.json">
    <!-- PWA -->
    <meta name="theme-color" content="white">
    <title>websignerr/formulaire</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" id="logForm">
                    <img src="<?= ASSETS ?>images/grand-logo-websignerr.svg" alt="" class="logo">

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="user_login" placeholder="login" autofocus>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="user_pass" placeholder="mot de pass">
                    </div>
                    <input type="submit" value="Sign-in" class="btn solid">
                </form>

                <form action="" class="sign-up-form" id="registerForm">
                    <img src="<?= ASSETS ?>images/grand-logo-websignerr.svg" alt="" class="logo">
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="votre nom complet" name="username">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input placeholder="votre login" name="user_login">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input placeholder="Email" name="user_email">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mot de passe" name="user_pass">
                    </div>
                    <input type="submit" value="sign-up" class="btn solid">
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Don't worry <b>websignerr </b> is a very simple application to use, you juste have to create your account and let's go to discover lots of new things in the worl of web and design</p>
                    <button class="btn transparent" id="sign-up-btn"> Sign up</button>
                </div>
                <img src="<?= ASSETS ?>images/design2.svg" alt="" class="image">
            </div>

            <div class="panel rigth-panel">
                <div class="content">
                    <h3>Do you have an account?</h3>
                    <p> Log in and let's start the incredible freelance adventure</p>
                    <button class="btn transparent" id="sign-in-btn"> Sign in</button>
                </div>
                <img src="<?= ASSETS ?>images/design1.svg" alt="" class="image">
            </div>
        </div>
    </div>

    <script src="<?= ASSETS ?>js/formulaire.js"></script>
    <script src="<?= ASSETS ?>js/formulaire.fetch.js"></script>
</body>

</html>