<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

		 $type = 'EMAIL_FROM';
        $from = \Yii::$app->params['supportEmail'] ;
        $to = $this->email;
        $url = Yii::$app->urlManager->createAbsoluteUrl('/site/reset-password/');
        $url = $url.'?token='.$user->password_reset_token;        
		$subject = 'Test Test';
        //$result = ManageEmails::getEmailContents('forgot_password');
        //$subject = $result['subject'];
        //$body = $result['message'];
        //$older1 = str_replace("[displayname]", $user->first_name, $body);
        //$older2 = str_replace("[email]", $user->email, $older1);  
        //$older3 = str_replace("[displayname]", $user->first_name, $older2);        
        //$message = str_replace("[reset_link]", $url, $older2); 
        $message = '<span>'.$url.'</span>';
        //return $mail = Mailer::sendEmail($from,$to,$subject,$message); // Added by Sushrut Deshpande.
        return
		$mail = \Yii::$app->mailer->compose() 
        ->setTo($to)
        ->setFrom(['farmers.gup@gmail.com' => 'Farmer Spport team'])
        ->setSubject($subject)
        //->setTextBody('Did you request a password reset /\n/for your account?','text/plain')
        //->setHtmlBody($header.$msg.$footer)            
        ->setHtmlBody($message)            
        //->attach($imagePath)
        ->send();		
    }
}
