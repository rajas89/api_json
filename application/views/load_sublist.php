<?php foreach($sub_list as $sl): ?>
    <?php if($sl->link != '' || $sl->link != null){ ?>
        <a href="<?php echo $base_url.$sl->link; ?>" target="_blank" class="font_black">
            <div class="list_submenu">
                <?php echo $sl->title; ?>
            </div>
        </a>
    <?php }else{ ?>
        <div class="list_submenu">
            <?php echo $sl->title; ?>
        </div>
    <?php } ?>
<?php endforeach;?>