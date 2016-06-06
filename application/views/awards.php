<script type="text/javascript"  src="<?php echo $base_url;?>sido_tools/jq/popup/jquery.popupoverlay.js"></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#form_load").ajaxForm({
            success:function(e){
                var t = $("#awards_id").val();
                var $boxes = $(e);
                var $container = $('#data_awards');
                $container.append( $boxes ).isotope( 'appended', $boxes, true );
                $container.isotope('reLayout');
                if(e==""){
                    $(".loadmore").hide();
                }
            }
        }).submit()
    });
    $(document).on('click','.loadmore',function(){
        $("#form_load").ajaxForm({
            success:function(e){
                var t = $("#awards_id").val();
                var $boxes = $(e);
                var $container = $('#data_awards');
                $container.append( $boxes ).isotope( 'appended', $boxes, true );
                if(e==""){
                    $(".loadmore").hide()
                }
            }
        }).submit()
    });
    
    $(document).ready(function(){
        $('#awards_detail_box_popup').popup({
            transition: 'all 0.3s',
            scrolllock: true,
            opacity:'0.8'
        });
    });
    function load_popup_award(id){
        var myurl = '<?php echo $base_url; ?>';
        $.ajax({
            type: "POST",
            url: myurl+'page/awards',
            data:"awards_id=" + id,
            success: function(response){
                $('#awards_detail_box_popup').html('');
                $('#awards_detail_box_popup').append(response);
            }
        });
    }
</script>
 <style>
    .title_frame{padding-bottom: 25px;margin: 0px 10px;}
    .title_text{font-size: 22px;font-weight: bold;color: #333333;padding: 15px 0px;}
    .awards_detail_box_popup_open{cursor: pointer;}
    #awards_detail_box_popup {
        -webkit-transform: scale(0.8);
           -moz-transform: scale(0.8);
            -ms-transform: scale(0.8);
                transform: scale(0.8);
    }
    .popup_visible #awards_detail_box_popup {
        -webkit-transform: scale(1);
           -moz-transform: scale(1);
            -ms-transform: scale(1);
                transform: scale(1);
    }
    
    .width_980_detail{text-align: center;max-width: 980px;}
    .award_media_frame{display: inline-block;width: 49%;}
    .img_awards_detail{width: 100%;max-width: 100%;height: auto;vertical-align: middle}
    .award_info_frame{text-align: left;display: inline-block;width: 49%;background-color: white;border-radius: 4px;vertical-align: top;}
    .head_text{float: left;font-size: 16px;font-weight: bold;color: #4D5E27;}
    .close_logo{float: right;color: #c1c1c1;cursor: pointer;}
    .title_text_detail{font-weight: bold;padding: 5px 0px}
    .desc_text_detail{padding: 15px 0px 50px 0px;}
    .foot_text_detail{font-weight: bold;font-size: 14px;}
    .award_info_box{border-top: 1px solid #e1e1e1;padding: 15px 0px;}
    .margin_media{margin-right: 20px;}
    @media only screen and (max-width: 1024px){
        .width_980_detail{text-align: center;max-width: 750px;}
        .award_media_frame{width: 100%;}
        .award_info_frame{width: 100%;}
        .margin_media{margin: 0px;}
        .award_info_frame{border-radius: 0px;}
    }
    @media only screen and (max-width: 768px){
        .width_980_detail{width: 100%;}
        .title_frame{margin: 0px;padding-bottom: 0px;}
    }
</style>
<div style="border-top: 1px solid #e1e1e1;background-color: #f6f6f6;margin-top: 50px;">
    <div class="width_980" style="padding: 25px 0px 50px 0px">
        <div class="title_frame">
            <div class="title_text awards_detail_box_popup_open">Penghargaan Yang Telah Kami Raih</div>
        </div>
        <div class="box_div_news">
            <section class="page-section section appear clearfix secPad" id="portfolio">
                <div style="width:100%">
                    <div class="portfolio-items isotopeWrapper clearfix" id="data_awards"></div>
                </div>
            </section>
            <div style="clear: both"></div>
            <div class="loadmore" id="loadmore_load">
                See More
            </div>
            <form id="form_load" method="post" action="<?php echo $base_url ?>page/load_awards">
                <input type="hidden" id="awards_id" name="awards_id" value="0"/>
                <input type="hidden" id="offset" name="offset" value="0"/>
            </form>
        </div>
    </div>
</div>
<div id="awards_detail_frame">
    <div id="awards_detail_box_popup">
        <div class="awards_detail_box_popup_close">x</div>
    </div>
</div>