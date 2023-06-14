<?php require('../config/head.php'); if(isset($_SESSION['username'])){header('Location: /home');exit;}?>
<div id="loading">
    <div id="loading-center"></div>
</div>
<div class="wrapper">
    <section class="login-content">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center height-self-center">
                <div class="col-md-5 col-sm-12 col-12 align-self-center">
                    <div class="sign-user_card">
                        <img src="https://i.imgur.com/JnXYaPq.png" class="img-fluid rounded-normal light-logo logo" alt="logo"><img src="https://i.imgur.com/JnXYaPq.png" class="img-fluid rounded-normal darkmode-logo logo" alt="logo">
                        <h4 class="mb-3">Đăng nhập tài khoản</h4>
                        <p>Xin mời nhập thông tin.</p>
                        <form submit-ajax="nhq" method="post" action="<?=BASE_URL('api/auth/login');?>">
                            <o id="callback"></o>
                            <input type="hidden" name="_token" value="9jILCFLdUiKHj5NIvPwKO98dWO5obzeL3msiDKcQ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="text" name="username" value="" placeholder=" ">
                                        <label>Tài khoản</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control" type="password" name="password" value="" placeholder=" ">
                                        <label>Mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="custom-control custom-checkbox mb-3 text-left">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                        <label class="custom-control-label" for="customCheck1">Ghi nhớ</label>
                                    </div>
                                </div>
                                <div class="col-lg-6"><a href="#" class="text-primary float-right">Quên mật khẩu?</a>
                                </div>
                            </div>
                            <button type="submit" callback="rescallback" class="btn btn-primary btn-block btn-lg">Đăng nhập ngay</button>
                            <p class="mt-3"> Bạn chưa có tài khoản? <a href="<?=BASE_URL('auth/register');?>" class="text-primary">Đăng kí</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>function rescallback(response){if (response.status === true){$('.rescallback').show();$('#callback').html(response.data);window.location.href = "<?=BASE_URL('home');?>";/* setTimeout(() => {window.location.href = "<?=BASE_URL('home');?>";}, 2000); */}else{$('.rescallback').hide();$('#callback').html(response.data);}}</script>

<?php require('../config/end.php');?>