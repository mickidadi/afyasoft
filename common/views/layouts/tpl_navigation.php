<?php
 
$themeUrl = '../theme';
use backend\modules\security\SecurityModule;
?>

<?php

if (!isset(Yii::$app->session['verified']) || Yii::$app->session['verified'] == 0){
    Yii::$app->controller->redirect(['/security/user/logout']);
}

if (isset(Yii::$app->session['flashCode']))
{
    $flash = Yii::$app->session['flashCode'];
    if(isset($flash['code']))
    {
        Yii::$app->session->setFlash($flash['code'],$flash['message']);
        Yii::$app->session['flashDone']+=1;
    }
    //unset(Yii::$app->session['flashCode']);
}
$Duration = 60 * Yii::$app->session["SessionTimeout"];
$SessionWarning = 60 * Yii::$app->session["SessionWarning"]*1000;
$SessionKeepAlive =  60 * Yii::$app->session["SessionKeepAlive"]*1000;
?>




<?php if(!Yii::$app->user->isGuest){ ?>
    <script>
        $(document).ready(function () {
            // Session timeout
            $.sessionTimeout({
                heading: 'h5',
                title: '<?php echo Yii::$app->session["SessionMessageTitle"]; ?>',
                message: '<?php echo Yii::$app->session["SessionMessageBody"]; ?>',
                ignoreUserActivity: false,
                warnAfter: <?php echo $SessionWarning; ?>,
                redirAfter:<?php echo $SessionKeepAlive; ?>,
                keepAliveUrl: '/',
                keepAlive: true,
                keepAliveInterval: <?php echo $SessionKeepAlive; ?>,
                redirUrl: '<?php echo Yii::$app->params["serverLogout"]; ?>',
                logoutUrl: '<?php echo Yii::$app->params["serverLogout"]; ?>',
                keepBtnClass: 'btn btn-success',
                keepBtnText: 'Extend session',
                logoutBtnClass: 'btn btn-danger',
                logoutBtnText: 'Log me out',

            });
        });
    </script>

    <?php SecurityModule::SystemSessionSettings('CHECK',$Duration);  ?>
<?php } ?>







