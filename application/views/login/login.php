<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | Budaya Indonesia</title>
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/bootstrap.css">
    
    <link rel="shortcut icon" href="<?= base_url('assets/')?>images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/app.css">
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>logo.png" type="image/x-icon">

</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?= base_url('assets/')?>logo.png" height="48" class='mb-4'>
                                <h3>Login</h3>
                                <p>Please Log in to continue to Budaya.</p>
                            </div>
                            <form action="<?php echo base_url(); ?>c_login/login" method="post">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="username" name="username" required>
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-right" type="submit" name="login">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?= base_url('assets/')?>js/feather-icons/feather.min.js"></script>
    <script src="<?= base_url('assets/')?>js/app.js"></script>

    <script src="<?= base_url('assets/')?>js/main.js"></script>
</body>

</html>
