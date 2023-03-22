<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Home</title>
</head>

<body>
    {{-- Main Section Which is A Wrapper --}}
    <section class="vh-100" style="background-color: #eee;">
        {{-- Container Start --}}
        <div class="container h-100">
            {{-- Row --}}
            <div class="row d-flex justify-content-center align-items-center h-100">
                {{-- Col --}}
                <div class="col-lg-12 col-xl-11">
                    {{-- Card --}}
                    <div class="card text-black" style="border-radius: 25px;">
                        {{-- Card Body --}}
                        <div class="card-body p-md-5">
                            {{-- Row --}}
                            <div class="row justify-content-center">
                                {{-- Col --}}
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                    {{-- FORM --}}
                                    <form class="mx-1 mx-md-4">
                                        {{-- ==================================================== --}}
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id=" number" class="form-control" />
                                                <label class="form-label" for="form3Example1c">Your Number</label>
                                            </div>
                                        </div>
                                        <div class="sentMessage bg-success text-light w-50 m-auto mb-2 d-none"></div>
                                        <div class="error bg-danger text-light w-50 m-auto mb-2 d-none"></div>
                                        {{-- recaptha-container --}}
                                        <div id="recaptha-container"></div>
                                        {{-- ==================================================== --}}
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" onclick="sendCode()"
                                                class="btn btn-primary btn-lg">Register</button>
                                        </div>
                                        {{-- ==================================================== --}}
                                    </form>
                                </div>
                                {{-- Col --}}
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    {{-- IMAGE --}}
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "firebase/app";
        import {
            getAnalytics
        } from "firebase/analytics";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyBC3_1YN4ECP2dTg-LOgfrNS-DXY81vR-U",
            authDomain: "laravelotp-d8da2.firebaseapp.com",
            projectId: "laravelotp-d8da2",
            storageBucket: "laravelotp-d8da2.appspot.com",
            messagingSenderId: "397762290650",
            appId: "1:397762290650:web:30c008bdbaad18149496e3",
            measurementId: "G-9YFGBEP1LY"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>
    <script type="text/javascript">
        window.onload = function() {
            render();
        }

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchVerifier('recaptha-container');
            recaptchaVerifier.render();
        }

        function sendCode() {
            var number = $('#number').val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {

                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;

                $('#sentMessage').text(Sent Successfully!);
                $('#sentMessage').show();

            }).catch(function(error){
                $('#error').text(error.message);
                $('#error').show();
            })
        }
    </script>
</body>

</html>
