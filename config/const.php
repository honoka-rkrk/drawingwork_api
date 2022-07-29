<?php

/*
|--------------------------------------------------------------------------
| Application Pre-defined Values
|--------------------------------------------------------------------------
 */

return [
    'password_regex' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&\/\\\"{}|;<>' .
        '[\]`+~=_,^()-.\:\'])[A-Za-z\d@$!%*#?&\/\\\"{}|;<>[\]`+~=_,^()-.\:\']{8,20}$/i',
    'date_format' => 'Y-m-d',
    'datetime_format' => DateTime::ATOM,
    'hour_timeout_open_mail' => 96,
    'hour_timeout_reaction_answer' => 168,
    'date_format_filename' => 'Ymd',
    'date_format_en_slash' => 'Y/m/d',
    'date_format_template_mail' => 'Y/m/d H:i:s',
    'zoom_start_time_format' => "Y-m-d\TH:i:s",
    'date_format_timestamp' => 'Y-m-d H:i:s',
    'date_format_report_job' => 'Y-m',
    'refresh_token_lifetime' => env('REFRESH_TOKEN_LIFETIME', 180),
    'confirmation_token_lifetime' => env('CONFIRMATION_TOKEN_LIFETIME', 10080),
    'frontend_user_url' => env('FRONTEND_USER_URL'),
    'frontend_app_url' => env('FRONTEND_APP_URL'),
    'reply_mail_dns' => env('REPLY_MAIL_DNS'),
    'mail_webhook_key' => env('MAIL_WEBHOOK_KEY'),
    'page_limit' => 20,
    'grant_type' => [
        'login' => 'login',
        'refresh_token' => 'refreshToken',
    ],
    'presigned_create_lifetime' => env('PRESIGNED_CREATE_LIFETIME', '1 minute'),
    'presigned_get_lifetime' => env('PRESIGNED_GET_LIFETIME', '1 hour'),
    'format_file_upload' => [
        'csv',
        'xlsx'
    ],
    'format_encoding' => [
        'utf_8' => 'UTF-8',
        'ISO-8859-1',
        'SJIS',
    ],
    'file_upload_max_size' => 5120000, # bytes
    'public_token_expired_hours' => 720,
    'public_token_schedule_expired_hours' => 720,
    'public_token_interview_expired_hours' => 336,
    'mail_subject_invite_account' => '【miryo⁺】サービスへの招待メールが届きました',
    'mail_subject_invite_company' => '【miryo⁺】サービス開始についてのご案内',
    'batch_alert_lock_time' => 3600,
    'batch_alert_lock_key' => 'batch_register_alert',
    'batch_action_alert_lock_time' => 7200,
    'batch_action_alert_lock_key' => 'batch_register_action_alert',
    'batch_velocity_lock_time' => 3600,
    'batch_velocity_lock_key' => 'bacth_register_velocity',
    'email_dns_regex' => '/^(?:[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[^@][a-zA-Z]{1,4})?$/',
    'company_name' => '{企業名}',
    'interview_survey_subject_replace' => '【{企業名}】日程調整へのご回答ありがとうございました',
    'file_extension_regex' => '/^.*\.(jpg|jpeg|png|pdf|csv|xlsx|xls|doc|docx|ppt|pptx)$/i',
    'public_token_upload_expired_hours' => 720,
    'jobseeker_file_max_size' => 10485760, # bytes
    'zoom_refresh_token_lifetime' => 15, #year
    'add_check_time' => 10, #seconds
    'max_retries_refresh' => 3, #time
    'zoom_config' => [
        'clientId' => env('ZOOM_CLIENT_ID', ''),
        'clientSecret' => env('ZOOM_CLIENT_SECRET', ''),
        'redirectUri' => env('FRONTEND_APP_URL', '') . '/connect-zoom',
        'verificationToken' => env('ZOOM_VERIFICATION_TOKEN', '')
    ],
    'teams_refresh_token_lifetime' => 90, #days
    'teams_config' => [
        'clientId' => env('TEAMS_CLIENT_ID', ''),
        'clientSecret' => env('TEAMS_CLIENT_SECRET', ''),
        'redirectUri' => env('FRONTEND_APP_URL', '') . '/connect-teams',
        'tenant' => 'organizations',
        'scope' => 'https://graph.microsoft.com/.default offline_access'
    ],
    'route_meetings' => [
        'API-JS-150',
        'API-RE-060',
        'API-RE-090',
    ],
];
