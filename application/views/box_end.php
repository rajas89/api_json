<div id="popmenu" class="overlay">
            <div class="popup">
                 <a class="close" href="#">&times;</a>
                 <br>
                 
                    <a href="<?php echo $base_url;?>home" style="text-decoration:none;">
                        <div class="txt_foot" style="height:35px">
                           Home     
                        </div>
                    </a>
                    <a href="<?php echo $base_url;?>about-us/sejarah-sidomuncul" style="text-decoration:none;">
                        <div class="txt_foot" style="height:35px">
                            About Us      
                        </div>
                    </a>
                    <a href="<?php echo $base_url;?>faq" style="text-decoration:none;">
                        <div class="txt_foot" style="height:35px">
                            FAQ      
                        </div>
                    </a>
                    <a href="<?php echo $base_url;?>faq" style="text-decoration:none;">
                        <div class="txt_foot" style="height:35px">
                            Privacy Policy      
                        </div>
                    </a>
                    <a href="#" style="text-decoration:none;">
                        <div class="txt_foot" style="height:35px">
                           RSS     
                        </div>
                    </a>
                    <a href="<?php echo $base_url;?>sitemap" style="text-decoration:none;">
                        <div class="txt_foot" style="height:35px">
                           Sitemap     
                        </div>
                    </a>
                    <a href="<?php echo $base_url;?>career" style="text-decoration:none;">
                        <div class="txt_foot" style="height:35px">
                           Career     
                        </div>
                    </a>
                    <a href="<?php echo $base_url;?>contact" style="text-decoration:none;">
                        <div class="txt_foot" style="height:35px">
                           Contact Us     
                        </div>
                    </a>
                 
            </div>
    </div>
    <script src="<?php echo $base_url;?>sido_tools/js/classie.js"></script>
    <script type="text/javascript">
                $(window).resize(function() {
                    if( $('body').hasClass('cbp-spmenu-push-toright')  ) {
                         if($(window).width()>=768){
                            $('#showLeftPush').click();
                            }
                        }
                });
                    var menuLeft = document.getElementById( 'cbp-spmenu-s1' )
                    showLeftPush = document.getElementById( 'showLeftPush' ),
                    body = document.body;

            showLeftPush.onclick = function() {
                    classie.toggle( this, 'active' );
                    classie.toggle( body, 'cbp-spmenu-push-toright' );
                    classie.toggle( menuLeft, 'cbp-spmenu-open' );
                    disableOther( 'showLeftPush' );
            };

            function disableOther( button ) {
                    if( button !== 'showLeftPush' ) {
                            classie.toggle( showLeftPush, 'disabled' );
                    }
            }
            $('#filter_toggle').click(function(){
                    $(".box_nav_ul").slideToggle("fast");
               
            });
    </script>