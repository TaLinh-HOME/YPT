<div class="iq-sidebar sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="<?=BASE_URL('home');?>" class="header-logo" style="text-transform: uppercase; font-size:30px;">
                <img src="https://i.imgur.com/JnXYaPq.png" class="img-fluid rounded-normal light-logo" alt="logo">
                <img src="https://i.imgur.com/JnXYaPq.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                </a>
                <div class="iq-menu-bt-sidebar"><i class="las la-bars wrapper-menu"></i>
                </div>
            </div>
            <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="active"><a href="<?=BASE_URL('home');?>" class=""><i class="las la-home iq-arrow-left"></i><span>Trang chủ</span></a>
                        </li>
                        <li class=""><a href="<?=BASE_URL('profile/info');?>" class=""><i class="las la-user iq-arrow-left"></i><span>Tài khoản của tôi</span></a>
                        </li>
                        <li class=""><a href="<?=BASE_URL('recharge/banking');?>" class=""><i class="las la-credit-card"></i><span>Nạp tiền vào tài khoản</span></a>
                        </li>
                        <li class=""><a href="<?=BASE_URL('profile/upgrade-level');?>" class=""><i class="las la-trophy"></i><span>Nâng cấp bậc</span></a>
                        </li>
                        <li class=""><a href="<?=BASE_URL('website/create')?>" class=""><i class="las la-globe"></i><span>Tạo website riêng</span></a>
                        </li>
                        <li class=""><a href="<?=BASE_URL('profile/statistical');?>" class=""><i class="las la-chart-pie"></i><span>Thống kê dòng tiền</span></a>
                        </li>
                          <li class=""><a href="https://viaquare.com/" class=""><i class="las la-user iq-arrow-left"></i><span>Dịch Vụ Tài Khoản</span></a>
                        </li>
                        <!-- Design by Nguyễn Hải Quang/facebook: https://facebook.com/quang.hai.uda77/zalo: 0359917579/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                        <li class=" "><a href="#serviceFacebook" class="collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-facebook"></i><span>Dịch vụ Facebook</span><i class="las la-angle-right iq-arrow-right arrow-active"></i><i class="las la-angle-down iq-arrow-right arrow-hover"></i></a>
                            <ul id="serviceFacebook" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class=""><a href="<?=BASE_URL('service/bot/list');?>"><i class="fa fa-toggle-on text-success"></i><span>Bot Tuong Tac</span></a>
                                </li>
                                <li class=""><a href="<?=BASE_URL('service/like-post-sale/buy');?>"><i class="fa fa-toggle-on text-success"></i><span>Tăng like bài viết (sale)</span></a>
                                </li>
                                <li class=""><a href="<?=BASE_URL('service/like-post-speed/buy');?>"><i class="fa fa-toggle-on text-success"></i><span>Tăng like bài viết (speed)</span></a>
                                </li>
                                <li class=""><a href="<?=BASE_URL('service/comment-sale/buy');?>"><i class="fa fa-toggle-on text-success"></i><span>Tăng bình luận (sale)</span></a>
                                </li>
                                <li class=""><a href="<?=BASE_URL('service/sub-sale/buy');?>"><i class="fa fa-toggle-on text-success"></i><span>Tăng sub/follow (sale)</span></a>
                                </li>
                                <li class=""><a href="<?=BASE_URL('service/sub-speed/buy');?>"><i class="fa fa-toggle-on text-success"></i><span>Tăng sub/follow (speed)</span></a>
                                </li>
                                <li class=""><a href="<?=BASE_URL('service/like-page-sale/buy');?>"><i class="fa fa-toggle-on text-success"></i><span>Tăng like/follow page (sale)</span></a>
                                </li>
                                <li class=""><a href="<?=BASE_URL('service/eyelive/buy');?>"><i class="fa fa-toggle-on text-success"></i><span>Tăng mắt live</span></a>
                                </li>
                                <li class=""><a href="<?=BASE_URL('service/eyevideo/buy');?>"><i class="fa fa-toggle-on text-success"></i><span>Tăng view video</span></a>
                                </li>
                            </ul>
                        </li>
                        <?php if($NHQ->getUsers('level') == 'admin' && $NHQ->getUsers('capbac') == 3){?>
                        <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                        <li class=" "><a href="#websiteApi" class="collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-tools"></i><span>Quản lý website</span><i class="las la-angle-right iq-arrow-right arrow-active"></i><i class="las la-angle-down iq-arrow-right arrow-hover"></i></a>
                            <ul id="websiteApi" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class=" "><a href="<?=BASE_URL('admin/user/list');?>"><i class="las la-user"></i><span>Quản lý thành viên</span></a>
                                </li>
                                <li class=" "><a href="<?=BASE_URL('admin/recharge/quanly');?>"><i class="las la-donate"></i><span>Quản lý nạp tiền</span></a>
                                </li>
                                <li class=" "><a href="<?=BASE_URL('admin/order/list');?>"><i class="las la-clipboard-list"></i><span>Quản lý đơn hàng</span></a>
                                </li>
                                <li class=" "><a href="<?=BASE_URL('admin/thongbao/add');?>"><i class="las la-bell"></i><span>Thêm thông báo</span></a>
                                </li>
                                <li class=" "><a href="<?=BASE_URL('admin/thongbao/home/add');?>"><i class="las la-eye"></i><span>Sửa thông báo nổi</span></a>
                                </li>
                                <li class=" "><a href="<?=BASE_URL('admin/info/admin/edit');?>"><i class="las la-ad"></i><span>Sửa thông tin admin</span></a>
                                </li>
                                <li class=" "><a href="<?=BASE_URL('admin/recharge/banking/add');?>"><i class="las la-hand-holding-usd"></i><span>Cài đặt ngân hàng</span></a>
                                </li>
                                <li class=" "><a href="<?=BASE_URL('admin/recharge/card/edit');?>"><i class="las la-donate"></i><span>Cài đặt nạp thẻ</span></a>
                                </li>
                                <li class=" "><a href="<?=BASE_URL('admin/setting/website/edit');?>"><i class="las la-tools"></i><span>Cài đặt website</span></a>
                                </li>
                            </ul>
                        </li>
                        <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                        <li class=" "><a href="#serviceApi" class="collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-tools"></i><span>Quản lý dịch vụ</span><i class="las la-angle-right iq-arrow-right arrow-active"></i><i class="las la-angle-down iq-arrow-right arrow-hover"></i></a>
                            <ul id="serviceApi" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class=" "><a href="<?=BASE_URL('admin/service/quanly/facebook');?>"><i class="lab la-facebook"></i><span>Dịch vụ facebook</span></a></li>
                            </ul>
                        </li>
                        <?php }?>
                    </ul>
                </nav>
                <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                <div class="sidebar-bottom page_speed_1914807038">
                    <div class="card card-info-profile">
                        <div class="card-body">
                            <div class="form-group text-center">
                                <div class="d-flex justify-content-center">
                                    <div class="crm-profile-img-edit position-relative"><img class="crm-profile-pic rounded-circle" src="<?=$NHQ->site('logo_user');?><?=$NHQ->getUsers('username');?>" alt="profile-pic">
                                    </div>
                                </div>
                                <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                                <div class="img-extension mt-3">
                                    <div class="d-inline-block align-items-center"><span class="text-light"><?=$NHQ->getUsers('username');?></span>
                                    </div>
                                    <p class="text-light">Số dư: <b class="text-danger"><?=format_money($NHQ->getUsers('money'));?></b> <sup>coin</sup>
                                    </p>
                                </div>
                            </div><a href="<?=BASE_URL('auth/logout');?>" class="btn btn-warning btn-block">Đăng xuất</a>
                        </div>
                    </div>
                </div>
                <!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->
                <div class="p-3"></div>
            </div>
        </div>
<!-- Design by Bùi Văn Quyết/facebook: https://www.facebook.com/Bui.Van.Quyet.Vo.Dich.Thien.Ha.Can.All//zalo: 0846745505/3.x [XR&CO'2021], Tue, 2 Aug 2021 11:19:24 GMT -->