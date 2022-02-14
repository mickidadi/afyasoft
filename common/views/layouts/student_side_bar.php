<?php
/**
 * Created by PhpStorm.
 * User: obedy
 * Date: 5/17/19
 * Time: 5:26 PM
 */
use  backend\modules\security\SecurityModule;
//Yii::$app->session['CurrentPackage'] = 100;


?>

<!-- Main sidebar -->
<div id="theme_sideBar" class="sidebar sidebar-main bg-<?php echo SecurityModule::ThemeColor('sideBar'); ?>">
    <div class="sidebar-content">

        <!-- Company menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">

                    <div class="media-body">
                        <div class="text-center">
                            <a href="<?php echo Yii::$app->session['CompanyWebsite']; ?>" class="media-center" target="_blank">
                                <img src="<?php echo Yii::$app->params['COMPANY_DIR'].Yii::$app->session["CompanyLogo"]; ?>" class="img-circle" width="100px" alt="">
                            </a>

                        </div>
                         <span class="media-heading text-size-mini text-thin text-center text-semibold text-uppercase"><?php echo Yii::$app->session["CompanyName"]; ?></span>
                        <div class="text-size-mini text-muted text-center">
                            <i class="icon-pin text-size-small"></i> <?php echo Yii::$app->session["CompanyAbbreviation"]; ?>
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Company menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">


                    <li style="<?php echo SecurityModule::MenuAccess('default'); ?>" class="<?php echo SecurityModule::ActiveMenu('default','index'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/default/index']); ?>"><i class="icon-user"></i> <span>Dashboard</span></a></li>

                    <li>
                        <a href="#"><i class="icon-profile"></i> <span>My Profile</span></a>
                        <ul>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php echo SecurityModule::ActiveMenu('my-profile','profile'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-eye"></span> Profile Preview</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php echo SecurityModule::ActiveMenu('my-profile','edit'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/edit']); ?> " id=""><span class="icon-pencil"></span> Edit Profile</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php echo SecurityModule::ActiveMenu('my-tasks'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-tasks/index']); ?> " id=""><span class="icon-calendar22"></span> My Tasks</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php echo SecurityModule::ActiveMenu('my-profile','change-password'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/change-password']); ?> " id=""><span class="icon-key"></span> Change Password</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-quill2"></i> <span>Registration</span></a>
                        <ul>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-graduation"></i> <span>Academics</span></a>
                        <ul>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="#"><i class="icon-cash3"></i> <span>Payments</span></a>
                        <ul>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-home9"></i> <span>Accommodation</span></a>
                        <ul>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-mouse"></i> <span>MISC</span></a>
                        <ul>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-box-add"></span> Vote</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-chart"></i> <span>Reports</span></a>
                        <ul>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-box-add"></span> Vote</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                            <li style="<?php //echo SecurityModule::MenuAccess('country'); ?>" class="<?php //echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/student/my-profile/profile']); ?> " id=""><span class="icon-profile"></span> Identity Card</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
