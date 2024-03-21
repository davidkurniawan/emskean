<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Backend - Ecommerce</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo ASSETS?>images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo ASSETS?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS?>css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS?>css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS?>css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo ASSETS?>js/modernizr.min.js"></script>

    </head>


    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('<?php echo ASSETS?>images/bg-1.jpg');background-size: cover;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="index.html" class="text-success">
                                    <span><img src="<?php echo ASSETS?>images/logo.png" alt="" height="26"></span>
                                </a>
                            </h2>

                            <form class="" action="<?php echo BASEURL.'login/auth' ?>" method="POST">

                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" name="email" required="" placeholder="Enter your email">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" name="password" id="password" placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="account-copyright">2018 © Highdmin. - Coderthemes.com</p>
            </div>

        </div>



        <!-- jQuery  -->
        <script src="<?php echo ASSETS?>js/jquery.min.js"></script>
        <script src="<?php echo ASSETS?>js/popper.min.js"></script>
        <script src="<?php echo ASSETS?>js/bootstrap.min.js"></script>
        <script src="<?php echo ASSETS?>js/metisMenu.min.js"></script>
        <script src="<?php echo ASSETS?>js/waves.js"></script>
        <script src="<?php echo ASSETS?>js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="<?php echo ASSETS?>js/jquery.core.js"></script>
        <script src="<?php echo ASSETS?>js/jquery.app.js"></script>

    </body>
</html>