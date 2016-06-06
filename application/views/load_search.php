<?php $newsid_load2 = 0;foreach ($search_result as $sr): ?>
    <?php  $newsid_load2 = $newsid_load2 . ',' . $sr->news_id; ?>
    <?php $ext = pathinfo($sr->image, PATHINFO_EXTENSION);?>
    <?php 
        $txt1 = '';
        if($sr->category == 0)
        {
            $txt1 = 'pr';
        }
        else if($sr->category == 1)
        {
            $txt1 = 'csr';
        }
    ?>
    <div id="hasil_data">
        <div class="isotopeItem box_isotope_create box_radius5 shadow_kotak boxkotakcamp boxkotakcamp1 <?php echo $txt1; ?>">
            <a href="<?php echo $base_url.'media/page/'.$sr->news_id.'/'.str_replace(' ','-',$sr->title);?>">
                <?php if($ext == 'mp4' || $ext == '3gp') { ?>
                    <video class="box_image_news" src="<?php echo $sr->image;?>" controls></video>
                <?php }elseif($ext == 'jpg' || $ext == 'png' || $ext == 'gif'){ ?>
                    <?php if($sr->image != '') { ?>
                        <div class="box_image_news" style="position: relative;background: url('<?php echo $sr->image; ?>') no-repeat center center;background-size:cover;"></div>
                    <?php }?>
                <?php }?>
            </a>
            <div style="margin: 20px;">
                <div style="width: 100%;margin-bottom: 15px;">
                    <?php if($sr->title != '') { ?>
                        <a href="<?php echo $base_url.'media/page/'.$sr->news_id.'/'.str_replace(' ','-',$sr->title);?>" style="text-decoration: none;color: #070908">
                            <div class="" style="float: left;font-size: 16px">
                                <?php echo $sr->title; ?>   
                            </div>
                        </a>
                    <?php }?>
                    <div style="clear: both;"></div>
                </div>
                <div style="clear: both;"></div>
                <?php if($sr->descrip != '') { ?>
                    <div style="word-wrap:break-word; font-size: 13px;" class="desccamp">
                        <div class="desccamp1">
                            <a href="<?php echo $base_url.'media/page/'.$sr->news_id.'/'.str_replace(' ','-',$sr->title);?>" style="text-decoration: none;color: #070908">
                                <?php
                                $text_descrip_cover = str_replace("<br />"," ",$sr->descrip);
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
                            </a>
                        </div>
                    </div>
                <?php }?>
                <div class="txt_cat">
                        <?php if($sr->category == 0){ echo 'Press Release';}else if($sr->category == 1){ echo 'CSR';}?>
                 </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php if($newsid_load2 != ''):?>
    <script type="text/javascript">
        $(document).ready(function(){
            var id_not_in = $('#news_id').val();
            var offset = '<?php echo $offset; ?>';
            $('#news_id').val(id_not_in+',<?php echo $newsid_load2; ?>');
            $('#offset').val(offset);
        });
    </script>
<?php  endif;?>