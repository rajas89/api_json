<!Doctype HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" >
	    <title>Sido Muncul</title>
        <meta name="description" content="Sido Muncul Herbal Indonesia top Branded" />
        <meta name="keywords" content="jamu, sido muncul, jamu sido muncul, herbal, jamu herbal" />
        <meta name="robots" content="index,follow" />
        <link rel="shortcut icon" href="<?php echo $base_url;?>sido_img/images/favicon-sido1.png" type="image/x-icon"/>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo $base_url;?>sido_tools/css/home.css?v=20151016" rel="stylesheet">
        <link href="<?php echo $base_url;?>sido_tools/css/global.css?v=20151016" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>sido_tools/css/isotope.css" media="all" />
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/styles.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/component.css?v=20151016" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="<?php echo $base_url;?>sido_tools/js/jquery.isotope.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>sido_tools/js/custom.js" type="text/javascript"></script> 
        <script src="<?php echo $base_url;?>sido_tools/js/jquery.nav.js" type="text/javascript"></script>
        <script src="<?php echo $base_url ?>sido_tools/jq/jquery.form.js"></script>
        <style type="text/css">
            .clearboth{clear: both;}
            .font18{font-size: 18px;}
            .font20{font-size: 20px;}
            .font_bold{font-weight: bold;}
            .font_black{color: #333333;}
            .font_grey{color: #cccccc;}
            .font_blue{color: #298DFD;}
            .font_green{color: #4D5E27;}
            .font_white{color: #ffffff;}
            .pointer{cursor: pointer;}
            .hidden{display: none;}
            .floatright{float: right;}
            .floatleft{float: left;}
            
            .box_div_news{padding: 100px 0px;}
            
            @media only screen and (max-width: 1024px){
                .box_div_news{
                    padding: 0px;
                }
            }
        </style>
        <script type="text/javascript">
            $(document).on('click','.loadmore',function(){
                $("#form_load").ajaxForm({
                    success:function(e){
                        var t = $("#news_id").val();
                        var $boxes = $(e);
                        var $container = $('#data_news');
                        $container.append( $boxes ).isotope( 'appended', $boxes, true );
                        if(e==""){
                            $(".loadmore").hide()
                        }
                    }
                }).submit()
            });
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
    <body class="cbp-spmenu-push">
        <?php include "header.php";?>
        <div class="box_content">
            <div id="box_search_desktop">
                <div style="background-color:#4D5E27;width:100%;height: 90px;">
                    <div class="width_980">
                        <div class="floatleft">
                            <img src="<?php echo $base_url;?>sido_img/images/logo_header.png" style="margin-top: 20px">
                        </div>
                        <div class="floatright">
                            <form id="form_submitsearch" method="post" action="<?php echo $base_url.'search'; ?>" enctype="multipart/form-data">
                            <div class="input-group_search">
                                <div class="floatleft">
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
                <!--<div class="clearboth"></div>-->
            </div>
            
            <div class="width_980">
<!--                <div class="title_frame">
                    <div class="category_text">Media</div>
                    <div class="title_text">Berbagai berita media tentang Sido Muncul</div>
                </div>-->
                <div class="box_div_news">
                    <section class="page-section section appear clearfix secPad" id="portfolio">
                        <div style="width:100%">
                            <div class="portfolio-items isotopeWrapper clearfix" id="data_news">
                            <?php $newsid_load = 0;$c = 0;foreach ($search_result as $sr): ?>
                                <?php  $newsid_load = $newsid_load . ',' . $sr->news_id; ?>
                                <?php $ext = pathinfo($sr->image, PATHINFO_EXTENSION);?>
                                <?php 
                                    $txt1 = '';
                                    if($sr->category == 0)
                                    {
                                        $txt1 = 'pr';
                                    }
                                    else if($sr->category == 1)
                                    {
                                        $txt1 = 'csr';
                                    }
                                ?>
                                <div id="hasil_data">    
                                    <div class="isotopeItem box_isotope_create box_radius5 shadow_kotak boxkotakcamp boxkotakcamp1 <?php echo $txt1; ?>">
                                        <a href="<?php echo $base_url.'media/page/'.$sr->news_id.'/'.str_replace(' ','-',$sr->title);?>">
                                            <?php if($ext == 'mp4' || $ext == '3gp') { ?>
                                                <video class="box_image_news" src="<?php echo $sr->image;?>" controls></video>
                                            <?php }elseif($ext == 'jpg' || $ext == 'png' || $ext == 'gif'){ ?>
                                                <?php if($sr->image != '') { ?>
                                                    <div class="box_image_news" style="position: relative;background: url('<?php echo $sr->image; ?>') no-repeat center center;background-size:cover;"></div>
                                                <?php }?>
                                            <?php }?>
                                        </a>
                                        <div style="margin: 20px;">
                                            <div style="width: 100%;margin-bottom: 15px;">
                                                <?php if($sr->title != '') { ?>
                                                    <a href="<?php echo $base_url.'media/page/'.$sr->news_id.'/'.str_replace(' ','-',$sr->title);?>" style="text-decoration: none;color: #070908">
                                                        <div class="" style="float: left;font-size: 16px">
                                                            <?php echo $sr->title; ?>   
                                                        </div>
                                                    </a>
                                                <?php }?>
                                                <div style="clear: both;"></div>
                                            </div>
                                            <div style="clear: both;"></div>
                                            <?php if($sr->descrip != '') { ?>
                                                <div style="word-wrap:break-word; font-size: 13px;" class="desccamp">
                                                    <div class="desccamp1">
                                                        <a href="<?php echo $base_url.'media/page/'.$sr->news_id.'/'.str_replace(' ','-',$sr->title);?>" style="text-decoration: none;color: #070908">
                                                            <?php
                                                            $text_descrip_cover = str_replace("<br />"," ",$sr->descrip);
                                                            $text_descrip_cover = strip_tags($text_descrip_cover);
                                                                    $descripcek = $text_descrip_cover;
                                                                        $ceklenname = $descripcek;
                                                                    if (strlen($ceklenname) > 150) {
                                                                            $stringCut = substr($ceklenname, 0, 150);
                                                                            $ceklenname = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
                                                                            $descripcek = $ceklenname;
                                                                    }
                                                            ?>
                                                            <?php echo $descripcek ?>  
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php }?>
                                            <div class="txt_cat">
                                                    <?php if($sr->category == 0){ echo 'Press Release';}else if($sr->category == 1){ echo 'CSR';}?>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            <?php  $c++;endforeach; ?>
                            </div>
                        </div>
                    </section>
            
                    <div style="clear: both"></div>
                    <div class="loadmore" id="loadmore_load">
                        See More
                    </div>
                    <form id="form_load" method="post" action="<?php echo $base_url ?>search/load_search">
                        <input type="hidden" id="news_id" name="news_id" value="<?php echo $newsid_load; ?>"/>
                        <input type="hidden" id="offset" name="offset" value="<?php echo $offset; ?>"/>
                        <input type="hidden" id="search_word" name="search_word" value="<?php echo $search_word; ?>"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="area_footer">
            <?php include "footer.php";?>
        </div>
        <?php include "box_end.php";?>
    </body>
</html>