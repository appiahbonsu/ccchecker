<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="./faviconm.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/hyper.css?v=1.7" />
    <script src="../js/uikit.js"></script>
    <?php
    session_start();
    $userLogged = false;
    $isAdmin = false;
    $is_active = false;
    $access_tok = 'null';
    if (isset($_SESSION['username'])) {
        $userLogged = true;
        if ($_SESSION['roles'] === "admin") {
            $isAdmin = true;
        }
        if ($_SESSION['status'] === 'active') {
            $is_active = true;
        }
        if ($_SESSION['access'] !== null) {
            $access_tok = $_SESSION['access'];
        }
    }
    if ($userLogged !== true) {
        return header("location: ./?message=user_not_logged");
    }


    ?>
</head>

<body>

    <?php include "./include/header.php"; ?>

    <div class="uk-section uk-section-muted">
        <div class="uk-container">
            <div class="uk-background-default uk-border-rounded uk-box-shadow-small">
                <div class="uk-container uk-container-xsmall uk-padding-large">
                    <article class="uk-article">
                        <h1 class="uk-article-title">Team 2.0 Dashboard
                            <p style="float:right;">
                                <label class="switch">
                                </label>
                            </p>
                        </h1>
                        <div class="uk-article-content">
                            <?php if ($_SESSION['roles'] === 'admin') { 

                               include("./include/admin_dash.php");

                            } else  if ($is_active === true) {

                                include("./include/user_dash.php");
                            } else {

                            ?>
                                <h3 class="mtitle"> Your account status is <span class="tag_warn">pending</span></h3>

                                <p class="uk-text-lead uk-text-muted">Once your account have been approved you can use Team 2.0 checker.</p>

                                <p class="uk-text-lead uk-text-muted">Here is your account secret code (keep it in safe place).</p>
                                <input type="text" class="uk-form-controls access_input" value="<?php echo $access_tok; ?>" readonly>

                            <?php
                            } ?>


                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>


    <?php include './include/footer.php'; ?>

    <script src="../js/awesomplete.js"></script>
    <script src="../js/custom.js"></script>


</body>

</html>