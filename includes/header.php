<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CRoboto" rel="stylesheet"> -->
  <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">
  <title>CCJ Garments</title>
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/backend.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="node_modules/dom-to-image/src/dom-to-image.js"></script>

<script type="text/javascript">

  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1098249697392213',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v14.0'
    });

   //  FB.getLoginStatus(function(response) {
   //  if (response.status === 'connected') {
   //    getFacebookUser(response)
   //  } else if (response.status === 'not_authorized') {
   //    // The user hasn't authorized your application.  They
   //    // must click the Login button, or you must call FB.login
   //    // in response to a user gesture, to launch a login dialog.
   //  } else {
   //    // The user isn't logged in to Facebook. You can launch a
   //    // login dialog with a user gesture, but the user may have
   //    // to log in to Facebook before authorizing your application.
   //  }
   // });
  };

  function checkLoginState() {
   //  FB.getLoginStatus(function(response) {
   //  if (response.status === 'connected') {
   //    getFacebookUser(response)
   //  }
   // }); 
  }

  function getFacebookUser(response) {
    var uid = response.authResponse.userID;
    var accessToken = response.authResponse.accessToken;

    FB.api(uid, { fields: 'name, email, picture' }, function(response) {
      response['token'] = accessToken;
      registerFB(response);
    });

  }
  
  function registerFB(data) {
     jQuery.ajax({
        type: "POST",
        url: 'registerFB.php',
        data: {register: data}, 
         success:function(data) {
            alert('You are Logged In');
            window.open('index.php','_self');
         }
    });
  }
  
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>