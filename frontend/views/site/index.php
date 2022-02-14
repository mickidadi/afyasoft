 
 <?php
use Yii;
use yii\helpers\Html;
?>
 
 <div class="view">
 
 <div class="col-md-8">
         

     <a href="<?= Yii::$app->urlManager->createUrl(['site/dashboard','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/analytic.png') ?></i>
                         <div>Dashboard</div>

                 </a>
          

  <a href="<?= Yii::$app->urlManager->createUrl(['registration/patient/index'])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/add_user.png') ?></i>
                         <div>Registration</div>

                 </a>
       
  

 <a href="<?= Yii::$app->urlManager->createUrl(['academicyear/create','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/Set3.png') ?></i>
                         <div>Clinic</div>

                 </a>
 
    <a href="<?= Yii::$app->urlManager->createUrl(['staff/index','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/access.png') ?></i>
                         <div>Inpatient</div>

                 </a>
          
           <a href="<?= Yii::$app->urlManager->createUrl(['account/accounts','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Nursing</div>

                 </a>
    
           <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Appointment Scheduling</div>

                 </a>
     <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Radiology</div>

                 </a>
                 <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Theater</div>

                 </a>
                 <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Laboratory</div>

                 </a>
                 <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Billing</div>

                 </a>
                 <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Pharmancy</div>

                 </a>
                 <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Report</div>

                 </a>
                 <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Vertical Programme</div>

                 </a>
                 <a href="<?= Yii::$app->urlManager->createUrl(['payroll/default','id'=>1])?>" class="btn btn-app" style="min-height:180px">
                         <i><?php echo Html::img('@web/image/transaction.png') ?></i>
                         <div>Mortuary</div>

                 </a>
               </div>
  <div class="col-md-4">
   <?php 
      
echo"<p align='justify'>Shule APP  is comprised of the following modules and their functions<br></p>
   <strong>Admission</strong></p>		
     This module accepts the list of students selected and produce a registered list of students</p>
     <strong>Academics</strong></p>	
     This module keeps track of the students academic records</p>	
     <strong>Accounting</strong></p>	
     This module keeps track of the students Payment records</p>
     <strong>Configuration</strong></p>	
     This module creates and performs general system settings</p>		

     <strong>User Management</strong></p>
     This section Allow user to assign permission or Role to user/Staff.</p>	

     <p>Please select a section in a main menu to continue...! </p>";

         ?>
              </div>
    
 </div>             
 