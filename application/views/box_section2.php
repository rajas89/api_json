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
</div>
    <div style="position: relative">
        <?php include "menu.php";?>
                <!-- Slideshow -->
        <div class="box_home_slide">
        <div class="home_slider">
            <?php foreach ($data_media_slide as $a) {?> 
                <div class="box_slide_home">
                <div class="slide1" style="background: url('<?php echo $a->image;?>');background-position: center center;background-size:cover; ">
                    <div class="tag_cover clrwht">
                        <div class="tag_size_text">
                            <?php echo $a->title;?>                
                        </div>
                        <div class="subtopic_slide">
                            <?php echo $a->descrip;?>       
                        </div>
                    </div>
                </div>
                </div>
            <?php }?>
        </div>
        </div>
    </div>