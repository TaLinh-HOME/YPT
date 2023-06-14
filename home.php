<?php require('config/head.php'); if(empty($_SESSION['username'])){header('Location: /auth/login');exit;}?>
<script type="b9e3e84309a92aaf852234bf-text/javascript">
    const profile = {
        "id": "<?=$NHQ->getUsers('id');?>",
        "fullname": "<?=$NHQ->getUsers('name');?>",
        "email": "<?=$NHQ->getUsers('email');?>",
        "username": "<?=$NHQ->getUsers('username');?>",
        "coin": "<?=$NHQ->getUsers('money');?>",
        "level": "<?php if($NHQ->getUsers('level') == NULL){echo 'member';}else{echo $NHQ->getUsers('level');}?>",
        "blocked": "<?php if($NHQ->getUsers('banned') == 0){echo 'false';}else{echo 'true';}?>",
        "detail_blocked": "<?php if($NHQ->getUsers('banned') == 0){echo 'Active';}else{echo 'Block';}?>",
        "api_token": "<?=$NHQ->getUsers('token');?>",
        "created_at": "<?=$NHQ->getUsers('date');?>",
        "updated_at": "<?=$NHQ->getUsers('lastdate');?>",
        "website": [],
        "avatar": "<?=$NHQ->site('logo_user');?><?=$NHQ->getUsers('username');?>",
        "isAdmin": "<?php if($NHQ->getUsers('capbac') == 3){echo 'true';}else{echo 'false';}?>",
        "position": "<?=levelmem($NHQ->getUsers('capbac'));?>",
        "levelMember": "<?=levelmem($NHQ->getUsers('capbac'));?>",
        "codeRecharge": "<?=$NHQ->getUsers('cuphap');?>",
        "loaded": "<?=$NHQ->getUsers('tongnap');?>",
        "pepper": "<?=$NHQ->getUsers('tongtru');?>",
        "statusAccount": "<?php if($NHQ->getUsers('banned') == 0){echo 'Active';}else{echo 'Block';}?>"
    };
    const setting = {
        "title": "Hệ thống dịch vụ mạng xã hội Facebook | Instagram | Youtube | Tiktok | <?=$NHQ->site('ten_website');?>",
        "domain": "<?=$NHQ->site('ten_website');?>",
        "keyword": "like, sub, share, vip like, buff m\u1eaft, t\u0103ng follow, mua like, mua sub, sub r\u1ebb, hack like, hack sub, hack follow, t\u0103ng like, t\u0103ng follow, t\u0103ng share, t\u0103ng comment, ch\u00e9o like, ch\u00e9o sub, shop sub",
        "fullname_admin": "<?=$NHQ->site('full_name_admin');?>",
        "fb_admin": "<?=$NHQ->site('facebook');?>",
        "zalo_admin": "https:\/\/zalo.me\/<?=$NHQ->site('phone_zalo');?>",
        "modal_system": "H\u1ec7 th\u1ed1ng ho\u00e0n to\u00e0n t\u1ef1 \u0111\u1ed9ng h\u00f3a 100%, t\u1ef1 \u0111\u1ed9ng n\u1ea1p ti\u1ec1n (n\u1ea1p \u00edt nh\u1ea5t 10k, n\u1ea1p sai n\u1ed9i dung tr\u1eeb 10% ph\u00ed). Ch\u00fac b\u1ea1n s\u1eed d\u1ee5ng d\u1ecbch v\u1ee5 vui v\u1ebb nh\u00e9."
    };
