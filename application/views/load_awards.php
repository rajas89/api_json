<?php $awards_id_load = 0;$c = 0;foreach ($data_awards as $da): ?>
    <?php $awards_id_load = $awards_id_load . ',' . $da->awards_id; ?>
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
    <div id="hasil_data">    
        <div class="isotopeItem box_isotope_create box_radius5 shadow_kotak boxkotakcamp boxkotakcamp1 <?php echo $txt1; ?>">
            <?php if($ext == 'mp4' || $ext == '3gp') { ?>
                <video class="awards_detail_box_popup_open box_image_news" onclick="load_popup_award('<?php echo $da->awards_id; ?>')" src="<?php echo $da->image; ?>" controls></video>
            <?php }elseif($ext == 'jpg' || $ext == 'png' || $ext == 'gif'){ ?>
                <?php if($da->image != '') { ?>
                    <div class="awards_detail_box_popup_open box_image_news" onclick="load_popup_award('<?php echo $da->awards_id; ?>')" style="position: relative;background: url('<?php echo $da->image; ?>') no-repeat center center;background-size:cover;"></div>
                <?php }?>
            <?php }?>
            <div style="margin: 20px;">
                <div style="width: 100%;margin-bottom: 15px;">
                    <?php if($da->title != '') { ?>
                        <div class="awards_detail_box_popup_open" style="float: left;font-size: 16px" onclick="load_popup_award('<?php echo $da->awards_id; ?>')">
                            <?php echo $da->title; ?>   
                        </div>
                    <?php }?>
                    <div style="clear: both;"></div>
                </div>
                <div style="clear: both;"></div>
                <?php if($da->descrip != '') { ?>
                    <div style="word-wrap:break-word; font-size: 13px;" class="desccamp">
                        <div class="desccamp1 awards_detail_box_popup_open" onclick="load_popup_award('<?php echo $da->awards_id; ?>')">
                            <?php
                                $text_descrip_cover = str_replace("<br />"," ",$da->descrip);
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
                        </div>
                    </div>
                <?php }?>
                <div class="txt_cat">
                        <?php echo $txt1; ?>
                 </div>
            </div>
        </div>
    </div>
<?php  $c++;endforeach; ?>
<?php if($awards_id_load != ''):?>
    <script type="text/javascript">
        $(document).ready(function(){
            var id_not_in = $('#awards_id').val();
            var offset = '<?php echo $offset; ?>';
            $('#awards_id').val(id_not_in+',<?php echo $awards_id_load; ?>');
            $('#offset').val(offset);
        });
    </script>
<?php  endif;?>