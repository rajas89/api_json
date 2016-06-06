<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>Sido Muncul</title>
        <meta name="description" content="Sido Muncul Herbal Indonesia top Branded" />
        <meta name="keywords" content="jamu, sido muncul, jamu sido muncul, herbal, jamu herbal" />
        <meta name="robots" content="index,follow" />
        <link rel="shortcut icon" href="<?php echo $base_url;?>sido_img/images/favicon-sido1.png" type="image/x-icon"/>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo $base_url;?>sido_tools/css/global.css?v=20151016" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/styles.css" />
        <link href="<?php echo $base_url;?>sido_tools/css/home.css?v=20151016" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/component.css?v=20151016" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style>
            .media_page_frame{padding-top: 100px;}
            .title_frame{padding-bottom: 30px;}
            .category_text{font-size: 18px;color: #4d5e27;}
            .title_text{font-size: 22px;font-weight: bold;color: #333333;padding: 10px 0px;}
            .date_text{font-size: 16px;}
            .box_img_media_page{width: 100%;max-width: 100%;height: auto;}
            .art_box_half{float: left;width: 65%;}
            .list_other_box{float: left;width: 35%;background-color: #00ffffff;}
            .frame_descrip_media{padding: 30px 0px}
            .descrip_style{line-height: 2;}
            .list_other_subbox{padding-left: 70px;}
            .list_text_head{font-size: 16px;font-weight: bold;padding: 15px 0px;border-bottom: 1px solid #e1e1e1;margin-bottom: -1px;}
            .list_text{padding: 15px 0px;font-size: 13px;border-top:1px solid #e1e1e1;border-bottom: 1px solid #e1e1e1;margin-bottom: -1px;}
            
            @media only screen and (max-width: 1024px){
                .media_page_frame{padding-top: 25px;}
            }
            @media only screen and (max-width: 768px){
                .art_box_half{width: 100%;}
                .list_other_box{width: 100%;}
                .list_other_subbox{padding-left: 0px;}
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#click_menu').click(function(){
                           
                                var $t = $('#content_menu');
                                if ($t.is(':visible')) {
                                    $t.slideUp();
                                    $('#click_menu').addClass('box_menu_first');
                                    $('#click_menu').removeClass('box_menu_first_no_border');
                                } else {
                                    $t.slideDown();
                                    $('#click_menu').removeClass('box_menu_first');
                                    $('#click_menu').addClass('box_menu_first_no_border');
                                }

                        });
                $("#form_submitsearch").submit(function () {
                    if ($(this).valid()) {
                        $(this).submit(function () {
                            return false;
                        });
                        return true;
                    }
                    else {
                        return false;
                    }
                });
            });
        </script>
    </head>
    <?php
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    ?>
    <body class="cbp-spmenu-push">
        <?php include "header.php";?>
        <div class="box_content">
            <div id="box_search_desktop">
                <div style="background-color:#4D5E27;width:100%;height: 80px;">
                    <div class="width_980">
                        <div style="float:left">
                            <img src="<?php echo $base_url;?>sido_img/images/logo_header.png" style="margin-top: 10px">
                        </div>
                        <div style="float: right">
                            <form id="form_submitsearch" method="post" action="<?php echo $base_url.'search'; ?>" enctype="multipart/form-data">
                            <div class="input-group_search">
                                <div style="float: left">
                                <input type="text" class="form-control_search" name="search" id="search" placeholder="Search">
                                </div>
                                <div id="ico_search">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div>
                <?php include "menu.php";?>
                <!--<div style="clear: both;"></div>-->
            </div>
            
            <div class="width_980 media_page_frame">
                <?php foreach ($media_page as $mp): ?>
                    <?php 
                        $type = '';
                        if($mp->category == 1){
                            $type = 'CSR';
                        }else{
                            $type = 'Press Release';
                        }

                        $oDate = new DateTime($mp->publish_date);
                        $sDate = $oDate->format("Y-m-d H:i:s");
                        $sDate = $oDate->format("l, j F Y");
                        $ext = pathinfo($mp->image, PATHINFO_EXTENSION);
                    ?>
                    <div>
                        <div class="title_frame">
                            <div class="category_text"><?php echo $type; ?></div>
                            <div class="title_text"><?php echo $mp->title; ?></div>
                            <div class="date_text"><?php echo $hari[date("w", strtotime($mp->publish_date))].", ".date("j",strtotime($mp->publish_date))." ".$bulan[date("n", strtotime($mp->publish_date))]." ".date("Y", strtotime($mp->publish_date)); ?></div>
                        </div>
                    </div>
                    <?php if($ext=='mp4' || $ext=='3gp') {?>
                    <div class="art_box_half">
                        <?php if($mp->image != '') { ?>
                            <video id="vid_feat" class="img_feat" src="<?php echo $mp->image;?>" controls>
                            </video>
                        <?php } ?>
                        <div class="frame_descrip_media">
                            <div class="descrip_style">
                                <?php echo $mp->descrip; ?>
                            </div>
                        </div>
                    </div>
                    <?php }elseif($ext=='jpg' || $ext=='png' || $ext=='gif'){ ?>
                   
                    <div class="art_box_half">
                        <?php if($mp->image != '') { ?>
                            <img class="box_img_media_page" src="<?php echo $mp->image; ?>">
                        <?php } ?>
                        <div class="frame_descrip_media">
                            <div class="descrip_style">
                                <?php echo $mp->descrip; ?>
                            </div>
                        </div>
                    </div>
                     <?php }?>

                    <div class="list_other_box">
                        <div class="list_other_subbox">
                            <div class="list_text_head">Terkait</div>
                            <?php foreach ($media_page_other as $mpo){ ?>
                                <div class="list_text">
                                    <a style="color: black;" href="<?php echo $base_url.'media/page/'.$mpo->news_id.'/'.str_replace(' ','-',$mp->title);?>">
                                        <?php echo $mpo->title; ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <?php endforeach; ?>
            </div>
        </div>
        <div class="area_footer" style="margin-top: 100px;">
            <?php include "footer.php";?>
        </div>
        <?php include "box_end.php";?>
    </body>
</html>