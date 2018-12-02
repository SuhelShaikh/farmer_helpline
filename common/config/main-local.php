<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=marveyr9_farmers_helpline',
            'username' => 'marveyr9',
            'password' => '5s3^$rS9?3Dx',
            'charset' => 'utf8',
        ],
	/*'mail' => [
        'class' => 'yii\swiftmailer\Mailer',
        'viewPath' => '@backend/mail',
        'useFileTransport' => false,//set this property to false to send mails to real email addresses
        //comment the following array to send mail using php's mail function
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'farmers.gup@gmail.com',
            'password' => 'farmer123@',
            'port' => '587',
            'encryption' => 'tls',
            ],
    ],*/
	         'mailer' => [
            'class'            => 'zyx\phpmailer\Mailer',
            'viewPath'         => '@common/mail',
            'useFileTransport' => false,
            'config'           => [
                'mailer'     => 'smtp',
                'host'       => 'smtp.gmail.com',
                'port'       => '465',
                'smtpsecure' => 'ssl',
                'smtpauth'   => true,
                'username'   => 'farmers_gup@gmail.com',
                'password'   => 'farmer123@',
            ],
        ],
    ],
];
