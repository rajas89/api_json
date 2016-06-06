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
        <link href="<?php echo $base_url;?>sido_tools/css/home.css?v=20151120" rel="stylesheet">
        <link href="<?php echo $base_url;?>sido_tools/css/global.css?v=20151120" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>sido_tools/jq/slick/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>sido_tools/jq/slick/slick/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>sido_tools/css/isotope.css" media="all" />
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/styles.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/component.css?v=20151016" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="<?php echo $base_url ?>sido_tools/jq/jquery.form.js"></script>

        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
        <script src="<?php echo $base_url;?>sido_tools/jq/jquery.counterup.min.js"></script> 
        <script src="<?php echo $base_url;?>sido_tools/js/jquery.isotope.min.js" type="text/javascript"></script> 
        <script src="<?php echo $base_url;?>sido_tools/js/custom.js" type="text/javascript"></script> 
        <script src="<?php echo $base_url;?>sido_tools/js/jquery.nav.js" type="text/javascript"></script> 
        <script type="text/javascript" src="<?php echo $base_url;?>sido_tools/jq/slick/slick/slick.js"></script>
        <script type="text/javascript" src="<?php echo $base_url;?>sido_tools/jq/jquery-throttle-debounce-master/jquery.ba-throttle-debounce.min.js"></script>
        <script src="<?php echo $base_url;?>sido_tools/js/global.js?v=20151229" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo $base_url;?>sido_tools/js/modernizr.custom.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
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
                $('.menu_div_first').find('.clear').remove();
            });

        </script>
        <style type="text/css">
            
            .slick-dots {
                bottom: 30px;
            }
            .slick-dots li.slick-active button:before {
                opacity: 1;
                color: white;
            }
           
            .slick-dots li button:before {
                opacity: 0.5;
                color: white;
                font-size: 16px;
            }
            .slick-dots li button::before {
                font-family: slick;
                font-size: 14px;
                line-height: 20px;
                position: absolute;
                top: 0px;
                left: 0px;
                width: 20px;
                height: 20px;
                content: "•";
                text-align: center;
                opacity: 0.4;
                color: white;
                -webkit-font-smoothing: antialiased;
            }
            @media only screen and (min-width:1025px){
                .home_slider .slick-dots {
                    right: 5%;
                    width:300px;
                    }
            }  
            @media only screen and (min-width: 768px) and (max-width: 1024px){
                .home_slider .slick-dots {
                    right: 5%;
                    width:300px;
                    }
            }   
             @media only screen and (min-width: 240px) and (max-width: 767px){
                .home_slider .slick-dots {
                    text-align: center;
                }
             }   
</style>
    </head>
<body class="cbp-spmenu-push">
        <?php include "header.php";?>
    