</script>
<!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
<body class="">
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <div class="wrapper">
        <?php require('config/nav.php');?>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between"><i class="ri-menu-line wrapper-menu"></i>
                        <a href="<?=BASE_URL('home');?>" class="header-logo"><img src="https://i.imgur.com/JnXYaPq.png" class="img-fluid rounded-normal light-logo" alt="logo"><img src="https://i.imgur.com/JnXYaPq.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                        </a>
                    </div>
                    <div class="iq-search-bar device-search">
                        <form>
                            <div class="input-prepend input-append">
                                <div class="btn-group">
                                    <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                                        <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Tìm kiếm ..."><span class="search-replace"></span><a class="search-link" href="#"><i class="ri-search-line"></i></a><span class="caret"></span>
                                    </label>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">
                                                <div class="item"><i class="far fa-file-alt bg-primary"></i>Tài liệu Api </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                    <div class="d-flex align-items-center">
                        <div class="change-mode">
                            <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                <div class="custom-switch-inner">
                                    <p class="mb-0"></p>
                                    <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                                    <label class="custom-control-label" for="dark-mode" data-mode="toggle"><span class="switch-icon-left"><i class="a-left"></i></span><span class="switch-icon-right"><i class="a-right"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation"><i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon search-content"><a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-search-line"></i></a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                        <form action="#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                                <input type="text" class="text search-input font-size-12" placeholder="type here to search."><a href="#" class="search-link"><i class="las la-search"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown"><a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-question-line"></i></a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton01">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="p-3"><a href="<?=$NHQ->site('facebook');?>" target="_blank" class="iq-sub-card"><i class="las la-info-circle"></i>Facebook Admin</a><a href="https://zalo.me/<?=$NHQ->site('phone_zalo');?>" target="_blank" class="iq-sub-card"><i class="las la-info-circle"></i>Zalo Admin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="line-height"><img src="<?=$NHQ->site('logo_user');?><?=$NHQ->getUsers('username');?>" alt="" class="caption bg-primary ">
                                        </div>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                                <div class="header-title">
                                                    <h4 class="card-title mb-0">Tài khoản</h4>
                                                </div>
                                                <div class="close-data text-right badge badge-primary cursor-pointer "><i class="ri-close-fill"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="profile-header">
                                                    <div class="cover-container text-center">
                                                        <div class="mx-auto d-block"><img src="<?=$NHQ->site('logo_user');?><?=$NHQ->getUsers('username');?>" alt="" class="rounded-circle profile-icon bg-primary ">
                                                        </div>
                                                        <div class="profile-detail mt-3">
                                                            <h5><a><?=$NHQ->getUsers('username');?></a></h5>
                                                            <p><a><?=levelmem($NHQ->getUsers('capbac'));?></a>
                                                            </p>
                                                            </p>
                                                        </div><a href="<?=BASE_URL('auth/logout');?>" class="btn btn-primary">Đăng xuất</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb iq-bg-danger">
                                <li class="breadcrumb-item"><a href="<?=BASE_URL('home');?>" class="text-danger"><i class="ri-home-4-line mr-1 float-left"></i><?=$NHQ->site('ten_website');?></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
                            </ol>
                        </nav>
                    </div> 
                     <!--- end row -->
<div class="row">
                    <div class="col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body text-center">
                                <svg width="36" height="48" viewBox="0 0 36 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.10495 33.9964C8.29026 33.1817 8.71495 33.4114 6.74995 32.8855C5.85838 32.6464 5.07463 32.1871 4.36588 31.6367L0.112441 42.0655C-0.299122 43.0752 0.469629 44.1721 1.559 44.1308L6.4987 43.9424L9.8962 47.5311C10.6462 48.3224 11.9624 48.0758 12.374 47.0661L17.2537 35.1017C16.2375 35.668 15.1096 35.9999 13.9434 35.9999C12.1153 35.9999 10.3978 35.2883 9.10495 33.9964V33.9964ZM35.8875 42.0655L31.634 31.6367C30.9253 32.188 30.1415 32.6464 29.25 32.8855C27.2746 33.4142 27.7078 33.1836 26.895 33.9964C25.6021 35.2883 23.8837 35.9999 22.0556 35.9999C20.8893 35.9999 19.7615 35.6671 18.7453 35.1017L23.625 47.0661C24.0365 48.0758 25.3537 48.3224 26.1028 47.5311L29.5012 43.9424L34.4409 44.1308C35.5303 44.1721 36.299 43.0742 35.8875 42.0655V42.0655ZM24.6562 31.8749C26.0887 30.4171 26.2528 30.5427 28.2928 29.9867C29.595 29.6314 30.6131 28.5955 30.9618 27.2699C31.6631 24.6074 31.4812 24.9289 33.3946 22.9808C34.3481 22.0105 34.7203 20.5958 34.3715 19.2702C33.6712 16.6096 33.6703 16.9808 34.3715 14.3174C34.7203 12.9917 34.3481 11.5771 33.3946 10.6067C31.4812 8.65862 31.6631 8.97925 30.9618 6.31768C30.6131 4.99206 29.595 3.95612 28.2928 3.60081C25.679 2.88737 25.994 3.07393 24.0787 1.12487C23.1253 0.154558 21.735 -0.225129 20.4328 0.130183C17.82 0.842683 18.1846 0.843621 15.5671 0.130183C14.2649 -0.225129 12.8746 0.153621 11.9212 1.12487C10.0078 3.073 10.3228 2.88737 7.70807 3.60081C6.40588 3.95612 5.38776 4.99206 5.03901 6.31768C4.33869 8.97925 4.51963 8.65862 2.60619 10.6067C1.65275 11.5771 1.27963 12.9917 1.62932 14.3174C2.32963 16.9761 2.33057 16.6049 1.62932 19.2692C1.28057 20.5949 1.65275 22.0096 2.60619 22.9808C4.51963 24.9289 4.33776 24.6074 5.03901 27.2699C5.38776 28.5955 6.40588 29.6314 7.70807 29.9867C9.8062 30.5586 9.96276 30.4686 11.3437 31.8749C12.584 33.1377 14.5162 33.3636 16.0068 32.4205C16.6029 32.0421 17.2944 31.8411 18.0004 31.8411C18.7065 31.8411 19.3979 32.0421 19.994 32.4205C21.4837 33.3636 23.4159 33.1377 24.6562 31.8749ZM9.15557 16.4961C9.15557 11.5246 13.1156 7.49425 18 7.49425C22.8843 7.49425 26.8443 11.5246 26.8443 16.4961C26.8443 21.4677 22.8843 25.498 18 25.498C13.1156 25.498 9.15557 21.4677 9.15557 16.4961V16.4961Z" fill="#0abde3"></path>
                                </svg>
