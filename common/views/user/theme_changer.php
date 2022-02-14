<?php
/**
 * Created by PhpStorm.
 * User: obedy
 * Date: 5/24/19
 * Time: 5:29 PM
 */
use  backend\modules\security\SecurityModule;
$COLORS = SecurityModule::Colors("*");
$themeAttributes = SecurityModule::ThemeAttributes("*");
$themeAttributesDefaultClasses = SecurityModule::ThemeAttributesDefaultClasses("*");
$defaultThemeColors = (ARRAY)json_decode(SecurityModule::DefaultThemeCode());
$themeUrl = '../theme';
?>
<!-- Animated dialog -->
<div style="font-size: larger;" id="jui-dialog-animated" title="Theme Changing Feedback">
    <p id="warningMessage1"></p>
    <!--<p id="warningMessage2"></p>-->
</div>

<!-- /animated dialog -->
<div class="row">
    <?php foreach ($themeAttributes as $section=>$name){ ?>
        <div class="col-md-2 boom">
            <div class="form-group <?php echo $section; ?>" data-animation="bounceOut">
                <label for="" class="label-control col-lg-12"><?php echo $name; ?></label>
                <div class="input-group">
                    <span id="addon<?php echo $section; ?>" class="input-group-addon bg-<?php echo SecurityModule::ThemeColor($section); ?>"><i class="icon-droplet"></i></span>
                    <input type="text" readonly="readonly" style="font-weight: bolder; font-size: large;" value="<?php echo SecurityModule::ThemeColor($section,'code'); ?>" class="form-control border-lg border-<?php echo SecurityModule::ThemeColor($section); ?>" id="<?php echo $section; ?>" name="<?php echo $section; ?>">
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="col-md-2">
        <div class="form-group">
            <label for="" class="label-control col-lg-12">Active Field</label>
            <div class="input-group">
                <span class="input-group-addon bg-indigo-800"><i class="icon-checkmark4"></i></span>
                <input type="text" class="form-control border-lg border-indigo-800" id="active_field" name="active_field">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7">

        <table class="table table-bordered">
            <thead class="navbar navbar-default header-highlight">
            <tr>
                <th id="theme-logoBar" title="logoBar" class="sector col-lg-3 logoBar text-center bg-<?php echo SecurityModule::ThemeColor('logoBar'); ?>"><?php echo SecurityModule::ThemeAttributes('logoBar'); ?></th>
                <th id="theme-topBar" title="topBar" class="sector col-lg-9 topBar text-center bg-<?php echo SecurityModule::ThemeColor('topBar'); ?>"> <?php echo SecurityModule::ThemeAttributes('topBar'); ?></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th title="sideBar" id="theme-sideBar" class="sector col-lg-3 text-center bg-<?php echo SecurityModule::ThemeColor('sideBar'); ?>" style="height: 800px;"><?php echo SecurityModule::ThemeAttributes('sideBar'); ?></th>
                <th class="col-lg-9 text-center">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-flat">
                                <div  data-animation="flip" title="gridView" class="sector panel-heading"><?php echo SecurityModule::ThemeAttributes('gridView'); ?></div>
                                <table class="table table-bordered table-condensed table-striped">
                                    <thead  id="theme-gridView" data-animation="flip" title="gridView" class="sector bg-<?php echo SecurityModule::ThemeColor('gridView'); ?>">
                                    <tr><th>#</th><th>H1</th><th>H2</th><th>H3</th><th>H4</th><th>H5</th></tr>
                                    </thead>

                                    <tbody>
                                    <tr><td>1</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>2</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>3</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>4</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>5</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>6</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>7</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>8</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>9</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    <tr><td>10</td><td>A</td><td>B</td><td>C</td><td>D</td><td>E</td></tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                        <div class="col-md-12">
                            <hr>
                            <br>
                            <div class="panel">
                                <div id="theme-panels" data-animation="flip" title="panels" class="sector panel-heading bg-<?php echo SecurityModule::ThemeColor('panels'); ?>"><?php echo SecurityModule::ThemeAttributes('panels'); ?></div>
                                <div class="panel-body">

                                </div>
                                <div class="panel-footer"></div>
                            </div>
                        </div>


                        <div class="col-md-12">

                        </div>

                    </div>





                </th>
            </tr>
            </tbody>

        </table>

    </div>
    <div class="col-md-5">
        <div class="panel panel-flat">
            <div class="panel-heading ">
                <h3 class="">Color Selection</h3>
                <div class="heading-elements">
                    <button id="apply_theme" type="button" class="block-page btn btn-labeled btn-lg btn-success"><b><i class="icon-checkmark4"></i></b> Apply Theme</button>
                </div>
            </div>
            <div class="panel-body">
                <!--<div class="row">-->
                    <?php $counter=0; foreach ($COLORS as $colorCode=>$shadeClass){ $counter++; ?>

                        <?php if ($counter==1){ echo '<div class="row">';} ?>
                        <div class="col-md-2 m-12 boom">
                            <button type="button" data-animation="bounceOut" class="animation btn text-size-large text-bold btn btn-labeled bg-<?php echo $shadeClass; ?>" id="<?php echo $shadeClass; ?>" name="<?php echo $colorCode; ?>" value="<?php echo $colorCode; ?>"><b><i class="icon-droplet"></i></b>&nbsp;<?php echo SecurityModule::AddingZeros($colorCode,3); ?></button>
                        </div>
                        <?php if ($counter==6){ echo '</div>'; $counter=0;} ?>
                    <?php } ?>
                </div>
            </div>
            <div class="panel-footer">
                <button id="reset_theme" type="button" class="block-page btn btn-labeled btn-lg bg-slate-800"><b><i class="icon-reset"></i></b> Reset to Default Theme</button>
            </div>
        </div>

    </div>

</div>


<script>

/*    $(document).ready(function () {
        // Animated
        $('#jui-dialog-animated').dialog({
            autoOpen: false,
            modal: true,
            width: 750,
            show: {
                effect: "fade",
                duration: 500
            },
            hide: {
                effect: "fade",
                duration: 500
            }
        });
    });*/




    function PostForm() {
        var topBar = $("#topBar").val();
        var logoBar = $("#logoBar").val();
        var gridView = $("#gridView").val();
        var sideBar = $("#sideBar").val();
        var panels = $("#panels").val();


        $.ajax({
            url:"<?= SecurityModule::AutoUrl('theme-changer'); ?>",
            type:"POST",
            cache:false,
            data:{
                csrf : '<?=Yii::$app->request->getCsrfToken()?>',
                topBar:topBar,
                logoBar:logoBar,
                gridView:gridView,
                sideBar:sideBar,
                panels:panels,
            },
            success:function (data) {
                alert(data);
               /* $('#warningMessage1').html(data);
                $('#jui-dialog-animated').dialog('open');*/
            }
        });
    }


    function ResetTheme() {
        var topBar = '<?php echo $defaultThemeColors['topBar'] ?>';
        var logoBar = '<?php echo $defaultThemeColors['logoBar'] ?>';
        var gridView = '<?php echo $defaultThemeColors['gridView'] ?>';
        var sideBar = '<?php echo $defaultThemeColors['sideBar'] ?>';
        var panels = '<?php echo $defaultThemeColors['panels'] ?>';


        $.ajax({
            url:"<?= SecurityModule::AutoUrl('theme-changer'); ?>",
            type:"POST",
            cache:false,
            data:{
                csrf : '<?=Yii::$app->request->getCsrfToken()?>',
                topBar:topBar,
                logoBar:logoBar,
                gridView:gridView,
                sideBar:sideBar,
                panels:panels,
            },
            success:function (data) {
                alert(data);
               /* $('#warningMessage1').html(data);
                $('#jui-dialog-animated').dialog('open');*/
            }
        });
    }

    $(document).ready(function () {




        $("#reset_theme").on('click',function () {
            ResetTheme();
        });


        $("#apply_theme").on('click',function () {
            PostForm();
        });

        //capture value
        $(".animation").on('click',function () {
            var value = $(this).val();
            var id = $(this).attr('id');
           /* console.log(value);
            console.log(id);*/
            var sector = $("#active_field").val();
            $("#"+sector).val(value);
            $("#addon"+sector).attr('class','input-group-addon bg-'+id);
            $("#"+sector).attr('class','form-control border-lg border-'+id);

            if(sector=='logoBar') {
                var defaultClass = 'sector col-lg-3 logoBar text-center bg-';
                $("#theme-"+sector).attr('class',defaultClass+id);
            }

            if(sector=='topBar') {
                var defaultClass = 'sector col-lg-9 topBar text-center bg-';
                $("#theme-"+sector).attr('class',defaultClass+id);
            }

            if(sector=='sideBar') {
                var defaultClass = 'sector col-lg-3 text-center bg-';
                $("#theme-"+sector).attr('class',defaultClass+id);
            }

            if(sector=='gridView') {
                var defaultClass = 'sector bg-';
                $("#theme-"+sector).attr('class',defaultClass+id);
            }

            if(sector=='panels') {
                var defaultClass = 'sector panel-heading bg-';
                $("#theme-"+sector).attr('class',defaultClass+id);
            }


            <?php foreach ($themeAttributesDefaultClasses as $attribute=>$DefaultCSS){ ?>

            if(sector=='<?php echo $attribute; ?>') {
                $("#theme_"+sector).attr('class','<?php echo $DefaultCSS; ?>'+id);
            }
            <?php } ?>


        });

        //capture value
        $(".sector").on('click',function () {
            var value = $(this).attr('title');
            //console.log(value);
            $("#active_field").val(value);

            // Get animation class from "data" attribute
            var animation = $(this).data("animation");

            // Apply animation once per click
            $(this).parents(".boom").addClass("animated " + animation).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                $(this).removeClass("animated " + animation);
            });

        });


        // Toggle animations
        $("body").on("click", ".animation", function (e) {

            // Get animation class from "data" attribute
            var animation = $(this).data("animation");

            // Apply animation once per click
            $(this).parents(".boom").addClass("animated " + animation).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                $(this).removeClass("animated " + animation);
            });
            e.preventDefault();
        });

    });
</script>