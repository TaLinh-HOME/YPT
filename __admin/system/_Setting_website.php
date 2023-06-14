<?php require('../../config/head.php'); if(empty($_SESSION['username'])){header('Location: /auth/login');exit;}; CheckAdmin();?>
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

<body class="">
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <div class="wrapper">
        <?php require('../../config/nav.php');?>
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
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb iq-bg-danger">
                                <li class="breadcrumb-item"><a href="<?=BASE_URL('home');?>" class="text-danger"><i class="ri-home-4-line mr-1 float-left"></i><?=$NHQ->site('ten_website');?></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cài đặt website</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                
                                <form submit-ajax="nhq" action="<?=BASE_URL('api/admin/setting/website/edit');?>" method="post" api_token="<?=$NHQ->getUsers('token');?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="">Link website</label>
                                                <input type="text" class="form-control" value="<?=$NHQ->site('base_url');?>" name="baseurl"></input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="">Tên website:</label>
                                                <input type="text" class="form-control" name="tenwebsite" value="<?=$NHQ->site('ten_website');?>" require>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="">Rate CTV:</label>
                                                <input type="text" class="form-control" value="<?=$NHQ->site('rate_ctv');?>" name="ratectv">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="">Rate Đại Lý:</label>
                                                <input type="text" class="form-control" name="ratedaily" value="<?=$NHQ->site('rate_daily');?>" require>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mr-auto ml-auto pt-3">
                                            <button type="submit" class="btn btn-primary btn-block"><em class="fa fa-paper-plane"></em> Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php require('../../config/end.php');?>