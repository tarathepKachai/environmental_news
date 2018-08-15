<?php
//die(base_url());
define('BASE_PATH', base_url());
define('ROOT_PATH', str_replace('index.php/', '', base_url()));
define('FRONTEND_PATH', ROOT_PATH.'assetfrontend/');
define('CORE_PATH', ROOT_PATH.'assetcore/');
define('TITLE_NAME', 'environmental_news');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>environmental_news</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="<?php echo CORE_PATH; ?>font/stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo CORE_PATH; ?>font-awesome-4.6.3/css/font-awesome.min.css">

        <!-- bootstrap-3.3.7 -->
        <link rel="stylesheet" href="<?php echo CORE_PATH; ?>bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo CORE_PATH; ?>bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <script language="javascript" type="text/javascript" src="<?php echo CORE_PATH; ?>jquery-1.9.1.js"></script>
        <script src="<?php echo CORE_PATH; ?>bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

        <!-- Animation -->
        <link rel="stylesheet" href="<?php echo FRONTEND_PATH; ?>css/animations.css">
        <link rel="stylesheet" href="<?php echo FRONTEND_PATH; ?>css/hover-min.css">
        <link rel="stylesheet" href="<?php echo FRONTEND_PATH; ?>css/hover.css">
        <link rel="stylesheet" href="<?php echo FRONTEND_PATH; ?>css/animate.css">
        <!-- MY CSS -->
        <link rel="stylesheet" href="<?php echo FRONTEND_PATH; ?>css/style_css.css">

    </head>

<body>

    <div class="wrapper"><!--Start wrapper-->  

        <!-- Header -->
        <div class="color_logo">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-9 col-xs-12">
                        <div class="row">
                            <!-- <div class="col-md-1 col-sm-4 col-xs-2">
                                <div class="row">
                                    <a href="index.php">
                                        <img src="images/header/logo_NRCT.jpg" alt="alt" class="img-responsive" style="    max-height: 67px;padding: 5px;">
                                    </a>
                                </div>
                            </div> -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo BASE_PATH; ?>">
                                    <div class="box_font_logo">
                                        <span class="font_logo_main">
                                            <div>
                                                ระบบอัพเดทข่าวสารสิ่งแวดล้อมในการดูแลผู้ป่วย 
                                            </div>
                                            <!-- <span style="color:#a0cbe4;font-weight: normal;">Information Center</span> -->
                                        </span>
                                        <br>
                                        <!-- <span class="font_logo_sub">ศูนย์ข้อมูลการวิจัย Digital "วช."</span> -->
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-3 col-xs-12">
                        <nav class="navbar">
        
                                <div class="navbar-header spacedel" style="background-color: #334f71;">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="barger_menu fa fa-align-justify"></i>
                                </button>
                                <br>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="row collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        
                                            <!-- <a class="font_login" data-toggle="modal" data-target="#login-modal">
                                                <i class="fa fa-sign-in-alt"></i> เข้าสู่ระบบ
                                            </a> -->
                                            

                                            <?php
                                                if(isset($_SESSION['session_user'])){
                                            ?>
                                                <li>
                                                    <a href="<?php echo BASE_PATH; ?>Manage/PageManage">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> จัดการระบบ
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo BASE_PATH; ?>Login/Logout">
                                                        <i class="fa fa-sign-out-alt"></i> ออกจากระบบ (<?php echo $this->session->userdata('session_firstname'); ?> <?php echo $this->session->userdata('session_lastname'); ?>)
                                                    </a>
                                                </li>
                                                
                                                
                                            <?php
                                                }else{
                                            ?>
                                                <li>
                                                    <a href="<?php echo BASE_PATH; ?>Login/Formlogin">
                                                        <i class="fa fa-sign-in-alt"></i> เข้าสู่ระบบ
                                                    </a>
                                                </li>
                                            <?php
                                                }
                                            ?>


                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            
                        </nav>
                    </div>
                </div>  
            </div>
        </div>
        <!--END Header -->