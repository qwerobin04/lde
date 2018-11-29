<?php
include 'C:xampp/htdocs/lde/src/controller/LoginController.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Lokal Delivery Express</title>
    <link rel="stylesheet" href="webroot/css/login.css">

</head>

<body>
    <div id="main-container">
        <div class="lokal-login-bg">
            <img src="webroot/img/login-bg2.png" alt=" ">
        </div>
        <div class="login-form-wrapper ">
            <div class="lokal-logo ">
                <img src="webroot/img/lokal-logo-white.png " alt=" ">
            </div>
            <div  class="fb-login-button"  class="fb()" value="fbLogin"   data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true"></div>
<form class="" action = "fb()" method="post">
  <button onclick="fb()"> </button> 
        </div>
    </div>
    <!-- <div id="fb-root"></div> -->
</body>



<script>

    window.fbAsyncInit = function() {
        FB.init({
            appId: '{200216560868481}',
            cookie: true,
            xfbml: true,
            version: '{3.2}'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    FB.getLoginStatus(function(response) {
        statusChangeCallback(response); {
            status: 'connected',
            authResponse: {
                accessToken: '...',
                expiresIn: '...',
                signedRequest: '...',
                userID: '...'
            }
        }
    });
</script>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=200216560868481&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button> -->

<script>
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }
</script>


</html>