<h6>Số dư : <h9 class="mb-2 mt-3 text-primary"><?=format_money($NHQ->getUsers('money'));?> <sup>coin</sup></h4>
<hr>
<h6>Tổng nạp : <h9 class="mb-2 mt-3 text-primary"><?=format_money($NHQ->getUsers('tongnap'));?> <sup>coin</sup></h4>
<hr>
<h6>Tổng tiêu : <h9 class="mb-2 mt-3 text-primary"><?=format_money($NHQ->getUsers('tongtru'));?> <sup>coin</sup></h4> 
<hr>
<h6>Cấp Độ : <h9 class="mb-2 mt-3 text-primary"><?=levelmem($NHQ->getUsers('capbac'));?> </h4>                               
                                </div>
                                 </div>
                                  </div>                              
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-block card-stretch card-height iq-welcome page_speed_954296520">
                            <div class="card-body property2-content">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="col-lg-6 col-sm-6 p-0">
                                        <h3 class="mb-3">Xin chào <?=$NHQ->getUsers('username');?>!</h3>
                                        <p class="mb-5">Cảm ơn bạn đã sử dụng dịch vụ của hệ thống chúng tôi, chúc bạn có 1 ngày làm việc vui vẻ, hiệu quả. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Nâng cấp bậc</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-inline p-0 mb-0 row align-items-center">
                                    <li class="col-lg-6 col-sm-6 mb-3 mb-sm-0">
                                        <a href="https://likemxh.net/profile/upgrade-level">
                                            <div class="page_speed_1542575737 p-2 text-center border rounded">
                                                <div><img src="<?=BASE_URL('/svg/collaborators.svg');?>" alt="image2" class="page_speed_68537186 img-fluid mb-1">
                                                </div>
                                                <p class="mb-0">Cộng tác viên</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="col-lg-6 col-sm-6">
                                        <a href="https://likemxh.net/profile/upgrade-level">
                                            <div class="page_speed_1542575737 p-2 text-center border rounded">
                                                <div><img src="<?=BASE_URL('/svg/hiring.svg');?>" alt="image2" class="page_speed_68537186 img-fluid mb-1">
                                                </div>
                                                <p class="mb-0">Đại lý</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="row"> <div class="col-md-6"> <div class="card page_speed_1136768789"> <a href="/profile/info"> <div class="card-body box-option"> <div class="image"> <svg data-v-58130f42="" xml:space="preserve" viewBox="0 0 36 36" y="0" x="0" height="70" width="70" version="1.1" xmlns:svgjs="http://svgjs.com/svgjs" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" class="profile-image page_speed_662547797"><g xmlns="http://www.w3.org/2000/svg"><path xmlns="http://www.w3.org/2000/svg" d="m34.904 20.355c-3.782-5.791-3.38-11.727-5.203-14.518s-7.256-7.603-20.093.782-9.572 17.5-7.566 20.569c9.388 14.372 39.561 3.423 32.862-6.833z" fill="#efefef" data-original="#efefef" class=""></path><circle xmlns="http://www.w3.org/2000/svg" cx="15" cy="12" fill="#4a97f7" r="4.25" data-original="#2fdf84" class=" "></circle><path xmlns="http://www.w3.org/2000/svg" d="m10.75 19.75h8.5c2.209 0 4 1.791 4 4v3.5h-16.5v-3.5c0-2.209 1.791-4 4-4z" fill="#4a97f7" data-original="#2fdf84" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m13 12c0-1.955 1.328-3.585 3.125-4.08-.361-.1-.733-.17-1.125-.17-2.347 0-4.25 1.903-4.25 4.25s1.903 4.25 4.25 4.25c.392 0 .764-.07 1.125-.17-1.797-.495-3.125-2.125-3.125-4.08z" fill="#4a97f7" data-original="#00b871" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m13 19.75h-2.25c-2.209 0-4 1.791-4 4v3.5h2.25v-3.5c0-2.209 1.791-4 4-4z" fill="#4a97f7" data-original="#00b871" class=" "></path><g xmlns="http://www.w3.org/2000/svg" fill="#a4afc1"><path d="m22.618 3.26h1v2h-1z" transform="matrix(.707 -.707 .707 .707 3.757 17.591)" fill="#a4afc1" data-original="#a4afc1" class=" "></path><path d="m26.684 7.326h1v2h-1z" transform="matrix(.707 -.707 .707 .707 2.075 21.661)" fill="#a4afc1" data-original="#a4afc1" class=" "></path><path d="m21.942 7.826h2v1h-2z" transform="matrix(.707 -.707 .707 .707 .832 18.661)" fill="#a4afc1" data-original="#a4afc1" class=" "></path><path d="m26.007 3.76h2v1h-2z" transform="matrix(.707 -.707 .707 .707 4.898 20.345)" fill="#a4afc1" data-original="#a4afc1" class=" "></path></g><path xmlns="http://www.w3.org/2000/svg" d="m15 17c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-8.5c-1.93 0-3.5 1.57-3.5 3.5s1.57 3.5 3.5 3.5 3.5-1.57 3.5-3.5-1.57-3.5-3.5-3.5z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m23.25 28h-16.5c-.414 0-.75-.336-.75-.75v-3.5c0-2.619 2.131-4.75 4.75-4.75h8.5c2.619 0 4.75 2.131 4.75 4.75v3.5c0 .414-.336.75-.75.75zm-15.75-1.5h15v-2.75c0-1.792-1.458-3.25-3.25-3.25h-8.5c-1.792 0-3.25 1.458-3.25 3.25z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m20.75 15.75h8.5v1.5h-8.5z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m25.78 21.03-1.06-1.06 3.47-3.47-3.47-3.47 1.061-1.061 4 4c.293.293.293.768 0 1.061z" fill="#000000" data-original="#000000" class=""></path></g></svg> </div> <div class="info"> <span class="text"> Tài khoản của tôi <i class="fa fa-angle-double-right"></i></span> </div> </div> </a> </div> </div> <div class="col-md-6"> <div class="card page_speed_1136768789"> <a href="/recharge/banking"> <div class="card-body box-option"> <div class="image"> <svg data-v-58130f42="" xml:space="preserve" viewBox="0 0 36 36" y="0" x="0" height="70" width="70" version="1.1" xmlns:svgjs="http://svgjs.com/svgjs" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" alt="" class="profile-image page_speed_662547797"><g xmlns="http://www.w3.org/2000/svg"><g xmlns="http://www.w3.org/2000/svg" id="Layer_2"><g><path d="m34.928 20.639c-3.693-5.848-3.199-11.778-4.979-14.596s-7.138-7.715-20.103.472-9.84 17.35-7.882 20.45c9.166 14.516 39.504 4.031 32.964-6.326z" fill="#efefef" data-original="#efefef" class=""></path></g></g><g xmlns="http://www.w3.org/2000/svg" id="color"><g><path d="m18 17c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3zm0-4.5c-.827 0-1.5.673-1.5 1.5s.673 1.5 1.5 1.5 1.5-.673 1.5-1.5-.673-1.5-1.5-1.5z" fill="#000000" data-original="#000000" class=""></path></g><g><g><path d="m9.445 29.033h1v2h-1z" fill="#a4afc1" transform="matrix(.707 -.707 .707 .707 -18.324 15.828)" data-original="#a4afc1" class=" "></path></g><g><path d="m5.379 24.967h1v2h-1z" fill="#a4afc1" transform="matrix(.707 -.707 .707 .707 -16.64 11.762)" data-original="#a4afc1" class=" "></path></g><g><path d="m9.121 25.467h2v1h-2z" fill="#a4afc1" transform="matrix(.707 -.707 .707 .707 -15.397 14.762)" data-original="#a4afc1" class=" "></path></g><g><path d="m5.055 29.533h2v1h-2z" fill="#a4afc1" transform="matrix(.707 -.707 .707 .707 -19.463 13.078)" data-original="#a4afc1" class=" "></path></g></g><g><path d="m31 6.5c-.827 0-1.5-.673-1.5-1.5s.673-1.5 1.5-1.5 1.5.673 1.5 1.5-.673 1.5-1.5 1.5zm0-2c-.276 0-.5.225-.5.5s.224.5.5.5.5-.225.5-.5-.224-.5-.5-.5z" fill="#a4afc1" data-original="#a4afc1" class=" "></path></g><g><path d="m16.31 21.25h-7.56c-1.1 0-2-.9-2-2v-10.5c0-1.1.9-2 2-2h18.5c1.1 0 2 .9 2 2v6.75 3.75c0 1.105-.895 2-2 2z" fill="#4a97f7" data-original="#2fdf84" class=" "></path></g><g><path d="m9 19.25v-10.5c0-1.1.9-2 2-2h-2.25c-1.1 0-2 .9-2 2v10.5c0 1.1.9 2 2 2h2.25c-1.1 0-2-.9-2-2z" fill="#4a97f7" data-original="#00b871" class=" "></path></g><g><circle cx="18" cy="14" fill="#f3f3f1" r="2.25" data-original="#f3f3f1" class=""></circle></g><g><path d="m29.247 21.003v6c0 1.24-2.57 2.25-5.75 2.25-3.17 0-5.75-1.01-5.75-2.25v-6c0-1.25 2.58-2.25 5.75-2.25 3.18 0 5.75 1 5.75 2.25z" fill="#f3f3f1" data-original="#f3f3f1" class=""></path></g><g><path d="m19.997 27.003v-6c0-1.098 1.992-2.003 4.626-2.207-.364-.028-.741-.043-1.126-.043-3.17 0-5.75 1-5.75 2.25v6c0 1.24 2.58 2.25 5.75 2.25.386 0 .762-.016 1.126-.044-2.634-.205-4.626-1.116-4.626-2.206z" fill="#d5dbe1" data-original="#d5dbe1" class=" "></path></g></g><g xmlns="http://www.w3.org/2000/svg" id="line"><g><path d="m15.31 22h-6.56c-1.516 0-2.75-1.233-2.75-2.75v-10.5c0-1.516 1.234-2.75 2.75-2.75h18.5c1.517 0 2.75 1.234 2.75 2.75v8.5h-1.5v-8.5c0-.689-.561-1.25-1.25-1.25h-18.5c-.689 0-1.25.561-1.25 1.25v10.5c0 .689.561 1.25 1.25 1.25h6.56z" fill="#000000" data-original="#000000" class=""></path></g><g><path d="m9.75 9h2.5v1.5h-2.5z" fill="#000000" data-original="#000000" class=""></path></g><g><path d="m18 17c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3zm0-4.5c-.827 0-1.5.673-1.5 1.5s.673 1.5 1.5 1.5 1.5-.673 1.5-1.5-.673-1.5-1.5-1.5z" fill="#000000" data-original="#000000" class=""></path></g><g><path d="m28.5 21h1.5v6h-1.5z" fill="#000000" data-original="#000000" class=""></path></g><g><path d="m17 21h1.5v6h-1.5z" fill="#000000" data-original="#000000" class=""></path></g><g><path d="m23.5 24c-3.23 0-6.5-1.03-6.5-3s3.27-3 6.5-3 6.5 1.03 6.5 3-3.27 3-6.5 3zm0-4.5c-3.299 0-5 1.052-5 1.5s1.701 1.5 5 1.5 5-1.052 5-1.5-1.701-1.5-5-1.5z" fill="#000000" data-original="#000000" class=""></path></g><g><path d="m23.5 30c-3.23 0-6.5-1.03-6.5-3h1.5c0 .448 1.701 1.5 5 1.5s5-1.052 5-1.5h1.5c0 1.97-3.27 3-6.5 3z" fill="#000000" data-original="#000000" class=""></path></g><g><path d="m23.5 27c-3.23 0-6.5-1.03-6.5-3h1.5c0 .448 1.701 1.5 5 1.5s5-1.052 5-1.5h1.5c0 1.97-3.27 3-6.5 3z" fill="#000000" data-original="#000000" class=""></path></g></g></g></svg> </div> <div class="info"> <span class="text"> Nạp tiền vào tài khoản <i class="fa fa-angle-double-right"></i></span> </div> </div> </a> </div> </div> <div class="col-md-6"> <div class="card page_speed_1136768789"> <a href="/profile/statistical"> <div class="card-body box-option"> <div class="image"> <svg data-v-58130f42="" xml:space="preserve" viewBox="0 0 36 36" y="0" x="0" height="70" width="70" version="1.1" xmlns:svgjs="http://svgjs.com/svgjs" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" alt="" class="profile-image page_speed_662547797"><g xmlns="http://www.w3.org/2000/svg"><path xmlns="http://www.w3.org/2000/svg" d="m8.377 31.833c6.917 0 11.667 3.583 15 3.583s10.333-1.916 10.333-17.249-9.417-17.584-13.083-17.584c-17.167 0-24.5 31.25-12.25 31.25z" fill="#efefef" data-original="#efefef" class=""></path><g xmlns="http://www.w3.org/2000/svg" fill="#a4afc1"><path d="m7.033 2.467h2v1h-2z" transform="matrix(.707 -.707 .707 .707 .255 6.549)" fill="#a4afc1" data-original="#a4afc1" class=" "></path><path d="m2.967 6.533h2v1h-2z" transform="matrix(.707 -.707 .707 .707 -3.811 4.865)" fill="#a4afc1" data-original="#a4afc1" class=" "></path><path d="m3.644 1.967h1v2h-1z" transform="matrix(.707 -.707 .707 .707 -.884 3.799)" fill="#a4afc1" data-original="#a4afc1" class=" "></path></g><path xmlns="http://www.w3.org/2000/svg" d="m24.25 10.75h5v-1.5c0-1.381-1.119-2.5-2.5-2.5-1.381 0-2.5 1.119-2.5 2.5z" fill="#4a97f7" data-original="#2fdf84" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m24.25 25.54v-16.29c0-1.381 1.119-2.5 2.5-2.5h-15c-1.657 0-3 1.343-3 3v15.792z" fill="#f3f3f1" data-original="#f3f3f1" class=" "></path><circle xmlns="http://www.w3.org/2000/svg" cx="23.5" cy="23.5" fill="#4a97f7" r="5.75" data-original="#2fdf84" class=" "></circle><path xmlns="http://www.w3.org/2000/svg" d="m24.5 24.25-17.75.04v2.96c0 1.1.9 2 2 2h15.75z" fill="#4a97f7" data-original="#2fdf84" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m27.875 7.029c-.34-.172-.718-.279-1.125-.279-1.381 0-2.5 1.119-2.5 2.5v1.5h2.25v-1.5c0-.974.562-1.808 1.375-2.221z" fill="#4a97f7" data-original="#00b871" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m20 23.5c0-2.79 1.988-5.115 4.625-5.638-.364-.072-.74-.112-1.125-.112-3.176 0-5.75 2.574-5.75 5.75s2.574 5.75 5.75 5.75c.385 0 .761-.039 1.125-.112-2.637-.523-4.625-2.848-4.625-5.638z" fill="#4a97f7" data-original="#00b871" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m9 27.25v-2.96l15.5-.035v-.005l-17.75.04v2.96c0 1.1.9 2 2 2h2.25c-1.1 0-2-.9-2-2z" fill="#4a97f7" data-original="#00b871" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m11 9.75c0-1.657 1.343-3 3-3h-2.25c-1.657 0-3 1.343-3 3v14.542h2.25z" fill="#d5dbe1" data-original="#d5dbe1" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m23.5 30c-3.584 0-6.5-2.916-6.5-6.5s2.916-6.5 6.5-6.5 6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5zm0-11.5c-2.757 0-5 2.243-5 5s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m25.427 26.481-2.396-1.917c-.178-.142-.281-.357-.281-.585v-3.354h1.5v2.994l2.115 1.692z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m11.05 18.5h5.56v1.5h-5.56z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m11.05 14.5h10.01v1.5h-10.01z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m11.053 10.5h10.947v1.5h-10.947z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m9.5 24.292h-1.5v-14.542c0-2.068 1.682-3.75 3.75-3.75h15v1.5h-15c-1.241 0-2.25 1.009-2.25 2.25z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m29.25 11.5h-5c-.414 0-.75-.336-.75-.75v-1.5c0-1.792 1.458-3.25 3.25-3.25s3.25 1.458 3.25 3.25v1.5c0 .414-.336.75-.75.75zm-4.25-1.5h3.5v-.75c0-.965-.785-1.75-1.75-1.75s-1.75.785-1.75 1.75z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m16.92 30h-8.17c-1.517 0-2.75-1.233-2.75-2.75v-2.96c0-.414.336-.75.75-.75h8.04v1.5h-7.29v2.21c0 .689.561 1.25 1.25 1.25h8.17z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m23.5 10.75h1.5v4.04h-1.5z" fill="#000000" data-original="#000000" class=""></path></g></svg> </div> <div class="info"> <span class="text"> Thống kê dòng tiền <i class="fa fa-angle-double-right"></i></span> </div> </div> </a> </div> </div> <div class="col-md-6"> <div class="card page_speed_1136768789"> <a href="/website/create"> <div class="card-body box-option"> <div class="image"> <svg data-v-58130f42="" xml:space="preserve" viewBox="0 0 36 36" y="0" x="0" height="70" width="70" version="1.1" xmlns:svgjs="http://svgjs.com/svgjs" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" alt="" class="profile-image page_speed_662547797"><g xmlns="http://www.w3.org/2000/svg"><path xmlns="http://www.w3.org/2000/svg" d="m4.167 27.623c0-6.917-3.583-11.667-3.583-15s1.916-10.333 17.249-10.333 17.583 9.417 17.583 13.083c.001 17.167-31.249 24.5-31.249 12.25z" fill="#efefef" data-original="#efefef" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m30.5 6c-.827 0-1.5-.673-1.5-1.5s.673-1.5 1.5-1.5 1.5.673 1.5 1.5-.673 1.5-1.5 1.5zm0-2c-.276 0-.5.224-.5.5s.224.5.5.5.5-.224.5-.5-.224-.5-.5-.5z" fill="#a4afc1" data-original="#a4afc1" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m26.25 29.25c-1.66 0-3-1.34-3-3v-16.5-1c0-1.1-.9-2-2-2h-12.5c-1.1 0-2 .9-2 2v17.5c0 1.66 1.34 3 3 3h16.5.25z" fill="#f3f3f1" data-original="#f3f3f1" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m26.25 29.25c.83 0 1.58-.33 2.12-.88.55-.54.88-1.29.88-2.12v-14.5c0-1.1-.9-2-2-2h-4v16.5c0 1.66 1.34 3 3 3h.25z" fill="#4a97f7" data-original="#2fdf84" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m9.75 9.75h4.5v4.5h-4.5z" fill="#4a97f7" data-original="#2fdf84" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m25.5 26.25v-16.5h-2.25v16.5c0 1.66 1.34 3 3 3 .4 0 .779-.08 1.127-.221-1.101-.444-1.877-1.517-1.877-2.779z" fill="#4a97f7" data-original="#00b871" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m9.75 9.75h2.25v4.5h-2.25z" fill="#4a97f7" data-original="#00b871" class=" "></path><path xmlns="http://www.w3.org/2000/svg" d="m9 26.25v-17.5c0-1.1.9-2 2-2h-2.25c-1.1 0-2 .9-2 2v17.5c0 1.66 1.34 3 3 3h2.25c-1.66 0-3-1.34-3-3z" fill="#d5dbe1" data-original="#d5dbe1" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m27.25 30h-17.5c-2.068 0-3.75-1.682-3.75-3.75v-17.5c0-1.517 1.233-2.75 2.75-2.75h12.5c1.517 0 2.75 1.233 2.75 2.75v.25h3.25c1.517 0 2.75 1.233 2.75 2.75v14.5c0 1.722-1.166 3.176-2.75 3.615zm-3.25-19.5v15.75c0 1.241 1.009 2.25 2.25 2.25s2.25-1.009 2.25-2.25v-14.5c0-.689-.561-1.25-1.25-1.25zm-15.25-3c-.689 0-1.25.561-1.25 1.25v17.5c0 1.241 1.009 2.25 2.25 2.25h13.502c-.472-.627-.752-1.407-.752-2.25v-17.5c0-.689-.561-1.25-1.25-1.25z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m14.25 15h-4.5c-.414 0-.75-.336-.75-.75v-4.5c0-.414.336-.75.75-.75h4.5c.414 0 .75.336.75.75v4.5c0 .414-.336.75-.75.75zm-3.75-1.5h3v-3h-3z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m17 10h4v1.5h-4z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m17 13h4v1.5h-4z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m9 17h12v1.5h-12z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m9 20.75h12v1.5h-12z" fill="#000000" data-original="#000000" class=""></path><path xmlns="http://www.w3.org/2000/svg" d="m9 24.5h12v1.5h-12z" fill="#000000" data-original="#000000" class=""></path></g></svg> </div> <div class="info"> <span class="text"> Tạo website riêng <i class="fa fa-angle-double-right"></i></span> </div> </div> </a> </div> </div> </div>
