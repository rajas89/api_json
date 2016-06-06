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
            .font_green{color: #4D5E27;}
            .font_white{color: #ffffff;}
            
            .sitemap_container{max-width: 980px;position: relative;margin: 0px auto;padding: 50px 0px;}
            .head_sitemap_text{padding: 30px 0px;}
            .list_frame{display: inline-block;vertical-align: top;width: calc(960px / 4);font-size: 0px;}
            .list_box{line-height: 2;padding: 0px 10px 30px 0px;}
            .list_head{font-weight: bold;font-size: 16px;}
            .list_submenu{font-size: 16px;cursor: pointer;}
            .list_submenu a:hover{color: #85945d;}
            .list_submenu:hover{color: #85945d;}
            
            @media only screen and (min-width: 768px) and (max-width: 1024px){
                .sitemap_container{padding: 10px 0px;}
                .head_sitemap_text{width: 650px;margin: 0px auto;}
                .list_frame{width: calc(640px / 2);}
                .list_sitemap_square{max-width: 650px;margin: 0px auto;}
            }
            
            @media only screen and (max-width: 767px){
                .sitemap_container{margin: 0px 20px;padding: 0px;}
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
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
                        <div style="float:left">
                            <img src="<?php echo $base_url;?>sido_img/images/logo_header.png" style="margin-top: 20px">
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
                    <div>
                        <div class="slide_page" style="background: url('<?php echo $base_url;?>sido_img/images/ceo-cover.jpg');background-position: center center;background-size:cover; ">
                        </div>
                    </div>
                <div style="clear: both;"></div>
            </div>
            
            <div class="sitemap_container font_black">
                <div class="head_sitemap_text font20 font_green">Site Map</div>
                <div class="list_sitemap_square">
                    <div class="list_frame">
                        <div class="list_box">
                            <div class="list_head">
                                Company
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'home'?>" target="_blank" class="font_black">
                                    Home
                                </a>
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'about-us'?>" target="_blank" class="font_black">
                                    About us
                                </a>
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'products'?>" target="_blank" class="font_black">
                                    Products
                                </a>
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'our-business'?>" target="_blank" class="font_black">
                                    Our Business
                                </a>
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'business-opportunity'?>" target="_blank" class="font_black">
                                    Business Opportunity
                                </a>
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'pencapaian'?>" target="_blank" class="font_black">
                                    R&D
                                </a>
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'investor'?>" target="_blank" class="font_black">
                                    Investor
                                </a>
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'csr'?>" target="_blank" class="font_black">
                                    CSR
                                </a>
                            </div>
                            <div class="list_submenu">
                                <a href="<?php echo $base_url.'media'?>" target="_blank" class="font_black">
                                    Media
                                </a>
                            </div>
                        </div>
                        <div class="list_box">
                            <div class="list_head">
                                R & D
                            </div>
                            <div id="load_sublist21"></div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    var url = '<?php echo $base_url; ?>';
                                    var id = 21;
                                    $('#load_sublist'+id).load(url+'sitemap/load_sublist/'+id);
                                });
                            </script>
                        </div>
                    </div>   
                    <div class="list_frame">
                        <div class="list_box">
                            <div class="list_head">
                                About us
                            </div>
                            <div id="load_sublist11"></div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    var url = '<?php echo $base_url; ?>';
                                    var id = 11;
                                    $('#load_sublist'+id).load(url+'sitemap/load_sublist/'+id);
                                });
                            </script>
                        </div>
                        <div class="list_box">
                            <div class="list_head">
                                CSR
                            </div>
                            <div id="load_sublist23"></div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    var url = '<?php echo $base_url; ?>';
                                    var id = 23;
                                    $('#load_sublist'+id).load(url+'sitemap/load_sublist/'+id);
                                });
                            </script>
                        </div>
                    </div>
                    <div class="list_frame">
                        <div class="list_box">
                            <a href="<?php echo $base_url.'investor'; ?>" class="font_black" target="_blank">
                                <div class="list_head" style="cursor: text;">
                                    Investor
                                </div>
                                <div id="load_sublist22"></div>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        var url = '<?php echo $base_url; ?>';
                                        var id = 22;
                                        $('#load_sublist'+id).load(url+'sitemap/load_sublist/'+id);
                                    });
                                </script>
                            </a>
                        </div>
                        <div class="list_box">
                            <a href="<?php echo $base_url.'media'; ?>" class="font_black" target="_blank">
                                <div class="list_head">
                                    Media
                                </div>
                                <div id="load_sublist24"></div>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        var url = '<?php echo $base_url; ?>';
                                        var id = 24;
                                        $('#load_sublist'+id).load(url+'sitemap/load_sublist/'+id);
                                    });
                                </script>
                            </a>
                        </div>
                    </div>
                    <div class="list_frame">
                        <div class="list_box">
                            <div class="list_head">
                                Our Business
                            </div>
                            <div id="load_sublist20"></div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    var url = '<?php echo $base_url; ?>';
                                    var id = 20;
                                    $('#load_sublist'+id).load(url+'sitemap/load_sublist/'+id);
                                });
                            </script>
                        </div>
                        <div class="list_box">
                            <div class="list_head">
                                Business Opportunity
                            </div>
                            <div id="load_sublist18"></div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    var url = '<?php echo $base_url; ?>';
                                    var id = 18;
                                    $('#load_sublist'+id).load(url+'sitemap/load_sublist/'+id);
                                });
                            </script>
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