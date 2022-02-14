<?php
//$code_constant = require(__DIR__ . '/code_constant.php');
return [
    'adminEmail' => 'mickidadi@gmail.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'supportEmail' => 'mickidadimsoka@gmail.com',
    'user.passwordResetTokenExpire' => 3600,
    'company_name' => 'Afyasoft',
    'concept_data' => ['allorderable'=>1858,'general_service'=>1,'laboratory_service'=>2,'medicine_service'=>3,'procedure_service'=>4,'radiology_service'=>5,'drug_routes'=>65,"dosagefrequency"=>4,'duration_units'=>75,"dose_units"=>56],
    "billing_status"=>["quote_main_new"=>1,"quote_line_new"=>5,"quote_line_cancelled"=>7,"quote_line_Confirmed"=>6],
    "code_constants"=>["create_alert"=>"Data Saved Successfully","update_alert"=>"Data updated Successfully","errors_alert"=>"Sorry Processing Failled"],
    'RabbitMQ' => [
        'server_ip' => '127.0.0.1',
        'link_url' => 'http://127.0.0.1:',
        'server_port' => '5672',
        'username' => 'testgepg',
        'password' => 'test@gepg2o1',
    ],
];