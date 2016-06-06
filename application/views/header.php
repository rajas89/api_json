<script type="text/javascript" src="<?php echo $base_url;?>sido_tools/jq/jquery.slimscroll.js"></script>
<script type="text/javascript">
$(document).ready(function(){
                  
                    $('#scroll-mob').slimScroll({
                        height:'100%',
                        widthplus :'1',
                        color: '#333',
                        opacity: '0.9',
                        left: '1px'
                    });
                });
</script>
<div id="menu_head_desktop">
<div id="ubernav-wrapper" class="">
  <div id="ubernav-wrap-in">
    <div id="ubernav-nav">
      <!-- siteLogo-item-current is used for legacy support -->
            <ul id="ubernav-logo-links">
            <li class="ubernav-logo-link <?php if($this->uri->segment(1)=="home" || $this->uri->segment(1)=="" || $this->uri->segment(1)=="media"){ echo 'selected';}?> siteLogo-item-current" sitename="sidomuncul">
                <a href="<?php echo $base_url;?>home" class="ubernav-link" id="ubernav-sidomuncul" title="Sidomuncul">
                <span class="ubernav-logo"></span>
                </a>
            </li>

            <li class="ubernav-logo-link <?php if($this->uri->segment(1)=="tolakangin"){ echo 'selected';}?>" sitename="tolakangin">
                <a href="<?php echo $base_url;?>tolakangin" class="ubernav-link" id="ubernav-tolak" title="Tolakangin">
                <span class="ubernav-logo"></span>
                </a>
            </li>

            <li class="ubernav-logo-link <?php if($this->uri->segment(1)=="kukubima"){ echo 'selected';}?>" sitename="kukubima">
                <a href="<?php echo $base_url;?>kukubima" class="ubernav-link" id="ubernav-kukubima" title="Kukubima">
                <span class="ubernav-logo"></span>
                </a>
            </li>

            </ul>
    </div>
      <div class="box_shop_parent">
          <div class="box_shop">
              <div class="txt_shop_now">Shop Now</div>
              <div class="icon_cart"></div>
          </div>
          <div class="box_shop_profile">
              <div class="icon_prof"></div>
          </div>
      </div>
  </div>
</div>
</div>
<!--menu mobile-->
<div id="menu_head_mobile">
        <div class="header_mob">
            <div style="float: left;width:100%">
                <div id="showLeftPush" class="icon_menu_left showLeftPush"></div>
                <div class="border_right_menu"></div>
                <div style="float:left">
                    <a href="<?php echo $base_url;?>home">
                        <img src="<?php echo $base_url;?>sido_img/images/logo_header.png" style="height: 40px;width:150px;margin-left: 10px">
                    </a>   
                </div>
                
                <div class="icon_cart_mob"></div>
                <div class="ico_search_mob"></div>
            </div>
            <div style="clear: both"></div>
        </div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <div id="scroll-mob">
				<h3>Menu</h3>
            	<ul style="list-style-type: none;width: 100%;padding: 0px;">
                    <?php foreach ($data_menu as $mn) :?>
                        <li style="list-style-type: none;float: none;" onclick="window.location.href = '<?php if($mn->menu_id == 18 || $mn->menu_id == 22 || $mn->menu_id == 24){ echo $base_url.$mn->link;} else if($mn->menu_id == 19 ){ echo 'http://shop2.tokopo.com';} else {echo '#';} ?>';">
    	                    <div class="menu_mbl" style="position: relative;">
    	                        <a class="menu_a">
                                    <div><?php echo $mn->title;?></div>
                                    <div class="rotate90 arrow_menu_mbl">&#10095;</div>
                                </a>
                                <div class="submenu_mobile_frame">
                                    <?php foreach ($submenu_list as $submenu) :?>
                                        <?php if($submenu->parent_id == $mn->menu_id){ ?>
                                            <div class="submenu_mobile" onclick="window.location.href = '<?php echo $base_url.$submenu->link; ?>';">
                                                  <?php echo $submenu->title;?>
                                             </div>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.menu_mbl').click(function(){
            if ($(this).find('.submenu_mobile_frame').is(':visible'))
            {
                $(this).find('.arrow_menu_mbl').hide();
                $(this).find('.submenu_mobile_frame').stop().slideToggle();
            }
            else
            {
                $('.submenu_mobile_frame').stop().slideUp();
                $('.arrow_menu_mbl').hide();
                var a = $(this).find('.submenu_mobile');
                if (a.length != 0){
                    $(this).find('.arrow_menu_mbl').show();
                    $(this).find('.submenu_mobile_frame').stop().slideToggle();
                }
            }
        });
    });
</script>