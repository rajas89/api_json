<?php foreach ($detail_awards as $da): ?>
    <?php $ext = pathinfo($da->image, PATHINFO_EXTENSION);?>
    <?php 
        $txt1 = '';
        if($da->category == 0)
        {
            $txt1 = 'Other award';
        }
        else if($da->category == 1)
        {
            $txt1 = 'Product award';
        }
        else if($da->category == 2)
        {
            $txt1 = 'Corporate award';
        }
    ?>
    <div class="width_980_detail">
        <div class="award_media_frame">
            <div class="margin_media">
                <?php if($ext == 'mp4' || $ext == '3gp') { ?>
                    <video class="vid_awards_detail" src="<?php echo $da->image; ?>" controls></video>
                <?php }elseif($ext == 'jpg' || $ext == 'png' || $ext == 'gif'){ ?>
                    <?php if($da->image != '') { ?>
                        <img class="img_awards_detail" src="<?php echo $da->image; ?>">
                    <?php }?>
                <?php }?>
            </div>
        </div>
        <div class="award_info_frame">
            <div style="padding: 15px;">
                <div style="padding-bottom: 10px;">
                    <div class="head_text">
                        Award
                    </div>
                    <div class="close_logo awards_detail_box_popup_close">&#10006;</div>
                    <div style="clear: both;"></div>
                </div>
                <div class="award_info_box">
                    <div class="title_text_detail"><?php echo $da->title; ?></div>
                    <div class="desc_text_detail"><?php echo $da->descrip; ?></div>
                    <div class="foot_text_detail"><?php echo $txt1; ?></div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
<?php endforeach; ?>