<div class="box_content">
     <?php include "box_section2.php";?>
     <?php if(count($data_news_featured)>0){?>  
     <div class="width_980">
        <div class="box_announcement">
            <div class="announcement_slider">
   
            <?php foreach ($data_news_featured as $feat) {?>
            <?php
            $ext = pathinfo($feat->image, PATHINFO_EXTENSION);
            $text_title_cover = str_replace("<br />"," ",$feat->title);
            $text_title_cover = strip_tags($text_title_cover);
                    $titlecek=$text_title_cover;
                        $ceklenname=$titlecek;
                    if (strlen($ceklenname) > 30) {
                            $stringCut = substr($ceklenname, 0, 30);
                            $ceklenname = substr($stringCut, 0, strrpos($stringCut, ' ')).' ';
                            $titlecek=$ceklenname;
                    }
            $text_descrip_cover = str_replace("<br />"," ",$feat->descrip);
            $text_descrip_cover = strip_tags($text_descrip_cover);
                    $descripcek=$text_descrip_cover;
                        $ceklenname=$descripcek;
                    if (strlen($ceklenname) > 28) {
                            $stringCut = substr($ceklenname, 0, 28);
                            $ceklenname = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
                            $descripcek=$ceklenname;
                            
            }
            ?>
            <?php if($ext=='mp4' || $ext=='3gp') {?>
              <div class="box_feat_data">
                <a href="<?php echo $base_url.'media/page/'.$feat->news_id.'/'.str_replace(' ','-',$feat->title);?>">
                    <video id="vid_feat" class="img_feat" src="<?php echo $feat->image;?>" controls>
                    </video>
                </a>
                <a href="<?php echo $base_url.'media/page/'.$feat->news_id.'/'.str_replace(' ','-',$feat->title);?>">
                  <div class="box_featured">
                            <div style="float: left;">
                                <div class="title_feat"><?php echo $titlecek;?></div>
                                <div class="desc_feat"><?php echo $descripcek;?></div>
                            </div>
                            <div class="box_right_img_vid">
                                <img src="<?php echo $base_url;?>sido_img/images/Icon-Video.png">
                            </div>
                      
                  </div>
                </a>
               </div>
            <?php }elseif($ext=='jpg' || $ext=='png' || $ext=='gif'){ ?>
             
               <div class="box_feat_data">
                    <a href="<?php echo $base_url.'media/page/'.$feat->news_id.'/'.str_replace(' ','-',$feat->title);?>">
                        <div id="image_feat" class="img_feat" style="background:url('<?php echo $feat->image;?>')no-repeat center center;background-size:cover;"></div>
                    </a>
                    <a href="<?php echo $base_url.'media/page/'.$feat->news_id.'/'.str_replace(' ','-',$feat->title);?>">
                    <div class="box_featured">
                            <div style="float: left;">
                                <div class="title_feat"><?php echo $titlecek;?></div>
                                <div class="desc_feat"><?php echo $descripcek;?></div>
                            </div>
                            <div class="box_right_img_vid">
                                <img src="<?php echo $base_url;?>sido_img/images/Icon-Photo.png">
                            </div>
                        
                    </div>
                </a>
               </div>

            <?php }?>
            <?php }?>
            </div>
        </div>
    </div>
    <?php }?>
    <div id="height_slide"></div>

    <section class="page-section section appear clearfix secPad" id="portfolio" style="display: none">
    <div class="container">

    <div class="row">
      <nav id="filter" class="col-md-12">
        <ul>
          <li><a href="#" class="current btn-theme btn-small" data-filter="*">All</a></li>
          <li><a href="#" class="btn-theme btn-small" data-filter=".webdesign">Me</a></li>
          <li><a href="#" class="btn-theme btn-small" data-filter=".photography">Friends</a></li>
        </ul>
      </nav>
      <div class="col-md-12">
        <div class="row">
          <div class="portfolio-items isotopeWrapper clearfix" id="3">
            <article class="col-sm-4 isotopeItem webdesign">
              <div class="portfolio-item"> <img src="http://www.campaign.com/assets/uni_img/publish_background/thumb_800/camp201507271147539401000133213.jpg" alt="" />
               
              </div>
            </article>
            <article class="col-sm-4 isotopeItem photography">
              <div class="portfolio-item"> <img src="http://www.campaign.com/assets/uni_img/publish_background/thumb_800/FOT201504201141245041000132843.jpg" alt="" />
                
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
<div style="width: 100%;background-color: #F8F8F8;border-bottom: 1px solid #D7D7D7">
<div class="width_980">
    <div class="txt_sidomuncul_statis_head">Company News</div>
    <div id="filter_toggle" class="icon_box_filter_mob">
        <img src="<?php echo $base_url;?>sido_img/images/Icon-Filter.png">
    </div>
    
    <div id="show_filter_desktop" class="box_nav_filter">
        <nav id="filter" class="">
            <ul style="padding:0px">
                <a href="#" class="" data-filter="*">
                        <li class="box_circle_filter current btn-theme btn-small"><div class="icon_filter_all"></div></li>
                </a>
                <a href="#" class="" data-filter=".pr">
                    <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_pr"></div></li>
                </a>
                <a href="#" class="" data-filter=".csr">
                    <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_csr"></div></li>
                </a>
                <a href="#" class="" data-filter=".download">
                    <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_download"></div></li>
                </a>
                <a href="#" class="" data-filter=".facebook">
                    <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_fb"></div></li>
                </a>
                <a href="#" class="" data-filter=".twitter">
                    <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_tw"></div></li>
                </a>
                <a href="#" class="" data-filter=".instagram">
                    <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_insta"></div></li>
                </a>
            </ul>
        </nav>
    </div>
    <div id="show_filter_mobile" class="box_nav_filter">
        <div  style="clear: both;border-bottom: 1px solid #dbdbdb"></div>
        <div class="box_nav_ul">
            <div class="shadow_kotak" style="border:1px solid #e1e1e1">
                <nav id="filter" style="height: 80px">
                    <ul class="box_filter_icon_iso">
                        <a href="#" class="" data-filter="*">
                                <li class="box_circle_filter current btn-theme btn-small"><div class="icon_filter_all"></div></li>
                        </a>
                        <a href="#" class="" data-filter=".pr">
                            <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_pr"></div></li>
                        </a>
                        <a href="#" class="" data-filter=".csr">
                            <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_csr"></div></li>
                        </a>
                        <a href="#" class="" data-filter=".download">
                            <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_download"></div></li>
                        </a>
                        <a href="#" class="" data-filter=".facebook">
                            <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_fb"></div></li>
                        </a>
                        <a href="#" class="" data-filter=".twitter">
                            <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_tw"></div></li>
                        </a>
                        <a href="#" class="" data-filter=".instagram">
                            <li class="box_circle_filter btn-theme btn-small"><div class="icon_filter_insta"></div></li>
                        </a>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
        <div style="clear: both"></div>
        <div class="box_div_news">
                <section class="page-section section appear clearfix secPad" id="portfolio">
                        <div style="width:100%">
                            <div class="portfolio-items isotopeWrapper clearfix" id="data_news">
                                <?php  $newsid_load = 0;$c = 0;foreach ($data_news as $nw): ?>
                            <?php  $newsid_load = $newsid_load . ',' . $nw->news_id; ?>
                            <?php $ext = pathinfo($nw->image, PATHINFO_EXTENSION);?>
                            <div id="hasil_data">  
                            <a href="<?php echo $base_url.'media/page/'.$nw->news_id.'/'.str_replace(' ','-',$nw->title);?>">  
                            <div class="isotopeItem box_isotope_create box_radius5 shadow_kotak boxkotakcamp boxkotakcamp1 <?php if($nw->category==0){ echo 'pr';}else if($nw->category==1){ echo 'csr';
                                }else if($nw->category==2){ echo 'download';
                                }else if($nw->category==3){ echo 'facebook';
                                }else if($nw->category==4){ echo 'twitter';
                                }else if($nw->category==5){ echo 'instagram';
                                }?>">
                                   
                                    <?php if($ext=='mp4' || $ext=='3gp') {?>
                                        <video class="box_image_news" src="<?php echo $nw->image;?>" controls>
                                        </video>
                                    <?php }elseif($ext=='jpg' || $ext=='png' || $ext=='gif'){ ?>
                                        <?php if($nw->image!='') {?>
                                        <a href="<?php echo $base_url.'media/page/'.$nw->news_id.'/'.str_replace(' ','-',$nw->title);?>">
                                            <div class="box_image_news" style="position: relative;background: url('<?php echo $nw->image;?>') no-repeat center center;background-size:cover;">
                                        </div>
                                        </a>
                                        <?php }?>
                                 
                                    <?php }?>
                                    
                                    <div style="margin: 20px;">
                                        <div style="width: 100%;margin-bottom: 15px;">
                                            <?php if($nw->title!='') {?>
                                            <a href="<?php echo $base_url.'media/page/'.$nw->news_id.'/'.str_replace(' ','-',$nw->title);?>" style="text-decoration: none;color: #070908">
                                            <div class="" style="float: left;font-size: 16px">
                                                <?php echo $nw->title;?>   
                                            </div>
                                            </a>
                                            <?php }?>
                                            <div style="clear: both;"></div>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <?php if($nw->descrip!='') {?>
                                        <div style="word-wrap:break-word; font-size: 13px;" class="desccamp">
                                            <div class="desccamp1">
                                                <a href="<?php echo $base_url.'media/page/'.$nw->news_id.'/'.str_replace(' ','-',$nw->title);?>" style="text-decoration: none;color: #070908">
                                                    <?php
                                                    $text_descrip_cover = str_replace("<br />"," ",$nw->descrip);
                                                    $text_descrip_cover = strip_tags($text_descrip_cover);
                                                            $descripcek=$text_descrip_cover;
                                                                $ceklenname=$descripcek;
                                                            if (strlen($ceklenname) > 150) {
                                                                    $stringCut = substr($ceklenname, 0, 150);
                                                                    $ceklenname = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
                                                                    $descripcek=$ceklenname;
                                                            }
                                                    ?>
                                                    <?php echo $descripcek ?>  
                                                </a>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="txt_cat">
                                                <?php if($nw->category==0){ echo 'Press Release';}else if($nw->category==1){ echo 'CSR';
                                                    }else if($nw->category==2){ echo 'Download';
                                                    }else if($nw->category==3){ echo 'Facebook';
                                                    }else if($nw->category==4){ echo 'Twitter';
                                                    }else if($nw->category==5){ echo 'Instagram';
                                                    }?>
                                         </div>
                                    </div>
                                </div>
                            </a>
                                </div>
                           <?php  $c++;endforeach; ?>
                        </div>
                        </div>
                </section>
            
            <div style="clear: both"></div>
            <div class="loadmore" id="loadmore_load">
                See More
            </div>
             <div id="loading">
            <center>
                <img alt="loading" style="border:none" src="http://www.campaign.com/assets/uni_img/images/loading/loading_48x48_white.gif">
            </center>
             </div>
            <form id="form_load" method="post" action="<?php echo $base_url ?>home/load_news/<?php echo $sort;?>">
                        <input type="hidden" id="news_id" name="news_id" value="<?php echo $newsid_load ?>"/>
            </form>
        </div>
</div>
</div>
    <div id="box_height" class="width_980" style="margin-top: 80px">
       
        <div style="float: left">
            <div class="title_data">Current Share Price</div>
            <div class="counter txt_current"><?php echo number_format("$share_price",2)?></div>
            <div style="float: left">
                <div class="sub_title_data">Low <?php echo number_format("$low",2)?></div>
                <ul style="float: left;padding: 0px;">
                    <li class="sub_title_data" style="margin-left:32px">High <?php echo number_format("$high",2)?></li>
                    <li class="sub_title_data" style="margin-left:32px">Volume <?php echo number_format("$volume",2)?></li>
                </ul>
            </div>
            <div style="clear: both;height: 10px"></div>
            <div class="txt_source"><a class="txt_source" href="http://finance.yahoo.com/q?s=SIDO.JK" target="_blank">Source</a></div>
            <div class="title_data">Awards</div>
            <div class="float"><div class="icon_awards"></div><div class="counter txt_total_data"><?php echo number_format ("$awards",2)?></div></div>
            <div style="clear: both;"></div>
            <div class="title_data">Employee</div>
            <div class="float"><div class="icon_employee"></div><div class="counter txt_total_data"><?php echo number_format ("$employee",2)?></div></div>
            <div style="clear: both;"></div>
            <div class="title_data">Products</div>
            <div class="float"><div class="icon_data_product"></div><div class="counter txt_total_data"><?php echo number_format ("$products",2)?></div></div>
            <div style="clear: both;"></div>
            <div style="margin-top: 30px;">
                    <div style="float: left;">
                        <img src="<?php echo $base_url;?>sido_img/images/Icon-Download.png">
                        <a class="link_download_pdf" href="<?php echo $link_download_1;?>">
                            <?php echo $link_download_1_title;?>
                        </a>
                    </div>
            </div>
            <div style="clear: both"></div>
            <div style="margin-top: 10px;">
                    <div style="float: left;">
                        <img src="<?php echo $base_url;?>sido_img/images/Icon-Download.png">
                        <a class="link_download_pdf" href="<?php echo $link_download_2;?>">
                            <?php echo $link_download_2_title;?>
                        </a>
                    </div>
            </div>
        </div>
         
      
        <div style="clear: both;height: 60px"></div>
        <div class="border_line"></div>
        <div id="ceo" style="height:300px">
            <img src="<?php echo $base_url;?>sido_img/images/ceo-sido.png">
        </div>
        <div class="txt_sidomuncul_statis">PT SIDO MUNCUL TBK, CEO</div>
        <div id="line_area" class="txt_desc_statis">Sadar akan potensi tanaman Indonesia yang alami dan berlimpah, Sido Muncul menjadikannya asset, yang kedepannya akan makin memantapkan diri dalam memproduksi obat-obatan alam, serta bertransformasi menjadi industri farmasi.</div>
        <div  class="title_data_statis">Irwan Hidayat</div>
        <div  style="height: 90px"></div>
        <div  style="border-bottom: 1px solid #dbdbdb"></div>
    </div>
    <!-- <div style="height: 50px"></div> -->
    <div  class="width_980">
            <div class="product_slider" style="margin-top:50px">
                <?php foreach ($data_media_product as $pr) {?>
                <div style="width:100%;height:60px">
                   <!--  <div style="margin: 0 auto;height: 60px;background-image: url('<?php// echo $pr->image;?>');background-repeat:no-repeat"></div> -->
                    <img src="<?php echo $pr->image;?>" width="150px" height="60px" style="margin:0 auto">
                </div>
                <?php }?>
            </div>
    </div>
    <div class="box_testimonial">
            <div class="testimonial_slider">
                
            <?php foreach ($data_testimonial as $t) {?>
            <div class="box_slide">
                <div  class="width_980">
                    <div class="txt_testi_statis">
                        What people are saying<br>
                        about Sido Muncul
                    </div>
                    <div style="float: left;padding-top: 50px;">
                    <div class="title_testi">
                        <?php
                            $text_descrip_cover = str_replace("<br />"," ",$t->testi);
                            $text_descrip_cover = strip_tags($text_descrip_cover);
                                    $testi=$text_descrip_cover;
                                        $ceklenname=$testi;
                                    if (strlen($ceklenname) > 180) {
                                            $stringCut = substr($ceklenname, 0, 180);
                                            $ceklenname = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
                                            $testi=$ceklenname;
                                    }
                            ?>
                        <?php echo $testi ?> 
                    </div>
    <!--                <div style="width:100px;margin: 0px auto">
                        <div style="border-bottom: 3px solid #fff;height: 1px;margin-bottom: 25px"></div>
                    </div>-->
                    <div class="testi_from"><?php echo $t->from_name;?></div>
                    </div>
                </div>
            </div>
            <?php }?>
            </div>
    </div>
</div>
    <div class="area_footer">
        <?php include "footer.php";?>
    </div>
    <?php include "box_end.php";?>
</body>
</html>