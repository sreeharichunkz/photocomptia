<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
  </head>
  <body>
    <!-- Add two inputs for "phoneNumber" and "code" -->
    <input type="tel" id="phoneNumber" />
    <input type="text" id="code" />

    <!-- Add two buttons to submit the inputs -->
    <button id="sign-in-button" onclick="submitPhoneNumberAuth()">
      SIGN IN WITH PHONE  </button>
    <button id="confirm-code" onclick="submitPhoneNumberAuthCode()">
      ENTER CODE
    </button>

    <!-- Add a container for reCaptcha -->
    <div id="recaptcha-container"></div>

    <!-- Add the latest firebase dependecies from CDN -->

    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>

   <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
   <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-analytics.js"></script>

   <!-- Add Firebase products that you want to use -->
   <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-auth.js"></script>
   <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-firestore.js"></script>

  <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyBXZHblCIJJ5bSItwvkJ_c11izvE12P9qo",
      authDomain: "photo2-7c597.firebaseapp.com",
      databaseURL: "https://photo2-7c597.firebaseio.com",
      projectId: "photo2-7c597",
      storageBucket: "photo2-7c597.appspot.com",
      messagingSenderId: "51198047488",
      appId: "1:51198047488:web:5039c6d3403652c807efe5",
      measurementId: "G-FL581RGHME"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    firebase.auth();
    firebase.auth().languageCode = 'it';
// To apply the default browser preference instead of explicitly setting it.
// firebase.auth().useDeviceLanguage();




      // Create a Recaptcha verifier instance globally
      // Calls submitPhoneNumberAuth() when the captcha is verified
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(  "recaptcha-container", {
        'size': 'invisible',
        'callback': function(response) {
          // reCAPTCHA solved, allow signInWithPhoneNumber.
            submitPhoneNumberAuth();
        }
      });
  /*    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        "recaptcha-container",
        {
          size: "normal",
          callback: function(response) {
            submitPhoneNumberAuth();
          }
        }
      );*/

      // This function runs when the 'sign-in-button' is clicked
      // Takes the value from the 'phoneNumber' input and sends SMS to that phone number
      function submitPhoneNumberAuth() {
        var phoneNumber = document.getElementById("phoneNumber").value;
        var appVerifier = window.recaptchaVerifier;
        firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
        .then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
          })
          .catch(function(error) {
            console.log(error);
          });
      }

      // This function runs when the 'confirm-code' button is clicked
      // Takes the value from the 'code' input and submits the code to verify the phone number
      // Return a user object if the authentication was successful, and auth is complete
      function submitPhoneNumberAuthCode() {
        var code = document.getElementById("code").value;
        confirmationResult.confirm(code).then(function(result) {
            var user = result.user;
            console.log(user);
          }).catch(function(error) {
            console.log(error);
          });
      }

      //This function runs everytime the auth state changes. Use to verify if the user is logged in
      firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          console.log("USER LOGGEDdddd IN");
               location.replace("https://www.w3schools.com")
        } else {
          // No user is signed in.
          console.log("USER NOT LOGGED IN");

        }
      });
    </script>
  </body>
</html>