<!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
     <div class="card mb-3">
<div class="card-body">
<h6 class="card-title mb-3">Thông báo gần đây <small class="text-danger">(nên đọc thông báo để cập
nhật
tin tức mới
nhất tránh lỗi hoặc mất tiền!)</small></h6>
<ul class="list-inline p-0 m-0 list-notification">
<li class="d-flex align-items-center mb-3 bg-success mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Mọi người tham gia kênh Telegram thông báo chính thức của
hệ
thống để cập nhật tin tức sớm nhất <a href="https://t.me/test" target="_blank" rel="noopener noreferrer">https://t.me/test</a>.</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Update thêm like Instagram sv2 rate chỉ 3đ.</p>
</div>
</li>
 <li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Giảm giá dịch vụ Facebook buff mắt live chỉ còn 1đ</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Hiện tại hệ thống khá nhiều đơn dẫn đến tình trạng sub chậm hơn, chạy vãn đơn sẽ ổn định lại nhé!</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Đầu tháng , hệ thống giảm giá Facebook sub sale sv2 còn 6đ, đến ngày 2/10</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">giảm giá các dịch vụ instagram, chất lượng vẫn ngon nhất không đổi.</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Nạp tiền bằng thẻ cào đã hoạt động trở lại!</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Auto Mb Bank đã update có thể nạp từ các bank khác sang</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Auto Mb Bank đã hoạt động lại, ae nạp ok rồi nhé</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">mb bank đang delay nha ae, mình gọi bên ngân hàng họ báo có thể đến ngày mai mới có lịch sử, ae nạp qua momo nhé, hết delay sẽ tự động + lại tiền cho ae</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Update dịch vụ bán tài khoản, clone, via, ... giá rẻ!</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Update Facebook vip like profile sv4 cho ae.</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
 <img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Update gói Facebook like post sale sv3 tốc độ nhanh, max 100k cho ae.</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Mở thêm các dịch vụ free cho ae ctv và dly.</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Update thêm dịch vụ Tiktok sub [sv1, sv2, sv3], mời ae sử dụng nhé!</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Update thêm dịch vụ Tiktok like (thả tim), mời ae sử dụng nhé!</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Momo mới: 0364339566 - TRAN THI HAI YEN, ae chú ý nạp tiền</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
 </div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Hệ thống đã tiến hành dọn dẹp data, các đơn đã hoàn thành sẽ bị xóa!</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Update thêm dịch vụ Facebook sub/follow sale sv4 giá chỉ 6đ.</p>
