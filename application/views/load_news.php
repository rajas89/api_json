<?php $newsid_load2='';$c=0; foreach ($data_news as $ld):?>
    <?php if($c==0){
        $newsid_load2=$ld->news_id;
    }else{
        $newsid_load2=$newsid_load2.','.$ld->news_id;
    }?>
                            <?php $ext = pathinfo($ld->image, PATHINFO_EXTENSION);?>
                            <div id="hasil_data">  
                            <a href="<?php echo $base_url.'media/page/'.$ld->news_id.'/'.str_replace(' ','-',$ld->title);?>">  
                            <div class="isotopeItem box_isotope_create box_radius5 shadow_kotak boxkotakcamp boxkotakcamp1 <?php if($ld->category==0){ echo 'pr';}else if($ld->category==1){ echo 'csr';
                                }else if($ld->category==2){ echo 'download';
                                }else if($ld->category==3){ echo 'facebook';
                                }else if($ld->category==4){ echo 'twitter';
                                }else if($ld->category==5){ echo 'instagram';
                                }?>">
                                    
                                    <?php if($ext=='mp4' || $ext=='3gp') {?>
                                    <a href="<?php echo $base_url.'media/page/'.$ld->news_id.'/'.str_replace(' ','-',$ld->title);?>">  
                                        <video class="box_image_news" src="<?php echo $ld->image;?>" controls>
                                        </video>
                                    </a>
                                    <?php }elseif($ext=='jpg' || $ext=='png' || $ext=='gif'){ ?>
                                        <?php if($ld->image!='') {?>
                                        <a href="<?php echo $base_url.'media/page/'.$ld->news_id.'/'.str_replace(' ','-',$ld->title);?>">  
                                        <div class="box_image_news" style="position: relative;background: url('<?php echo $ld->image;?>') no-repeat center center;background-size:cover;">
                                        </div>
                                         </a>
                                        <?php }?>
                                    <?php }?>
                                    
                                    <div style="margin: 20px;">
                                        <div style="width: 100%;margin-bottom: 15px;">
                                            <?php if($ld->title!='') {?>
                                            <a href="<?php echo $base_url.'media/page/'.$ld->news_id.'/'.str_replace(' ','-',$ld->title);?>" style="text-decoration: none;color: #070908">
                                            <div class="" style="float: left;font-size: 16px">
                                                <?php echo $ld->title;?>   
                                            </div>
                                            </a>
                                            <?php }?>
                                            <div style="clear: both;"></div>
                                        </div>
                                        <div style="clear: both;"></div>
                                        <?php if($ld->descrip!='') {?>
                                        <div style="word-wrap:break-word; font-size: 13px;" class="desccamp">
                                            <div class="desccamp1">
                                                <a href="<?php echo $base_url.'media/page/'.$ld->news_id.'/'.str_replace(' ','-',$ld->title);?>" style="text-decoration: none;color: #070908">
                                                    <?php
                                                    $text_descrip_cover = str_replace("<br />"," ",$ld->descrip);
                                                    $text_descrip_cover = strip_tags($text_descrip_cover);
                                                            $descripcek=$text_descrip_cover;
                                                                $ceklenname=$descripcek;
                                                            if (strlen($ceklenname) > 150) {
                                                                    $stringCut = substr($ceklenname, 0, 150);
                                                                    $ceklenname = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...';
                                                                    $descripcek=$ceklenname;
                                                            }
                                                    ?>
                                                    <?php echo $descripcek ?>  
                                                </a>
                                            </div>
                                        </div>
                                        <?php }?>
                                        <div class="txt_cat">
                                                <?php if($ld->category==0){ echo 'Press Release';}else if($ld->category==1){ echo 'CSR';
                                                    }else if($ld->category==2){ echo 'Download';
                                                    }else if($ld->category==3){ echo 'Facebook';
                                                    }else if($ld->category==4){ echo 'Twitter';
                                                    }else if($ld->category==5){ echo 'Instagram';
                                                    }?>
                                         </div>
                                    </div>

                                </div>
                            </a>
                                </div>
    
    <?php $c++; endforeach;?>
<?php if($newsid_load2!=''):?>
        <script type="text/javascript">
            $(document).ready(function(){var a=$('#news_id').val();$('#news_id').val(a+',<?php echo $newsid_load2;?>');});
        </script>
<?php  endif;?>