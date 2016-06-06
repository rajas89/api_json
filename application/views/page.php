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
        <link href="<?php echo $base_url;?>sido_tools/css/home.css?v=20151016" rel="stylesheet">
        <link href="<?php echo $base_url;?>sido_tools/css/global.css?v=20151016" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>sido_tools/jq/slick/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>sido_tools/jq/slick/slick/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>sido_tools/css/kickstart-slideshow.css" media="all" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url ?>sido_tools/css/isotope.css" media="all" />
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/styles.css" />
        <link rel="stylesheet" href="<?php echo $base_url ?>sido_tools/css/component.css?v=20151016" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="<?php echo $base_url ?>sido_tools/jq/jquery.form.js"></script>
        <script type="text/javascript" src="<?php echo $base_url;?>sido_tools/js/kickstart.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
        <script src="<?php echo $base_url;?>sido_tools/jq/jquery.counterup.min.js"></script> 
        <script src="<?php echo $base_url;?>sido_tools/js/jquery.isotope.min.js" type="text/javascript"></script> 
        <script src="<?php echo $base_url;?>sido_tools/js/custom.js" type="text/javascript"></script> 
        <script src="<?php echo $base_url;?>sido_tools/js/jquery.nav.js" type="text/javascript"></script> 
        <script type="text/javascript" src="<?php echo $base_url;?>sido_tools/jq/slick/slick/slick.js"></script>
        <script type="text/javascript" src="<?php echo $base_url;?>sido_tools/js/modernizr.custom.js"></script>
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
                $('.menu_div_first').find('.clear').remove();
            });
        </script>
        <style type="text/css">
            ul li {
                color: #000;
                list-style-type: disc;
                float: none;
                word-wrap:break-word;
                margin-right: 0px;
            }
            hr{
                border-width: 1px;
                -webkit-margin-before: 0em;
                -webkit-margin-after: 0em;
                border-style: solid;
            }
            input[type="button"] {
                color: #fff;
                background-color: #7E9415;
                width: 250px;
                padding: 15px;
                font-size: 14px;
                border: none;
                border-radius:3px;
                -webkit-border-radius: 3px;
                -moz-border-radius:3px;
                -ms-border-radius:3px;
                cursor: pointer;
            }
            @media only screen and (min-width: 240px) and (max-width: 767px){
                img{
                    width: 100%;
                }
            }
        </style>
    </head>
<body class="cbp-spmenu-push">
        <?php include "header.php";?>
    
<div class="box_content">
    <?php include "box_section2_page.php";?>
    <div  class="width_980">
            <div style="padding-top: 30px;line-height: 30px">
                <?php foreach ($data_page as $pg) {?>
                <div style="color:#4d5e27;"><?php echo $pg->title;?></div>
                <div><?php echo htmlspecialchars_decode(htmlspecialchars_decode($pg->isi));?></div>
                
                <?php }?>
            </div>
    </div>
    <?php if($menu_id=='17'){ ?>
        <?php include "awards.php";?>
    <?php } ?>
</div>
    <div style="height: 100px;clear: both"></div>
    <div class="area_footer">
        <?php include "footer.php";?>
    </div>
    <?php include "box_end.php";?>
</body>
</html>