<?php if (SecurityModule::SecurityPolicy('help')){ ?>
    <script type="text/javascript" src="<?php echo $themeUrl; ?>/assets/js/plugins/ui/fab.min.js"></script>
<?php } ?>
<!-- Main navbar -->
<div id="theme_topBar" class="navbar navbar-default header-highlight bg-<?php echo SecurityModule::ThemeColor('topBar'); ?>">
    <div id="theme_logoBar" class="navbar-header bg-<?php echo SecurityModule::ThemeColor('logoBar'); ?>" style="text-align: center;">
        <a class="navbar-brand text-white text-bold text-center" href="../staff"><?php echo Yii::$app->name; ?></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
            <?php if(!Yii::$app->user->isGuest){ ?>

                <?php if(SecurityModule::SecurityPolicy("online support")){ ?>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-satellite-dish2"></i>
                                <span class="visible-xs-inline-block position-right">System updates</span>
                                <span class="badge bg-warning-400">9</span>
                            </a>

                            <div class="dropdown-menu dropdown-content">
                                <div class="dropdown-content-heading">
                                    Available updates
                                    <ul class="icons-list">
                                        <li><a href="#"><i class="icon-sync"></i></a></li>
                                    </ul>
                                </div>

                                <ul class="media-list dropdown-content-body width-350">
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-file-stats2"></i></a>
                                        </div>

                                        <div class="media-body">
                                            FINANCIAL: <a href="#">Extra Graphical Reports </a> improves financial analysis
                                            <div class="media-annotation">4 minutes ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-mail-read"></i></a>
                                        </div>

                                        <div class="media-body">
                                            INFORMATION CENTER: Free Bonus TOKEN for 100 SMS
                                            <div class="media-annotation">36 minutes ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-stack2"></i></a>
                                        </div>

                                        <div class="media-body">
                                            SYSTEM: Additional  <a href="#">Themes</a> improving the <span class="text-semibold">look</span> of your system
                                            <div class="media-annotation">2 hours ago</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-pulse2"></i></a>
                                        </div>

                                        <div class="media-body">
                                            SYSTEM: Bonus <a href="#">LICENSE TOKEN</a>  <span class="text-semibold">Boost</span> your license expiry period up to <span class="text-semibold">5</span> more days
                                            <div class="media-annotation">Dec 18, 18:36</div>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-gift"></i></a>
                                        </div>

                                        <div class="media-body">
                                            Have Carousel ignore keyboard events
                                            <div class="media-annotation">Dec 12, 05:46</div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="dropdown-content-footer">
                                    <a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
                                </div>
                            </div>
                        </li>


                    <p class="navbar-text"><span class="label bg-success">Online</span></p>


                <?php } ?>
            <?php } ?>
            <?php if(SecurityModule::SecurityPolicy("DSM")){ ?>
                <p class="navbar-text"><span class="label bg-success"><i class="icon-checkmark4"></i> DSM ON</span></p>
            <?php }else{ ?>
                <p class="navbar-text"><span class="label bg-danger"><i class="icon-blocked"></i> DSM OFF</span></p>
            <?php } ?>
            <!--<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-git-compare"></i>
                    <span class="visible-xs-inline-block position-right">Git updates</span>
                    <span class="badge bg-warning-400">9</span>
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-heading">
                        Git updates
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-sync"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body width-350">
                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>

                            <div class="media-body">
                                Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                <div class="media-annotation">4 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
                            </div>

                            <div class="media-body">
                                Add full font overrides for popovers and tooltips
                                <div class="media-annotation">36 minutes ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
                                <div class="media-annotation">2 hours ago</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
                            </div>

                            <div class="media-body">
                                <a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
                                <div class="media-annotation">Dec 18, 18:36</div>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>

                            <div class="media-body">
                                Have Carousel ignore keyboard events
                                <div class="media-annotation">Dec 12, 05:46</div>
                            </div>
                        </li>
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>-->
        </ul>

        <p class="navbar-text text-size-large text-bold" style="font-size: large;"><!--<span class="label bg-success">--><span class="text-thin">Current Academic Year</span> : <?php echo SecurityModule::CurrentAcademicYear('academic_year'); ?><!--</span>--></p>

        <ul class="nav navbar-nav navbar-right">

            <?php if (SecurityModule::UserInfo(Yii::$app->user->id,'account_type') == 3){ //Hybrid Account ?>

                <?php
                $iconsArray= SecurityModule::AccountTypes("*","icon");
                ?>
                <li class="dropdown language-switch">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span class="icon-transmission position-left"></span>
                        Switch Account
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php $ACCOUNTS = SecurityModule::AccountTypes('*'); ?>
                        <?php foreach ($ACCOUNTS as $index=>$name){ ?>
                            <?php if ($index!==3){// Skip hybrid Account ?>

                            <?php
                            if (Yii::$app->session['AccountType']==$index){
                                $switcherUrl = '#';
                            }else{
                                $switcherUrl = Yii::$app->urlManager->createUrl('/security/user/account-switcher');
                            }
                            ?>
                                 <li class="<?php if(Yii::$app->session['AccountType']==$index){ echo 'active';}else{echo '';} ?>"><a href="<?= $switcherUrl; ?>"><i class="<?= $iconsArray[$index]; ?>"></i> <?php echo $name; ?></a></li>
                            <?php } ?>

                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <!--<li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php /*echo $themeUrl; */?>/assets/images/flags/gb.png" class="position-left" alt="">
                    English
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="deutsch"><img src="<?php /*echo $themeUrl; */?>/assets/images/flags/de.png" alt=""> Deutsch</a></li>
                    <li><a class="ukrainian"><img src="<?php /*echo $themeUrl; */?>/assets/images/flags/ua.png" alt=""> Українська</a></li>
                    <li><a class="english"><img src="<?php /*echo $themeUrl; */?>/assets/images/flags/gb.png" alt=""> English</a></li>
                    <li><a class="espana"><img src="<?php /*echo $themeUrl; */?>/assets/images/flags/es.png" alt=""> España</a></li>
                    <li><a class="russian"><img src="<?php /*echo $themeUrl; */?>/assets/images/flags/ru.png" alt=""> Русский</a></li>
                </ul>
            </li>-->

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="visible-xs-inline-block position-right">Messages</span>
                    <span class="badge bg-warning-400">2</span>
                </a>

                <div class="dropdown-menu dropdown-content width-350">
                    <div class="dropdown-content-heading">
                        Messages
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-compose"></i></a></li>
                        </ul>
                    </div>

                    <ul class="media-list dropdown-content-body">
                        <li class="media">
                            <div class="media-left">
                                <img src="<?php echo $themeUrl; ?>/assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                <span class="badge bg-danger-400 media-badge">5</span>
                            </div>

                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">James Alexander</span>
                                    <span class="media-annotation pull-right">04:58</span>
                                </a>

                                <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                                <img src="<?php echo $themeUrl; ?>/assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                <span class="badge bg-danger-400 media-badge">4</span>
                            </div>

                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">Margo Baker</span>
                                    <span class="media-annotation pull-right">12:16</span>
                                </a>

                                <span class="text-muted">That was something he was unable to do because...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left"><img src="<?php echo $themeUrl; ?>/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">Jeremy Victorino</span>
                                    <span class="media-annotation pull-right">22:48</span>
                                </a>

                                <span class="text-muted">But that would be extremely strained and suspicious...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left"><img src="<?php echo $themeUrl; ?>/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">Beatrix Diaz</span>
                                    <span class="media-annotation pull-right">Tue</span>
                                </a>

                                <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left"><img src="<?php echo $themeUrl; ?>/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">Richard Vango</span>
                                    <span class="media-annotation pull-right">Mon</span>
                                </a>

                                <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                            </div>
                        </li>
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo Yii::$app->params['USER_DIR'].Yii::$app->session["UserPhoto"]; ?>" alt="">
                    <span><?php echo SecurityModule::UserInfo(Yii::$app->user->id,'username'); ?></span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <?php if (Yii::$app->user->isGuest){ ?>
                        <li><a href="<?= SecurityModule::AutoUrl('login'); ?>"><i class="icon-switch2"></i> Login</a></li>
                    <?php }else{ ?>
                        <li><a href="<?= SecurityModule::AutoUrl('profile'); ?>"><i class="icon-user-plus"></i> My profile</a></li>
                        <li><a href="<?= SecurityModule::AutoUrl('balance'); ?>"><i class="icon-coins"></i> My balance</a></li>
                        <li><a href="<?= SecurityModule::AutoUrl('message'); ?>"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= SecurityModule::AutoUrl('edit-profile'); ?>"><i class="icon-cog5"></i> Account settings</a></li>
                        <li><a href="<?= SecurityModule::AutoUrl('logout'); ?>"><i class="icon-switch2"></i> Logout(<?php echo Yii::$app->user->identity->username; ?>)</a></li>
                    <?php } ?>

                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
<script>
    $(document).ready(function () {
        // Block page
        $('.block-page').on('click', function() {
            var message = '<i class="icon-spinner4 icon-3x spinner"></i> <span class="text-semibold display-block">Please wait</span>';
            $.blockUI({
                //message: '<i class="icon-spinner4 spinner"></i>',
                message: message,
                // timeout: 1000*60, //unblock after 1 minute
                timeout: 10000, //unblock after 1 minute
                // timeout: 1000*60*10, //unblock after 10 Minutes
                overlayCSS: {
                    backgroundColor: '#1b2024',
                    opacity: 0.8,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    padding: 0,
                    zIndex: 1201,
                    backgroundColor: 'transparent'
                },
                onBlock: function(){
                    clearTimeout();
                }
            });


        });





    });


</script>