</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">

</div>
</li>
<li class="d-flex align-items-center mb-3 bg-info mr-2 page_speed_737518194">
<div class="profile-icon iq-icon-box">
<img class="page_speed_1541212821" height="30px;" src="https://subgiare.vn/assets/images/icon/notification.svg" alt="">
</div>
<div class="pl-3">
<p class="h5 mb-0 font-size-16">Ra mắt dịch vụ Viplike profile Facebook máy chủ 1, 2, 3 có AVT, tốc độ ổn định ?</p>

</div>
</li>
</ul>
</div>
</div>
<div class="col-md-4"> <div class="card"> <div class="card-header d-flex justify-content-between"> <div class="header-title"> <h4 class="card-title">Liên hệ hỗ trợ</h4> </div> </div> <div class="card-body"> <form> <div class="form-group text-center"> <div class="d-flex justify-content-center"> <div class="crm-profile-img-edit position-relative"><img class="crm-profile-pic rounded-circle avatar-100" src="https://i.imgur.com/K42Hz4c.png" alt="profile-pic"> </div> </div> <div class="img-extension mt-3"> <div class="d-inline-block align-items-center"><span>Lê Quốc Đạt</span> </div> </div> </div> <div class="form-group"> <label for="">Facebook Url:</label> <input type="text" class="form-control" value="https://www.facebook.com/lequocdat2076"></div> <div class="form-group"> <label for="">Zalo Url:</label> <input type="text" class="form-control" value="https://zalo.me/0777488444" readonly=""> </div> </form> </div> </div> </div> </div>
                           
                    <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                <div class="modal fade" id="modalSystem" tabindex="-1" role="dialog" aria-labelledby="modalSystemLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalSystemLabel">Thông báo hệ thống</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><?=$NHQ->site('thongbao');?>.</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Đóng</button>
                                <button class="btn btn-primary btn-sm" type="button" onclick="if (!window.__cfRLUnblockHandlers) return false; closeModalSystem();" data-cf-modified-b9e3e84309a92aaf852234bf-="">Tôi đã đọc</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
<?php require('config/end.php');?>