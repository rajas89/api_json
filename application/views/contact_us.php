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
            
            .contact_container{max-width: 980px;position: relative;margin: 0px auto;padding: 50px 0px;}
            .head_contact_text{padding: 30px 0px;}
            .section_left{width: 650px;float: left;}
            .contact_type_frame{text-align: center;border-bottom: 1px solid #cccccc;padding-bottom: 25px;}
            .txt_head_inputform{padding: 25px 0px;}
            .contact_type_box{width: 116px;display: inline-block;vertical-align: top;margin: 0px 15px;cursor: pointer;}
            .contact_type_circle{width: 110px;height: 110px;border: 3px solid #cccccc;border-radius: 50%;}
            .circle_active{border-color: #85945D;}
            .txt_type_circle{margin: 10px 0px;}
            .input_sml{margin: 10px 0px;width: 608px;padding: 15px 20px;border-radius: 4px;border: 1px solid #cccccc;background-color: #F8F8F8;}
            .input_sml2{margin: 10px 0px;width: 270px;padding: 15px 20px;border-radius: 4px;border: 1px solid #cccccc;background-color: #F8F8F8;display: inline-block;}
            .input_big{margin: 10px 0px;width: 608px;height: 150px;padding: 15px 20px;border-radius: 4px;border: 1px solid #cccccc;background-color: #F8F8F8;resize: none;}
            .submit_btn{padding: 20px 0px;width: 40%;border-radius: 4px;background-color: #7E9415;border:none;font-size: 16px;cursor: pointer;}
            
            .section_right{width: 280px;margin-left: 50px;float: left;}
            .txt_office_head{padding:0px 5px;}
            .txt_office_title{padding: 20px 0px;}
            .txt_office_address{line-height: 1.5;padding-bottom: 15px;}
            .phone_box{padding: 5px 0px;}
            
            .contact_icon{
                background: url('<?php echo $base_url; ?>sido_img/images/sprite_ico_contact.png') no-repeat;
                width: 80px;
                height: 80px;
                margin: 15px auto;
            }
            .ico_konsumen{
                background-position: -12px -100px;
            }
            .ico_investor{
                background-position: -115px -101px;
            }
            .ico_career{
                background-position: -214px -98px;
            }
            .ico_distributor{
                background-position: -310px -98px;
            }
            
            .ico_konsumen_active{
                background-position: -12px -9px;
            }
            .ico_investor_active{
                background-position: -115px -10px;
            }
            .ico_career_active{
                background-position: -214px -7px;
            }
            .ico_distributor_active{
                background-position: -310px -7px;
            }
            
            
            @media only screen and (min-width: 768px) and (max-width: 1024px){
                .contact_container{padding: 10px 0px;}
                .head_contact_text{width: 650px;margin: 0px auto;}
                .section_left{float: none;margin: 0px auto;}
                .section_right{float: none;margin: 0px auto;width: 650px;padding-top: 50px;}
                .txt_office_head{text-align: center;}
                .office_info{float: left;width: 50%;}
            }
            
            @media only screen and (max-width: 767px){
                .contact_container{margin: 0px 1%;padding: 0px;}
                .section_left{width: 100%;}
                .section_right{width: 100%;text-align: center;padding-top: 50px;margin: 0px;}
                .input_sml{width: 90%;padding: 15px 5%;}
                .input_sml2{width: 90%;padding: 15px 5%;}
                .input_big{width: 90%;padding: 15px 5%;}
                .submit_btn{width: 100%;}
                .txt_head_inputform{text-align: center;}
                .office_info{margin-bottom: 25px;}
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#click_menu').click(function(){
                    $('#content_menu').stop().slideToggle(500);
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $('.input_sml, .input_sml2, .input_big').val('');
                $('#type_konsumen').click(function(){
                    $('#type_form').val('0');
                    $('.contact_type_circle').removeClass('circle_active');
                    $('.txt_type_circle').removeClass('font_green');
                    $('.contact_icon').removeClass('ico_investor_active');
                    $('.contact_icon').removeClass('ico_career_active');
                    $('.contact_icon').removeClass('ico_distributor_active');
                    $(this).find(".contact_type_circle").addClass('circle_active');
                    $(this).find(".contact_icon").addClass('ico_konsumen_active');
                    $(this).find(".txt_type_circle").addClass('font_green');
                    $('#type_circle_text').html('Layanan Konsumen');
                });
                $('#type_investor').click(function(){
                    $('#type_form').val('1');
                    $('.contact_type_circle').removeClass('circle_active');
                    $('.txt_type_circle').removeClass('font_green');
                    $('.contact_icon').removeClass('ico_konsumen_active');
                    $('.contact_icon').removeClass('ico_career_active');
                    $('.contact_icon').removeClass('ico_distributor_active');
                    $(this).find(".contact_type_circle").addClass('circle_active');
                    $(this).find(".contact_icon").addClass('ico_investor_active');
                    $(this).find(".txt_type_circle").addClass('font_green');
                    $('#type_circle_text').html('Menjadi Investor');
                    
                });
                $('#type_career').click(function(){
                    $('#type_form').val('2');
                    $('.contact_type_circle').removeClass('circle_active');
                    $('.txt_type_circle').removeClass('font_green');
                    $('.contact_icon').removeClass('ico_konsumen_active');
                    $('.contact_icon').removeClass('ico_investor_active');
                    $('.contact_icon').removeClass('ico_distributor_active');
                    $(this).find(".contact_type_circle").addClass('circle_active');
                    $(this).find(".contact_type_circle").addClass('circle_active');
                    $(this).find(".contact_icon").addClass('ico_career_active');
                    $(this).find(".txt_type_circle").addClass('font_green');
                    $('#type_circle_text').html('Career');
                });
                $('#type_distributor').click(function(){
                    $('#type_form').val('3');
                    $('.contact_type_circle').removeClass('circle_active');
                    $('.txt_type_circle').removeClass('font_green');
                    $('.contact_icon').removeClass('ico_konsumen_active');
                    $('.contact_icon').removeClass('ico_investor_active');
                    $('.contact_icon').removeClass('ico_career_active');
                    $(this).find(".contact_type_circle").addClass('circle_active');
                    $(this).find(".contact_type_circle").addClass('circle_active');
                    $(this).find(".contact_icon").addClass('ico_distributor_active');
                    $(this).find(".txt_type_circle").addClass('font_green');
                    $('#type_circle_text').html('Menjadi Distributor');
                });
                
                $("#contact_form").submit(function () {
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
                <!--<ul class="slideshow_page">-->
                    <div>
                        <div class="slide_page" style="background: url('<?php echo $base_url;?>sido_img/images/ceo-cover.jpg');background-position: center center;background-size:cover; ">
                        </div>
                    </div>
                <!--</ul>-->
                <div style="clear: both;"></div>
            </div>
            <div>
            <div class="contact_container">
                <div class="head_contact_text font20 font_green">Contact us</div>
                <div class="section_left">
                    <div class="contact_type_frame">
                        <div class="contact_type_box" id="type_konsumen">
                            <div class="contact_type_circle circle_active">
                                <div class="contact_icon ico_konsumen ico_konsumen_active"></div>
                            </div>
                            <div class="txt_type_circle font_grey font_green font_bold">
                                LAYANAN KONSUMEN
                            </div>
                        </div>
                        <div class="contact_type_box" id="type_investor">
                            <div class="contact_type_circle">
                                <div class="contact_icon ico_investor"></div>
                            </div>
                            <div class="txt_type_circle font_grey font_bold">
                                MENJADI INVESTOR
                            </div>
                        </div>
                        <div class="contact_type_box" id="type_career">
                            <div class="contact_type_circle">
                                <div class="contact_icon ico_career"></div>
                            </div>
                            <div class="txt_type_circle font_grey font_bold">
                                CAREER
                            </div>
                        </div>
                        <div class="contact_type_box" id="type_distributor"> 
                            <div class="contact_type_circle">
                                <div class="contact_icon ico_distributor"></div>
                            </div>
                            <div class="txt_type_circle font_grey font_bold">
                                MENJADI DISTRIBUTOR
                            </div>
                        </div>
                        <div class="clearboth"></div>
                    </div>
                    <div>
                        <div class="txt_head_inputform font_bold font20 font_black">
                            Silahkan Isi Form 
                            <span id="type_circle_text">Layanan Konsumen</span> 
                            berikut untuk mendapatkan informasi dari kami
                        </div>
                        <div>
                            <form id="contact_form" method="post" action="<?php echo $base_url.'contact/submit_contact'; ?>" data-ajax="false">
                                <div>
                                    <input name="input_name" type="text" placeholder="Your Name" class="input_sml" required>
                                </div>
                                <div>
                                    <input name="input_email" type="text" placeholder="Your Email" class="input_sml2" style="float: left;" required>
                                    <input name="input_phone" type="text" placeholder="Your Phone" class="input_sml2" style="float: right;">
                                    <div class="clearboth"></div>
                                </div>
                                <div>
                                    <input name="input_country" type="text" placeholder="Your Country" class="input_sml2" style="float: left;">
                                    <input name="input_zipcode" type="text" placeholder="Zip Code" class="input_sml2" style="float: right;">
                                    <div class="clearboth"></div>
                                </div>
                                <div>
                                    <textarea name="input_message" type="text" placeholder="Your Message" class="input_big" required></textarea>
                                </div>
                                <div style="margin-top: 15px;">
                                    <input class="submit_btn font_white" type="submit">
                                </div>
                                <input type="hidden" name="type_form" id="type_form" value="0">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section_right font_black">
                    <div>
                        <div class="txt_office_head font20 font_bold">Our Office</div>  
                    </div>
                    <div class="office_info">
                        <div style="padding: 0px 5px;">
                            <div class="txt_office_title font20 font_bold">Head Office</div>
                            <div class="txt_office_address">
                                Gedung Menara Suara Merdeka <br>
                                Jl.Pandanaran No. 30 Semarang 50134</div>
                            <div class="phone_box">
                                <div>Telepon :</div>
                                <div>(62 24)7692 8811(hunting)</div>
                            </div>
                            <div class="phone_box">
                                <div>Fax :</div>
                                <div>(62 24)7692 8815</div>
                            </div>
                        </div>
                    </div>
                    <div class="office_info">
                        <div style="padding: 0px 5px;">
                            <div class="txt_office_title font20 font_bold">Branch Office</div>
                            <div class="txt_office_address">
                                GRAHA MUNCUL MEKAR <br>
                                Jl.Panjang Arteri Kelapa Dua No. 27 Kebon Jeruk-Jakarta Barat 1150</div>
                            <div class="phone_box">
                                <div>Telepon :</div>
                                <div>(62 21)5367 9629, 5367 9902, 5367 9959</div>
                            </div>
                            <div class="phone_box">
                                <div>Fax :</div>
                                <div>(62 21)5367 9892</div>
                            </div>
                            <div class="phone_box">
                                <div>Email :</div>
                                <div>marketing@sidomuncul.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="office_info">
                        <div style="padding: 0px 5px;">
                            <div class="txt_office_title font20 font_bold">Factory</div>
                            <div class="txt_office_address">
                                Jl. Soekarno Hatta Km. 28<br>
                                Kec. Bergas - Klepu, Semarang 50552, Indonesia
                            </div>
                            <div class="phone_box">
                                <div>Telepon :</div>
                                <div>(62 298)523 515</div>
                            </div>
                            <div class="phone_box">
                                <div>Fax :</div>
                                <div>(62 298)523 509</div>
                            </div>
                            <div class="phone_box">
                                <div>You can also email us directly at</div>
                                <div><a href="mailto:info@sidomuncul.com" style="text-decoration: none;" class="font_blue">info@sidomuncul.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearboth"></div>
                </div>
                <div class="clearboth"></div>
            </div>
        </div>
        </div>
        <div class="area_footer" style="margin-top: 100px;">
            <?php include "footer.php";?>
        </div>
        <?php include "box_end.php";?>
    </body>
</html>