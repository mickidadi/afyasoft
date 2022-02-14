<?php

use yii\helpers\Html;
?>

<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second">
        <div class="navbar-text">
           <h6> <b>Copyright &copy; NFPCIP <?=date("Y")?> </b></h6> <a href="#" target="_blank"></a>
        </div>
        
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="#">Help center</a></li>
                
            </ul>
        </div>
    </div>
    <script type="text/javascript">

         /*$(".alert").fadeTo(5000, 500).slideUp(500, function(){
         $(".alert").alert('close');
         });*/

        $(".alert").fadeTo(5000,500).fadeOut(5000,function(){
            $(".alert").alert('close');
        });

        $(document).ready(function(){

            $('table thead a').addClass('text-white text-uppercase');
            $('table thead select').attr('class','select');
            //$('.panel panel-flat').addClass('table-responsive');
            //$('.select2').select2();
            $('.select').select2();
            // Single picker

            $('.date').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'YYYY-MM-DD',
                    //dddd - Friday
                    //dd - Fri
                }
            });
        });
    </script>
</div>
 