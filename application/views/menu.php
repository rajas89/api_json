<div  class="width_980">
            <div id="menu_navbar_desktop" style="position: absolute;z-index: 10000;">
                <div style="float: left">
                    <div id="click_menu" class="box_menu_first">
                        <div class="txt_menu_compro">Company Profile</div>
                    </div>
                    <div id="content_menu" class="box_menu_first_li">
                        <ul class="ul_menu">
                            <?php foreach ($data_menu as $mn) {?>
                                <li class="li_menu" onclick="window.location.href = '<?php if($mn->menu_id == 18 || $mn->menu_id == 22 || $mn->menu_id == 24 || $mn->menu_id == 23){ echo $base_url.$mn->link;} else if($mn->menu_id == 19 ){ echo 'http://shop2.tokopo.com';} else{echo '#';} ?>';">
                                    <div id="menu_parent<?php echo $mn->menu_id;?>" class="menu_div_first">
                                        <span class="menu_text"><?php echo $mn->title;?></span>
                                        <div class="arrow_hover" style="background: url('<?php echo $base_url.'sido_img/images/icon_panah.png';?>')"></div>
                                        <div class="clearboth"></div>
                                        <hr class="hr_menu">
                                        <div class="box_menu_first_hover">
                                            <ul class="ul_menu submenu_ul">
                                                <?php foreach ($submenu_list as $submenu): ?>
                                                    <?php if($submenu->parent_id == $mn->menu_id){ ?>
                                                        <li class="li_menu">
                                                            <div class="submenu_div" onclick="window.location.href = '<?php echo $base_url.$submenu->link; ?>';">
                                                                <span class="menu_text"><?php echo $submenu->title;?></span>
                                                                <div class="clearboth"></div>
                                                                <hr class="hr_menu">
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="box_menu_second">
                    <a class="default_a" href="http://shop2.tokopo.com/" target="_blank"><div class="txt_menu_compro">Store</div></a>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){        
                $('.menu_div_first').find('.clear').remove();            
                    $('.menu_div_first').hover(function(){
                        $('.box_menu_first_hover').hide();
                        $(this).find('.arrow_hover').show();
                        var a = $(this).find('.submenu_div');
                        if (a.length != 0){
                            $(this).find('.box_menu_first_hover').show();
                        }
                    }, function () {
                        $('.arrow_hover').hide();
                        $('.box_menu_first_hover').hide();
                    });
                    
                    $(".submenu_div").click(function(e) {
                        e.stopPropagation();
                    });
                });
            </script>
 </div>