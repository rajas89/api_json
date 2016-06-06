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
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/styles.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/component.css?v=20151016" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
            
            
            .investors_container{max-width: 980px;position: relative;margin: 0px auto;padding: 50px 0px;}
            .list_menu_box_head{padding-bottom: 30px;}
            .list_menu_box{border-top: 1px solid #e1e1e1;padding: 30px 15px;}
            .sub_hidden_box{padding: 20px 30px 0px 25px;word-wrap: break-word;overflow: hidden;}
            .arrow_logo{display: inline-block;margin-right: 10px;}
            .arrow_right {
                width: 0; 
                height: 0; 
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent; 

                border-left: 8px solid #333333; 
            }
            .arrow_down{
                width: 0; 
                height: 0; 
                border-left: 8px solid transparent;
                border-right: 8px solid transparent; 

                border-top: 8px solid #333333; 
            }
            #innerdiv {
                position: absolute;
                top: -230px;
                left: -180px;
                width: 1000px;
                height: 560px;
            }
            table{border-collapse:collapse;width: 100%;text-align: left;}
            .border_btm{border-bottom: 1px solid #CACACA}
            table th{padding: 20px 25px;}
            table td{padding: 20px 25px;}
            .col_date{min-width: 140px;}
            .col_title{width: 100%;}
            .col_download{width: 50px;}
            .logo_pdf{
                width: 17px;
                height: 21px;
                background: url('<?php echo $base_url.'sido_img/images/ico_pdf.jpg';?>')no-repeat center center;
            }
            tr:nth-child(odd) {background: #FFFFFF;}
            tr:nth-child(even) {background: #F3F3F3;}
            @media only screen and (max-width: 767px){
                .list_menu_box_head{padding-left: 15px;}
            }
            @media only screen and (min-width: 240px) and (max-width: 1024px){
                img{
                    width: 100%;
                }
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#click_menu').click(function(){
                    $('#content_menu').stop().slideToggle(500);
                });
                
                $('.list_menu_investors').click(function(){
                    if($(this).parent().find('.sub_hidden_box').hasClass("hidden"))
                    {
                        $('.sub_hidden_box').addClass("hidden");
                        $(this).parent().find('.sub_hidden_box').removeClass("hidden");
                        $('.arrow_right').removeClass('arrow_down');
                        $(this).find('.arrow_right').addClass('arrow_down');
                    }
                    else
                    {
                        $(this).parent().find('.sub_hidden_box').addClass("hidden");
                        $(this).find('.arrow_right').removeClass('arrow_down');
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
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    ?>
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
                <!--<ul class="slideshow_page">-->
                <div>
                    <div class="slide_page" style="background: url('<?php echo $base_url;?>sido_img/images/ceo-cover.jpg');background-position: center center;background-size:cover; ">
                    </div>
                </div>
                <!--</ul>-->
                <div class="clearboth"></div>
            </div>
            
            <div class="investors_container">
                <div>
                    <div class="list_menu_box_head font20 font_green">Investor</div>
                    <div class="list_menu_box">
                        <div class="list_menu_investors font20 font_bold font_black pointer">
                            <div class="arrow_logo arrow_right"></div>
                            <div style="display: inline-block;">Investor Update</div>
                        </div>
                        <div class="sub_hidden_box font_black hidden">
                            <?php if(!$investor_update == false){ ?>
                                <table>
                                    <tr class="border_btm">
                                        <th>Date</th>
                                        <th colspan="2">Description</th>
                                    </tr>
                                    <?php $col_num = 1;foreach ($investor_update as $a){ ?>
                                        <tr>
                                            <td class="col_date">
                                                <?php echo date("j",strtotime($a->publish_date))." ".$bulan[date("n", strtotime($a->publish_date))]." ".date("Y", strtotime($a->publish_date)); ?>
                                            </td>
                                            <td class="col_title"><?php echo $a->title; ?></td>
                                            <td class="col_download">
                                                <a href="<?php echo $a->url; ?>" target="_blank" download>
                                                    <div class="logo_pdf"></div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $col_num++;} ?>
                                </table>
                            <?php }else{echo 'No Data';} ?>
                        </div>
                    </div>
                    <div class="list_menu_box">
                        <div class="list_menu_investors font20 font_bold font_black pointer">
                            <div class="arrow_logo arrow_right"></div>
                            <div style="display: inline-block;">Share Performance</div>
                        </div>
                        <div class="sub_hidden_box font_black hidden">
                            <div style="position: relative;width: 100%;height: 320px;overflow: hidden;">
                               <iframe id="innerdiv" width="800" height="330" src="http://finance.yahoo.com/q?s=SIDO.JK" scrolling="no" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="list_menu_box">
                        <div class="list_menu_investors font20 font_bold font_black pointer">
                            <div class="arrow_logo arrow_right"></div>
                            <div style="display: inline-block;">Corporate Structure</div>
                        </div>
                        <div class="sub_hidden_box font_black hidden">
                            <?php foreach ($corp_structure as $c){ ?>
                                <div><?php echo $c->isi; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="list_menu_box">
                        <div class="list_menu_investors font20 font_bold font_black pointer">
                            <div class="arrow_logo arrow_right"></div>
                            <div style="display: inline-block;">Financial Statement & Annual Report</div>
                        </div>
                        <div class="sub_hidden_box font_black hidden">
                            <?php if(!$finance_statement == false){ ?>
                                <table>
                                    <tr class="border_btm">
                                        <th>Date</th>
                                        <th colspan="2">Description</th>
                                    </tr>
                                    <?php $col_num = 1;foreach ($finance_statement as $d){ ?>
                                        <tr>
                                            <td class="col_date">
                                                <?php echo date("j",strtotime($d->publish_date))." ".$bulan[date("n", strtotime($d->publish_date))]." ".date("Y", strtotime($d->publish_date)); ?>
                                            </td>
                                            <td class="col_title"><?php echo $d->title; ?></td>
                                            <td class="col_download">
                                                <a href="<?php echo $d->url; ?>" target="_blank" download>
                                                    <div class="logo_pdf"></div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $col_num++;} ?>
                                </table>
                            <?php }else{echo 'No Data';} ?>
                        </div>
                    </div>
                    <div class="list_menu_box">
                        <div class="list_menu_investors font20 font_bold font_black pointer">
                            <div class="arrow_logo arrow_right"></div>
                            <div style="display: inline-block;">Company Presentation</div>
                        </div>
                        <div class="sub_hidden_box font_black hidden">
                            <?php if(!$comp_presentation == false){ ?>
                                <table >
                                    <tr class="border_btm">
                                        <th>Date</th>
                                        <th colspan="2">Description</th>
                                    </tr>
                                    <?php $col_num = 1;foreach ($comp_presentation as $e){ ?>
                                        <tr>
                                            <td class="col_date">
                                                <?php echo date("j",strtotime($e->publish_date))." ".$bulan[date("n", strtotime($e->publish_date))]." ".date("Y", strtotime($e->publish_date)); ?>
                                            </td>
                                            <td class="col_title"><?php echo $e->title; ?></td>
                                            <td class="col_download">
                                                <a href="<?php echo $e->url; ?>" target="_blank" download>
                                                    <div class="logo_pdf"></div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $col_num++;} ?>
                                </table>
                            <?php }else{echo 'No Data';} ?>
                        </div>
                    </div>
                    <div class="list_menu_box">
                        <div class="list_menu_investors font20 font_bold font_black pointer">
                            <div class="arrow_logo arrow_right"></div>
                            <div style="display: inline-block;">Devident Information</div>
                        </div>
                        <div class="sub_hidden_box font_black hidden">
                            <?php foreach ($divident_info as $f){ ?>
                                <div><?php echo $f->isi; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="list_menu_box">
                        <div class="list_menu_investors font20 font_bold font_black pointer" onclick="window.location.href = '<?php echo $base_url.'contact';?>';">
                            <div class="arrow_logo arrow_right"></div>
                            <div style="display: inline-block;">Contact</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="area_footer" style="margin-top: 100px;">
            <?php include "footer.php";?>
        </div>
        <?php include "box_end.php";?>
    </body>
</html>