<?php
 
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
                            <img src="image/logo/logo.jpeg" width='180px'  alt="logo">
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

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li style="<?php echo SecurityModule::MenuAccess('default'); ?>" class="<?php echo SecurityModule::ActiveMenu('default','index'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/default/index']); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li class="navigation-header"><span>Initial Setup</span> <i class="icon-menu" title="Initial Setup"></i></li>
                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>Company Setup</span></a>
                        <ul>
                            <li style="<?php echo SecurityModule::MenuAccess('basic-info'); ?>" class="<?php echo SecurityModule::ActiveMenu('basic-info'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/basic-info/index']); ?> " id=""><span class="icon-home"></span> Basic Info</a></li>

                            <li>
                                <a href="#"><i class="icon-tree6"></i> <span>Structure</span></a>
                                <ul>
                                    <!--<li style="<?php /*echo SecurityModule::MenuAccess('report-group'); */?>" class="<?php /*echo SecurityModule::ActiveMenu('report-group'); */?>"><a href="<?php /*echo Yii::$app->urlManager->createUrl(['/security/report-group/index']); */?> " id=""><span class="icon-gift"></span> Report Group</a></li>-->
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="icon-location4"></i> <span>Locations</span></a>
                                <ul>
                                    <li style="<?php echo SecurityModule::MenuAccess('country'); ?>" class="<?php echo SecurityModule::ActiveMenu('country'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/country/index']); ?> " id=""><span class="icon-location3"></span> Countries</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('region'); ?>" class="<?php echo SecurityModule::ActiveMenu('region'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/region/index']); ?> " id=""><span class="icon-location3"></span> Regions</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('district'); ?>" class="<?php echo SecurityModule::ActiveMenu('district'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/district/index']); ?> " id=""><span class="icon-location3"></span> Districts</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="icon-info22"></i> <span>Notifications</span></a>
                                <ul>
                                    <li style="<?php echo SecurityModule::MenuAccess('notification-category'); ?>" class="<?php echo SecurityModule::ActiveMenu('notification-category'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/notification-category/index']); ?> " id=""><span class="icon-tree7"></span> Categories</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('notification-template'); ?>" class="<?php echo SecurityModule::ActiveMenu('notification-template'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/notification-template/index']); ?> " id=""><span class="icon-profile"></span> Templates</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('sms-logs'); ?>" class="<?php echo SecurityModule::ActiveMenu('sms-logs'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/sms-logs/index']); ?> " id=""><span class="icon-bubble-notification"></span> SMS Logs</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('email-logs'); ?>" class="<?php echo SecurityModule::ActiveMenu('email-logs'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/email-logs/index']); ?> " id=""><span class="icon-envelop5"></span> E-mails Logs</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="icon-dots"></i> <span>Misc</span></a>
                                <ul>
                                    <li style="<?php echo SecurityModule::MenuAccess('currency'); ?>" class="<?php echo SecurityModule::ActiveMenu('currency'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/currency/index']); ?> " id=""><span class="icon-coins"></span> Currencies</a></li>
                                </ul>
                            </li>
                            <!--<li class="navigation-divider"></li>-->

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-shield2"></i> <span>System Security</span></a>
                        <ul>
                            <li style="<?php echo SecurityModule::MenuAccess('user-management'); ?>" class="<?php echo SecurityModule::ActiveMenu('user-management'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/user-management/index']); ?> " id=""><span class="icon-users2"></span> User Management</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('user-group'); ?>" class="<?php echo SecurityModule::ActiveMenu('user-group'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/user-group/index']); ?> " id=""><span class="icon-users4"></span> Users Group</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('user-title'); ?>" class="<?php echo SecurityModule::ActiveMenu('user-title'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/user-title/index']); ?> " id=""><span class="icon-bowtie"></span> Users Title</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('security-policy'); ?>" class="<?php echo SecurityModule::ActiveMenu('security-policy'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/security-policy/index']); ?> " id=""><span class="icon-shield-check"></span> Security policy</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('online-update'); ?>" class="<?php echo SecurityModule::ActiveMenu('online-update'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/online-update/index']); ?> " id=""><span class="icon-earth"></span> Online Updates</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('audit-trail'); ?>" class="<?php echo SecurityModule::ActiveMenu('audit-trail'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/audit-trail/index']); ?> " id=""><span class="icon-shield-notice"></span> Audit Trail</a></li>
                            <li>
                                <a href="#"><i class="icon-power-cord"></i> <span>Device Management</span></a>
                                <ul>
                                    <li style="<?php echo SecurityModule::MenuAccess('device-category'); ?>" class="<?php echo SecurityModule::ActiveMenu('device-category'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/device-category/index']); ?> " id=""><span class="icon-cube3"></span>Device Categories</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('device-brand'); ?>" class="<?php echo SecurityModule::ActiveMenu('device-brand'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/device-brand/index']); ?> " id=""><span class="icon-price-tag"></span> Device Brands</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('authorized-devices'); ?>" class="<?php echo SecurityModule::ActiveMenu('authorized-devices'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/authorized-devices/index']); ?> " id=""><span class="icon-shield-check"></span> Authorized Devices</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('device-assignment'); ?>" class="<?php echo SecurityModule::ActiveMenu('device-assignment'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/device-assignment/index']); ?> " id=""><span class="icon-user-plus"></span> Device Assignment</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('device-logs'); ?>" class="<?php echo SecurityModule::ActiveMenu('device-logs'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/device-logs/index']); ?> " id=""><span class="icon-clipboard"></span> Device Logs</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="navigation-header"><span>Advanced Setup</span> <i class="icon-menu" title="Initial Setup"></i></li>
                    <li>
                        <a href="#"><i class="icon-gear"></i> <span>System Behavior</span></a>
                        <ul>
                            <li style="<?php echo SecurityModule::MenuAccess('package-management'); ?>" class="<?php echo SecurityModule::ActiveMenu('package-management'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/package-management/index']); ?> " id=""><span class="icon-gift"></span> Package Management</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('help'); ?>" class="<?php echo SecurityModule::ActiveMenu('help'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/help/index']); ?> " id=""><span class="icon-help"></span> Help Management</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('data-category'); ?>" class="<?php echo SecurityModule::ActiveMenu('data-category'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/data-category/index']); ?> " id=""><span class="icon-keyboard"></span> Data Category</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('data-format'); ?>" class="<?php echo SecurityModule::ActiveMenu('data-format'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/data-format/index']); ?> " id=""><span class="icon-keyboard"></span> Data Formats</a></li>


                            <li>
                                <a href="#"><i class="icon-chart"></i> <span>Report Management</span></a>
                                <ul>
                                    <li style="<?php echo SecurityModule::MenuAccess('report-group'); ?>" class="<?php echo SecurityModule::ActiveMenu('report-group'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/report-group/index']); ?> " id=""><span class="icon-gift"></span> Report Group</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('report'); ?>" class="<?php echo SecurityModule::ActiveMenu('report'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/report/index']); ?> " id=""><span class="icon-archive"></span> Reports</a></li>
                                    <li style="<?php echo SecurityModule::MenuAccess('report-access'); ?>" class="<?php echo SecurityModule::ActiveMenu('report-access'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/report-access/index']); ?> " id=""><span class="icon-checkbox-checked2"></span> Report Access</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-database"></i> <span>Data Management</span></a>
                        <ul>
                            <li style="<?php echo SecurityModule::MenuAccess('restore-point'); ?>" class="<?php echo SecurityModule::ActiveMenu('restore-point'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/restore-point/index']); ?> " id=""><span class="icon-history"></span> Restore Point</a></li>
                            <li style="<?php echo SecurityModule::MenuAccess('data-recycling'); ?>" class="<?php echo SecurityModule::ActiveMenu('data-recycling'); ?>"><a href="<?php echo Yii::$app->urlManager->createUrl(['/security/data-recycling/index']); ?> " id=""><span class="icon-sync spinner"></span> Data Recycling</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
