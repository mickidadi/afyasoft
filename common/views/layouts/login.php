<?php

/**
 * @var $content string
 */

use yii\helpers\Html;
use common\widgets\Alert;
yiister\adminlte\assets\Asset::register($this);

?>
 <!DOCTYPE html>
 <?php $this->beginPage() ?>
<html lang="en" dir="ltr">
	<head>
	<meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode('Shuleapp') ?></title>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Shuleapp shule school management system E-learning Learning Material" name="description">
		<meta content="Lemon Data Technologies Limited" name="author">
		<meta name="keywords" content="Shuleapp , shule,school,shule app, school  management system, E-learning ,Learning ,Learning,online learning, Material,masomo,Best school management system"/>
 
		<!--Favicon -->
		<link rel="icon" href="uploadimage/logo/2017_logo.png" type="image/x-icon"/>
 
		<!-- Style css -->
		<link href="login/assets/css/style.css" rel="stylesheet" />
 
        <?php $this->head() ?>

	</head>
	<?php $this->beginBody() ?>
	<body class="h-100vh page-style1 light-mode default-sidebar">
	
            <?= Alert::widget() ?>
            <?= $content ?>
  <!--Copyright Start-->
 
  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<!--Footer End--> 


  