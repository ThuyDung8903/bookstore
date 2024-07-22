<style>
.error {
    color: #ee0000;
    padding: 0px;
    background: none;
    border: #ee0000;
}

.error-field {
    border: 1px solid #d96557;
}

.error:before {
    content: '*';
    padding: 0 3px;
    color: #D8000C;
}

.error-msg {
    padding-top: 10px;
    color: #D8000C;
    text-align: center;
}

.success-msg {
    padding-top: 10px;
    color: #176701;
    text-align: center;
}
</style>
<main class="page-section inner-page-sec-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                <!-- Login Form s-->
                <form action="#">
                    <div class="login-form">
                        <h4 class="login-title">New Customer</h4>
                        <p><span class="font-weight-bold">I am a new customer</span></p>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Full Name</label>
                                <input class="mb-0 form-control" type="text" id="name"
                                    placeholder="Enter your full name">
                            </div>
                            <div class="col-12 mb--20">
                                <label for="email">Email</label>
                                <input class="mb-0 form-control" type="email" id="email"
                                    placeholder="Enter Your Email Address Here..">
                            </div>
                            <div class="col-lg-6 mb--20">
                                <label for="password">Password</label>
                                <input class="mb-0 form-control" type="password" id="password"
                                    placeholder="Enter your password">
                            </div>
                            <div class="col-lg-6 mb--20">
                                <label for="password">Repeat Password</label>
                                <input class="mb-0 form-control" type="password" id="repeat-password"
                                    placeholder="Repeat your password">
                            </div>
                            <div class="col-md-12">
                                <a href="#" class="btn btn-outlined">Register</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <!-- Login Form: Returning Customer -->
                <form name="login" action="" method="POST">
                    <div class="login-form">
                        <h4 class="login-title">Returning Customer</h4>
                        <p><span class="font-weight-bold">I am a returning customer</span></p>
                        <!-- Show error message if have -->
                        <?php if (!empty($loginResult)) { ?>
                        <div class="error-msg"><?php echo $loginResult; ?></div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12 col-12 mb--15">
                                <label for="email">Enter your email<span class="required error"
                                        id="username-info"></span></label>
                                <input class="mb-0 form-control" type="email" id="username"
                                    placeholder="Enter username or email" required>
                            </div>
                            <div class="col-12 mb--20">
                                <label for="password">Password<span class="required error"
                                        id="login-password-info"></span></label>
                                <input class="mb-0 form-control" type="password" name="login-password"
                                    id="login-password" placeholder="Enter your password" required>
                            </div>
                            <div class="col-md-12">
                                <input class="btn btn-outlined" type="submit" name="login-btn" id="login-btn"
                                    value="Login">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
function loginValidation() {
    var valid = true;
    $("#username").removeClass("error-field");
    $("#login-password").removeClass("error-field");

    var UserName = $("#username").val();
    var Password = $('#login-password').val();

    $("#username-info").html("").hide();

    if (UserName.trim() == "") {
        $("#username-info").html("required.").css("color", "#ee0000").show();
        $("#username").addClass("error-field");
        valid = false;
    }
    if (Password.trim() == "") {
        $("#login-password-info").html("required.").css("color", "#ee0000").show();
        $("#login-password").addClass("error-field");
        valid = false;
    }
    if (valid == false) {
        $('.error-field').first().focus();
        valid = false;
    }
    return valid;
}
</script>