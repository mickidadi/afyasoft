<?php
/**
 * Created by PhpStorm.
 * User: obedy
 * Date: 5/20/19
 * Time: 8:22 AM
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use backend\modules\security\models\CompanySetup;
use yii\helpers\ArrayHelper;

?>

             <!-- User Registration login-form-->
                <?php $form = ActiveForm::begin(['id' => 'sign-up-form']); ?>
                    <div class="panel panel-body login-form" style="width: 500px;">
                        <div class="text-center">
                            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                            <h5 class="content-group">Create <b><?php echo Yii::$app->name; ?></b> account <small class="display-block">All fields are required</small></h5>
                        </div>

                        <div class="content-divider text-muted form-group"><span>Profile Information</span></div>

                        <div class="form-group has-feedback has-feedback-left">
                            <?= $form->field($model, 'company_id')->dropDownList(ArrayHelper::map(CompanySetup::find()->orderBy(['id'=>'ASC'])->all(),'id','name'),['data-placeholder'=>"Select Your Instituion...",'class' => 'select-search'])->label(false) ?>
                            <div class="form-control-feedback">
                            </div>
                           </div>


                        <div class="form-group has-feedback has-feedback-left">
                            <?= $form->field($model, 'account_type')->dropDownList([''=>'','1'=>'Student Account','2'=>'Staff Account'],['data-placeholder'=>"Select account type...",'class' => 'select-search'])->label(false) ?>
                            <div class="form-control-feedback">
                            </div>
                          </div>

                        <div class="form-group has-feedback has-feedback-left" id="staffInput" style="display:none;">

                            <select id="staffSearch" name="staffSearch" class="select-search"
                                    data-placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search Staff Details" tabindex="2"
                                    onchange="staffData(this)"></select>

                             <!--<div class="form-control-feedback">
                                <i class="icon-search4 text-muted"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>-->

                            <div id="searcher_containment" class="bg-primary-800"></div>
                            <div id="searcher_results" class="bg-primary-800"></div>

                            <?= $form->field($model, 'staff_id')->hiddenInput(['data-placeholder'=>' Search Staff Check Number','class' => 'form-control'])->label(false); ?>

                        </div>

                        <div class="form-group has-feedback has-feedback-left" id="studentInput" style="display: none;">
                            <!--<div class="form-control-feedback">
                                <i class="icon-search4 text-muted"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>-->
                            <select id="studentSearch" name="studentSearch" class="select-search"
                                    data-placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search Student RegNo" tabindex="2"
                                    onchange="studentData(this)"></select>

                            <?= $form->field($model, 'student_id')->hiddenInput(['data-placeholder'=>' Search Student RegNo.','class' => 'form-control'])->label(false); ?>

                        </div>


                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon bg-grey-800"><i class="icon-user"></i></div>
                                        <div class="form-control border-lg border-grey-800 text-size-large" id="search_info"><span class="text-muted">Your Full Information goes here...</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback has-feedback-left">
                                    <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'First Name'])->label(false) ?>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback has-feedback-left">
                                    <?= $form->field($model, 'middle_name')->textInput(['placeholder' => 'Middle Name'])->label(false) ?>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group has-feedback has-feedback-left">
                                    <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Last Name'])->label(false) ?>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="content-divider text-muted form-group"><span>Your credentials</span></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback has-feedback-left">
                                    <?= $form->field($model, 'username')->textInput(['placeholder' => 'username'])->label(false) ?>

                                    <div class="form-control-feedback">
                                        <i class="icon-user-check text-muted"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-feedback has-feedback-left">
                                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Create Password'])->label(false) ?>

                                    <div class="form-control-feedback">
                                        <i class="icon-user-lock text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-divider text-muted form-group"><span>Your privacy</span></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback has-feedback-left">
                                    <?php
                                    echo $form->field($model,'phone')->widget(MaskedInput::className(),
                                        [
                                            'options'=>['placeholder' => 'Mobile Number', 'class'=>'form-control'],
                                            'mask' => '255999999999'
                                        ]
                                    )->label(false); ?>

                                    <div class="form-control-feedback">
                                        <i class="icon-phone text-muted"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback has-feedback-left">
                                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Your E-mail'])->label(false) ?>
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



















                        <div class="form-group has-feedback has-feedback-left">
                            <?= $form->field($model, 'repeat_email')->textInput(['placeholder' => 'Repeat E-mail'])->label(false) ?>

                            <div class="form-control-feedback">
                                <i class="icon-mention text-muted"></i>
                            </div>
                        </div>

                        <div class="content-divider text-muted form-group"><span>Additions</span></div>

                        <div class="form-group">
                            <!--<div class="checkbox">
                                <label>
                                    <input type="checkbox" class="styled" checked="checked">
                                    Send me <a href="#">test account settings</a>
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="styled" checked="checked">
                                    Subscribe to monthly newsletter
                                </label>
                            </div>-->

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="styled" id="acceptance">
                                    Accept <a href="#">terms of service</a>
                                </label>
                            </div>
                        </div>
                        <?= Html::submitButton('Register<i class="icon-circle-right2 position-right"></i>', ['id'=>'register_button','class' => 'btn bg-teal btn-block btn-lg', 'name' => 'register_button','disabled'=>'disabled']) ?>
                      </div>
<script>
    var serviceTerms = document.getElementById('acceptance');
    var registerBtn = document.getElementById('register_button');
    // when unchecked or checked, run the function
    serviceTerms.onchange = function(){
        if(this.checked){
            registerBtn.disabled = false;
            //console.log('checked');
        } else {
            registerBtn.disabled = true;
           // console.log('unchecked');
        }

    }
    function ClearInfo(){
        $("#userregistration-first_name").val("");
        $("#userregistration-middle_name").val("");
        $("#userregistration-last_name").val("");
        $("#userregistration-phone").val("");
        $("#userregistration-username").val("");
        $("#userregistration-password").val("");
        $("#userregistration-email").val("");
        $("#userregistration-repeat_email").val("");


            var selectedValue = $("#userregistration-account_type").val();
            if( selectedValue == '1'){
                $("#userregistration-staff_id").val("");
                document.getElementById('staffInput').style.display = 'none';
                $("#studentInput").attr('style','display','block');
            }else{
                if( selectedValue == '2'){
                    $("#userregistration-student_id").val("");
                    $("#staffInput").attr('style','display','block');
                    document.getElementById('studentInput').style.display = 'none';

                }
            }

    }
    function staffData(mdn) {
        var remoteSearchCustomer = document.getElementById('staffSearch');

        //event.preventDefault();
        // alert(mdn.value);

        /* get the action attribute from the <form action=""> element */
        var $form = $(this),

            url = "<?php echo Yii::$app->urlManager->createUrl(['/security/user/staff-feedback']);?>" + "&searchKey=" + mdn.value;

        /* Send the data using post */
        var posting = $.post(url, $("signup-form").serialize());

        /* Alerts the results */
        posting.done(function (data) {


            var output = $.parseJSON(data);
            $("#userregistration-first_name").val(output.salutation +''+ output.first_name);
            $("#userregistration-middle_name").val(output.middle_name);
            $("#userregistration-last_name").val(output.last_name);
            $("#userregistration-email").val(output.email);
            $("#userregistration-repeat_email").val(output.email);
            $("#userregistration-phone").val(output.mobile_number);

            if (output.email!=='' && output.email!==null){
                $("#userregistration-email").attr('readOnly','readOnly');
                $("#userregistration-repeat_email").attr('readOnly','readOnly');
            }


            if (output.first_name!=='' && output.first_name!==null){ $("#userregistration-first_name").attr('readOnly','readOnly');}
            if (output.middle_name!=='' && output.middle_name!==null){ $("#userregistration-middle_name").attr('readOnly','readOnly');}
            if (output.last_name!=='' && output.last_name!==null){ $("#userregistration-last_name").attr('readOnly','readOnly');}
            if (output.mobile_number!=='' && output.mobile_number!==null){ $("#userregistration-phone").attr('readOnly','readOnly');}

            $("#userregistration-staff_id").val(output.staff_id);
            $("#userregistration-student_id").val("");
        });

    }
    function studentData(mdn) {
        var remoteSearchCustomer = document.getElementById('studentSearch');

        //event.preventDefault();
        // alert(mdn.value);

        /* get the action attribute from the <form action=""> element */
        var $form = $(this),

            url = "<?php echo Yii::$app->urlManager->createUrl(['/security/user/student-feedback']);?>" + "&searchKey=" + mdn.value;

        /* Send the data using post */
        var posting = $.post(url, $("signup-form").serialize());

        /* Alerts the results */
        posting.done(function (data) {


            var output = $.parseJSON(data);
            $("#userregistration-first_name").val(output.first_name);
            $("#userregistration-middle_name").val(output.middle_name);
            $("#userregistration-last_name").val(output.last_name);
    /*        $("#userregistration-email").val(output.email);
            $("#userregistration-repeat_email").val(output.email);
            $("#userregistration-phone").val(output.mobile_number);*/

            /*if (output.email!=='' && output.email!==null){
                $("#userregistration-email").attr('readOnly','readOnly');
                $("#userregistration-repeat_email").attr('readOnly','readOnly');
            }*/

                $("#userregistration-staff_id").val("");
                $("#userregistration-student_id").val(output.student_id);





            if (output.first_name!=='' && output.first_name!==null){ $("#userregistration-first_name").attr('readOnly','readOnly');}
            if (output.middle_name!=='' && output.middle_name!==null){ $("#userregistration-middle_name").attr('readOnly','readOnly');}
            if (output.last_name!=='' && output.last_name!==null){ $("#userregistration-last_name").attr('readOnly','readOnly');}
           // if (output.mobile_number!=='' && output.mobile_number!==null){ $("#userregistration-phone").attr('readOnly','readOnly');}


        });

    }
    $(document).ready(function () {
        // Select with search
        $('.select-search').select2();
        $("#userregistration-account_type").on('change',function () {
         ClearInfo();



        });


        $("#staffSearch").select2({
            minimumInputLength: 2,
            ajax: {
                url: "<?php echo Yii::$app->urlManager->createUrl(['/security/user/staff-search']); ?>",
                type: "POST",
                quietMillis: 1000,
                data: function (term) {

                    return {
                        csrf : '<?=Yii::$app->request->getCsrfToken()?>',
                        term: term
                    };
                },
                processResults: function (data) {
                    data = $.parseJSON(data);
                    //console.log(data);

                    document.getElementById('searcher_containment').style.display = 'block';


                    return {
                        results: data
                    };
                }
            },
            sorter: function (data) {
                return data.sort(function (a, b) {
                    if (a.text > b.text) {
                        return 1;
                    }
                    if (a.text < b.text) {
                        return -1;
                    }
                    return 0;
                });
            }
        });
        $("#studentSearch").select2({
            minimumInputLength: 2,
            ajax: {
                url: "<?php echo Yii::$app->urlManager->createUrl(['/security/user/student-search']); ?>",
                type: "POST",
                quietMillis: 1000,
                data: function (term) {

                    return {
                        csrf : '<?=Yii::$app->request->getCsrfToken()?>',
                        term: term
                    };
                },
                processResults: function (data) {
                    data = $.parseJSON(data);
                    //console.log(data);
                    $.each(data,function (index,obj) {
                        //console.log(obj.id);


                    });



                    document.getElementById('searcher_containment').style.display = 'block';


                    return {
                        results: data
                    };
                }
            },
            sorter: function (data) {
                return data.sort(function (a, b) {
                    if (a.text > b.text) {
                        return 1;
                    }
                    if (a.text < b.text) {
                        return -1;
                    }
                    return 0;
                });
            }
        });
    });
</script>

<?php ActiveForm::end(); ?>
                <!-- /user Registration -->


