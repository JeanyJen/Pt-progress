<?php $this->load->view('auth/partials/auth_header'); ?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo base_url('assets/'); ?>images/progress-design.png');">
        <div class="wrap-login100">

            <form class="user" action="<?php echo site_url('auth/login') ?>" method="post">
                <!-- <span class="login100-form-logo">
                    <i class="bg-login-images"></i>
                </span> -->

                <span class="login100-form-title p-b-34 p-t-27">
                    Log in
                </span>

                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input type=" text" class="form-control form-control-user" name="username" placeholder="username" autocomplete="off">
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>



                <!-- <div class="form-group">
                </div> -->

                <button type="submit" class="btn btn-primary btn-user btn-block" onclick="auth_id('username')">>
                    Login
                </button>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('auth/partials/auth_footer'); ?>

<script type="text/javascript">
    function auth_id(username) {
        if (confirm("Username dan Password Salah ")) {
            window.location.href = 'auth/login'
        }
    }
</script>