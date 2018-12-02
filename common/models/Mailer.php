<?php

namespace common\models;
use Yii;
use yii\helpers\Url;
use frontend\models\SiteSetting; // Added by Swati

class Mailer { 
    public static function sendEmail($from, $to, $subject, $msg, $fromName="EzzyScorecard", $attachment=NULL, $bcc=NULL) 
    {	
        if(is_array($to)) {
            foreach($to as $email) {
                if (strpos($email, 'example.com') !== false) {
                    return true;
                }
            }
        } else {
            if (strpos($to, 'example.com') !== false) {
                return true;
            }
        }
        $adminstr = 'admin';
        $httpUrl = \frontend\models\SiteSetting::getSettingValue('PROTOCOL');
        $url = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."frontend/web/blue/images/"; 
        $link = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl;
        $pos = strpos($url,$adminstr);
        $pos1 = strpos($link,$adminstr);
        if ($pos === false && $pos1 === false) {
            $url = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."frontend/web/blue/images/"; 
            $link = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl;              
        } else {
            $url = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."backend/web/images/"; 
            $url = str_replace('/admin', '', $url);
            $link = str_replace('/admin', '', $link);
        }

        // Added by Swati - for social media icon links
        $fbLink = SiteSetting::getSettingValue('FACEBOOK');
        $linkedIn =  SiteSetting::getSettingValue('LINKEDIN');
        $gPlus = SiteSetting::getSettingValue('GOOGLEPLUS');
        
        $header =   '<style>
                    body{margin:0px;}.foot-p{color:#fff;text-align:center;font-size:8pt;font-family:verdana;line-height:150%}.msg-text{font-family:verdana;font-size:10pt;text-align:justify;color:#212121}
                    </style>
                    <div style="background-color:#b6b6b6;padding-top:40px;padding-right: 15px;padding-bottom: 15px;padding-left: 0px;height:auto;">
                    <div style="margin:0 auto;background-color:none;" align="center">
                    <div style="background-color:none;color:#fff;">
                    <div style="background-color:#212121;border-bottom:5px solid #03a9f4">
                        <table width="98%">
                            <tr>
                                <td style="text-align:left">
                                    <a  href="'.$link.'"   style="margin-top: 10px;margin-left:6px" ><img style="" src="'.$url.'blog-logo.png" height="65" width="60" alt="EzzyScorecard" /></a>
                                </td>
                                <td style="text-align:right">
                                    <a href="'.$link.'blog" valign="middle" style="color:#ffffff;text-decoration:none;padding:0px;display:inline-block"><img src="'.$url.'blog-icon.png" alt="Blog" width="70px" style="vertical-align:middle"/></a>
                                    <a href="'.$link.'contact-us" valign="middle" style="color:#ffffff;text-decoration:none;padding:0px;display:inline-block"><img src="'.$url.'contact-icon.png" alt="Contact" width="90px" style="vertical-align:middle"/></a>
                                </td>
                            </tr>
                        </table>
                    </div>';
        $footer =   '<div style="font-size:10pt;padding:5px 0px;border-top:5px solid #727272"">
                    <p class="foot-p" style="margin:0px 0px;line-height:100%;color:#212121;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">Please do not reply to this email</p>
                    <p class="foot-p" style="margin:0px 0px;line-height: 100%;color:#212121;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">You can login to your EzzyScorecard account with <a href="'.$link.'" style="text-decoration:none;color:#0288d1">www.ezzyscorecard.com</a> 
                    </p>
                    <div style="text-align:center;width:98%">
                        <div style="width:100%">
                                <a style="margin:0px 5px;" href=""><img src="'.$url.'email-facebook.png" /></a>
                                <a style="margin:0px 5px;" href=""><img src="'.$url.'email-twitter.png" /></a>
                                <a style="margin:0px 5px;" href=""><img src="'.$url.'email-linkedin.png" /></a>
                                <a style="margin:0px 5px;" href=""><img src="'.$url.'email-g-plus.png" /></a>
                        </div>
                    </div>
                    <p class="foot-p" style="color:#212121;text-align:center;margin:5px 0px">Copyright &copy; '.date('Y').' by EzzyScorecard</p>
                    </div>	
                    </div>
                    </div>';		
        $msg =  '<table cellpadding="0" cellspacing="0" width="100%" class="msg-text" style=""><tr><td>'.$msg.'</td></tr></table>';
        $tablemail = '<style>
                        v\:* { behavior: url(#default#VML); display: inline-block; }
                        body{padding-bottom: 0px; margin-bottom: 0px;padding-right: 0px; margin-right: 0px;padding-left: 0px; margin-left: 0px;}
                    </style>
                    <table width="100%" border="0" cellpadding="10" cellspacing="0" align="center" bgcolor="#727272">
                        <tr>
                            <td align="center">
                                <a href="'.$link.'" style="margin-top: 10px;margin-left:6px">
                                    <img style="" src="'.$url.'blog-logo.png" height="65" width="60" alt="EzzyScorecard">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-top:4px solid #43c8fa; width:50%">
                                    <tr>
                                        <td>
                                            '.$msg.'
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#686868;padding-top:5px;padding-bottom:5px">
                                            <p style="text-align:center;font-family:verdana;font-size:11px;margin-top:5px;margin-bottom:10px;color:#ffffff">
                                                Subscribe to our Newsletter with Our<a href="'.$link.'blog" style="color:#53c9f5;text-decoration:none;">
                                                BLOG</a>. Feel free to <a href="'.$link.'contact-us" style="color:#53c9f5;text-decoration:none;">CONTACT US</a>.</p>
                                            <p style="text-align:center;font-family:verdana;font-size:11px;margin-top:5px;margin-bottom:10px;color:#ffffff">If more question visit our <a href="'.$link.'faqs" style="color:#53c9f5;text-decoration:none;">FAQS</a></p>
                                        </td>
                                    </tr>
                                </table>	
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <p style="margin:5px 0px;line-height:100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                Please do not reply to this email.
                                            </p>
                                            <p style="margin:5px 0px;line-height: 100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                You can login to your EzzyScorecard account with
                                                <a href="'.$link.'" style="text-decoration:none;color:#1ab4fb">www.ezzyscorecard.com</a> 
                                            </p>

                                            <table width="0%" border="0" align="center" cellpadding="0" cellspacing="10" style="text-align:center">
                                                <tr>
                                                    <td align="right"><a style="margin:0px 5px;" target="_blank" href="'.$fbLink.'">
                                                        <img src="'.$url.'email-facebook.png"></a>
                                                    </td>
                                                    <td align="right"><a style="margin:0px 5px;" target="_blank" href="'.$linkedIn.'">
                                                        <img src="'.$url.'email-linkedin.png"> </a>
                                                    </td>
                                                    <td align="left"><a style="margin:0px 5px;" target="_blank" href="'.$gPlus.'">
                                                        <img src="'.$url.'email-g-plus.png"> </a>
                                                    </td>
                                                </tr>
                                            </table>  
                                            <p class="foot-p" style="margin:5px 0px;line-height:100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                Copyrights &copy; '.date('Y').' by EzzyScorecard
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                </table>
        ';       
        $mail = \Yii::$app->mailer->compose() 
        ->setTo($to)
        ->setFrom([$from=>$fromName])
        ->setSubject($subject)
        //->setTextBody('Did you request a password reset /\n/for your account?','text/plain')
        //->setHtmlBody($header.$msg.$footer)            
        ->setHtmlBody($tablemail)            
        //->attach($imagePath)
        ->setBcc($bcc)
        ->send();
        if($mail) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function sendEmailWithAttachment($from, $to, $subject, $msg, $fromName="EzzyScorecard", $attachment=NULL, $bcc=NULL) 
    {	
        if(is_array($to)) {
            foreach($to as $email) {
                if (strpos($email, 'example.com') !== false) {
                    return true;
                }
            }
        } else {
            if (strpos($to, 'example.com') !== false) {
                return true;
            }
        }
        $adminstr = 'admin';
        $httpUrl = \frontend\models\SiteSetting::getSettingValue('PROTOCOL');
        $url = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."frontend/web/blue/images/"; 
        $link = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl;
        $pos = strpos($url,$adminstr);
        $pos1 = strpos($link,$adminstr);
		if ($pos === false && $pos1 === false) {
		   $url = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."frontend/web/blue/images/"; 
		   $link = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl;  			
 		 } else {
                    $url = 'http://'.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."backend/web/images/"; 
                    $url = str_replace('/admin', '', $url);
                    $link = str_replace('/admin', '', $link);
                }
		
                // Added by Swati - for social media icon links
                $fbLink = SiteSetting::getSettingValue('FACEBOOK');
                $linkedIn =  SiteSetting::getSettingValue('LINKEDIN');
                $gPlus = SiteSetting::getSettingValue('GOOGLEPLUS');
                       
		$header =   '<style>body{margin:0px;}</style><div style="background:#b6b6b6;padding:40px 15px 15px 0px;height:auto;">
                            <div style="margin:0 auto;width:50%;background:none;">
                            <div style="background:none;color:#fff;">
                            <div style="background:#212121;border-bottom:5px solid #03a9f4">
                            <table width="98%">
                                <tr>
                                    <td style="text-align:left">
                                        <a  href="'.$link.'"   style="margin-top: 10px;margin-left:6px" ><img style="" src="'.$url.'blog-logo.png" height="65" width="60" alt="EzzyScorecard"></a>
                                    </td>
                                    <td style="text-align:right">
                                        <a href="'.$link.'blog" valign="middle" style="color:#ffffff;text-decoration:none;padding:0px;display:inline-block"><img src="'.$url.'blog-icon.png" alt="Blog" width="70px" style="vertical-align:middle"/></a>
                                        <a href="'.$link.'contact-us" valign="middle" style="color:#ffffff;text-decoration:none;padding:0px;display:inline-block"><img src="'.$url.'contact-icon.png" alt="Contact" width="90px" style="vertical-align:middle"/></a>
                                    </td>
                                 </tr>
                            </table>
                            </div>';
		$footer =   '<div style="font-size:10pt;padding:5px 0px;border-top:5px solid #727272"">
                            <p style="color:#212121;text-align:center;font-size:8pt;margin:5px 0px">Please do not reply to this email</p>
                            <p style="color:#212121;text-align:center;font-size:8pt;margin:5px 0px">You can login to your EzzyScorecard account with <a href="'.$link.'" style="text-decoration:none;color:#0288d1">www.ezzyscorecard.com</a> </p>
                            <div style="text-align:center;width:98%">
                            <div style="width:100%">
                            <a style="margin:0px 5px;" href=""><img src="'.$url.'email-facebook.png" /></a>
                            <a style="margin:0px 5px;" href=""><img src="'.$url.'email-twitter.png" /></a>
                            <a style="margin:0px 5px;" href=""><img src="'.$url.'email-linkedin.png" /></a>
                            <a style="margin:0px 5px;" href=""><img src="'.$url.'email-g-plus.png" /></a>
                            </div>
                            </div>
                            <p style="color:#212121;text-align:center;margin:5px 0px">Copyright &copy; '.date('Y').' by EzzyScorecard</p>
                            </div></div></div>';			
		/*
                $msg =  '<div style="border-bottom:2px solid #eee;background:#fff;padding-left:15px;padding-right:15px;padding-bottom:15px;padding-top:15px;font-size:10pt;text-align:justify;color:#212121">'.$msg.'</div>'
                        .'<div style="width:100%;text-align:center">'                   		
                        .'</div>'
                        .'<div style="clear:both"></div>'
                        .'</div>';
                */
                $msg =  '<table cellpadding="0" cellspacing="0" width="100%" class="msg-text" style=""><tr><td>'.$msg.'</td></tr></table>';
		$tablemail = '<style>
				v\:* { behavior: url(#default#VML); display: inline-block; }
				body{padding-bottom: 0px; margin-bottom: 0px;padding-right: 0px; margin-right: 0px;padding-left: 0px; margin-left: 0px;}
                            </style>
                            <table width="100%" border="0" cellpadding="10" cellspacing="0" align="center" bgcolor="#727272">
				<tr>
                                    <td align="center">
                                        <a href="'.$link.'" style="margin-top: 10px;margin-left:6px">
                                            <img style="" src="'.$url.'blog-logo.png" height="65" width="60" alt="EzzyScorecard">
                                        </a>
                                    </td>
				</tr>
				<tr>
                                    <td>
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-top:4px solid #43c8fa; width:50%">
                                            <tr>
                                                <td>
                                                    '.$msg.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background-color:#686868;padding-top:5px;padding-bottom:5px">
                                                    <p style="text-align:center;font-family:verdana;font-size:11px;margin-top:5px;margin-bottom:10px;color:#ffffff">
                                                            Subscribe to our Newsletter with Our<a href="'.$link.'blog" style="color:#53c9f5;text-decoration:none;">
                                                            BLOG</a>. Feel free to <a href="'.$link.'contact-us" style="color:#53c9f5;text-decoration:none;">CONTACT US</a>.</p>
                                                    <p style="text-align:center;font-family:verdana;font-size:11px;margin-top:5px;margin-bottom:10px;color:#ffffff">If more question visit our <a href="'.$link.'faqs" style="color:#53c9f5;text-decoration:none;">FAQS</a></p>
                                                </td>
                                            </tr>
                                        </table>	
                                    </td>
				</tr>
				<tr>
                                    <td align="center">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <p style="margin:5px 0px;line-height:100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                        Please do not reply to this email.
                                                    </p>
                                                    <p style="margin:5px 0px;line-height: 100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                        You can login to your EzzyScorecard account with
                                                        <a href="'.$link.'" style="text-decoration:none;color:#1ab4fb">www.ezzyscorecard.com</a> 
                                                    </p>

                                                    <table width="0%" border="0" align="center" cellpadding="0" cellspacing="10" style="text-align:center">
                                                        <tr>
                                                            <td align="right"><a style="margin:0px 5px;" target="_blank" href="'.$fbLink.'">
                                                                <img src="'.$url.'email-facebook.png"></a>
                                                            </td>
                                                            <td align="right"><a style="margin:0px 5px;" targe="_blank" href="'.$linkedIn.'">
                                                                <img src="'.$url.'email-linkedin.png"></a>
                                                            </td>
                                                            <td align="left"><a style="margin:0px 5px;" target="_blank" href="'.$gPlus.'">
                                                                <img src="'.$url.'email-g-plus.png"></a>
                                                            </td>
                                                      </tr>
                                                    </table>   
                                                    <p class="foot-p" style="margin:5px 0px;line-height:100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                        Copyrights &copy; '.date('Y').' by EzzyScorecard
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
				</tr>
			</table>
		';       
        $mail = \Yii::$app->mailer->compose() 
        ->setTo($to)
        ->setFrom([$from=>$fromName])
        ->setSubject($subject)
        //->setTextBody('Did you request a password reset /\n/for your account?','text/plain')
        ->setHtmlBody($tablemail)            
        ->attach($attachment)
        ->setBcc($bcc)
        ->send();
        if($mail) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Used to send mail with multiple attachments
     * Author: Swati Dhamale
    */
    public static function sendEmailWithMultipleAttachment($from, $to, $subject, $msg, $fromName="EzzyScorecard", $attachment=NULL, $bcc=NULL) 
    {	
        if(is_array($to)) {
            foreach($to as $email) {
                if (strpos($email, 'example.com') !== false) {
                    return true;
                }
            }
        } else {
            if (strpos($to, 'example.com') !== false) {
                return true;
            }
        }
        $adminstr = 'admin';
        $httpUrl = \frontend\models\SiteSetting::getSettingValue('PROTOCOL');
        $url = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."frontend/web/blue/images/"; 
        $link = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl;
        $pos = strpos($url,$adminstr);
        $pos1 = strpos($link,$adminstr);
        if ($pos === false && $pos1 === false) {
           $url = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."frontend/web/blue/images/"; 
           $link = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl;            
        } else {
            $url = $httpUrl.$_SERVER['HTTP_HOST'].Yii::$app->homeUrl."backend/web/images/"; 
            $url = str_replace('/admin', '', $url);
            $link = str_replace('/admin', '', $link);
        }
	
        // Added by Swati - for social media icon links
        $fbLink = SiteSetting::getSettingValue('FACEBOOK');
        $linkedIn =  SiteSetting::getSettingValue('LINKEDIN');
        $gPlus = SiteSetting::getSettingValue('GOOGLEPLUS');
         
        $header = '<style>body{margin:0px;}</style><div style="background:#b6b6b6;padding:40px 15px 15px 0px;height:auto;">
                    <div style="margin:0 auto;width:50%;background:none;">
                    <div style="background:none;color:#fff;">
                    <div style="background:#212121;border-bottom:5px solid #03a9f4">
                    <table width="98%">
                        <tr>
                            <td style="text-align:left">
                                <a  href="'.$link.'"   style="margin-top: 10px;margin-left:6px" ><img style="" src="'.$url.'blog-logo.png" height="65" width="60" alt="EzzyScorecard"></a>
                            </td>
                            <td style="text-align:right">
                                <a href="'.$link.'blog" valign="middle" style="color:#ffffff;text-decoration:none;padding:0px;display:inline-block"><img src="'.$url.'blog-icon.png" alt="Blog" width="70px" style="vertical-align:middle"/></a>
                                <a href="'.$link.'contact-us" valign="middle" style="color:#ffffff;text-decoration:none;padding:0px;display:inline-block"><img src="'.$url.'contact-icon.png" alt="Contact" width="90px" style="vertical-align:middle"/></a>
                            </td>
                        </tr>
                    </table>
                    </div>';
        $footer = '<div style="font-size:10pt;padding:5px 0px;border-top:5px solid #727272"">
                    <p style="color:#212121;text-align:center;font-size:8pt;margin:5px 0px">Please do not reply to this email</p>
                    <p style="color:#212121;text-align:center;font-size:8pt;margin:5px 0px">You can login to your EzzyScorecard account with <a href="'.$link.'" style="text-decoration:none;color:#0288d1">www.ezzyscorecard.com</a> </p>
                    <div style="text-align:center;width:98%">
                    <div style="width:100%">
                    <a style="margin:0px 5px;" href=""><img src="'.$url.'email-facebook.png" /></a>
                    <a style="margin:0px 5px;" href=""><img src="'.$url.'email-twitter.png" /></a>
                    <a style="margin:0px 5px;" href=""><img src="'.$url.'email-linkedin.png" /></a>
                    <a style="margin:0px 5px;" href=""><img src="'.$url.'email-g-plus.png" /></a>
                    </div>
                    </div>
                    <p style="color:#212121;text-align:center;margin:5px 0px">Copyright &copy; '.date('Y').' by EzzyScorecard</p>
                    </div></div></div>';			
        /*
        $msg = '<div style="border-bottom:2px solid #eee;background:#fff;padding-left:15px;padding-right:15px;padding-bottom:15px;padding-top:15px;font-size:10pt;text-align:justify;color:#212121">'.$msg.'</div>'
                .'<div style="width:100%;text-align:center">'
                .'</div>'
                .'<div style="clear:both"></div>'
                .'</div>';
         * 
         */
        $msg =  '<table cellpadding="0" cellspacing="0" width="100%" class="msg-text" style=""><tr><td>'.$msg.'</td></tr></table>';
        $tablemail = '<style>
                        v\:* { behavior: url(#default#VML); display: inline-block; }
                        body{padding-bottom: 0px; margin-bottom: 0px;padding-right: 0px; margin-right: 0px;padding-left: 0px; margin-left: 0px;}
                    </style>
                    <table width="100%" border="0" cellpadding="10" cellspacing="0" align="center" bgcolor="#727272">
                        <tr>
                            <td align="center">
                                <a href="'.$link.'" style="margin-top: 10px;margin-left:6px">
                                    <img style="" src="'.$url.'blog-logo.png" height="65" width="60" alt="EzzyScorecard">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-top:4px solid #43c8fa; width:50%">
                                    <tr>
                                        <td>
                                            '.$msg.'
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color:#686868;padding-top:5px;padding-bottom:5px">
                                            <p style="text-align:center;font-family:verdana;font-size:11px;margin-top:5px;margin-bottom:10px;color:#ffffff">
                                                Subscribe to our Newsletter with Our<a href="'.$link.'blog" style="color:#53c9f5;text-decoration:none;">
                                                BLOG</a>. Feel free to <a href="'.$link.'contact-us" style="color:#53c9f5;text-decoration:none;">CONTACT US</a>.</p>
                                            <p style="text-align:center;font-family:verdana;font-size:11px;margin-top:5px;margin-bottom:10px;color:#ffffff">If more question visit our <a href="'.$link.'faqs" style="color:#53c9f5;text-decoration:none;">FAQS</a></p>
                                        </td>
                                    </tr>
                                </table>	
                            </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <p style="margin:5px 0px;line-height:100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                        Please do not reply to this email.
                                                    </p>
                                                    <p style="margin:5px 0px;line-height: 100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                        You can login to your EzzyScorecard account with
                                                        <a href="'.$link.'" style="text-decoration:none;color:#1ab4fb">www.ezzyscorecard.com</a> 
                                                    </p>

                                                    <table width="0%" border="0" align="center" cellpadding="0" cellspacing="10" style="text-align:center">
                                                      <tr>
                                                            <td align="right"><a style="margin:0px 5px;" target="_blank" href="'.$fbLink.'">
                                                                <img src="'.$url.'email-facebook.png"> </a>
                                                            </td>
                                                            <td align="right"><a style="margin:0px 5px;" target="_blank" href="'.$linkedIn.'">
                                                                <img src="'.$url.'email-linkedin.png"> </a>
                                                            </td>
                                                            <td align="left"><a style="margin:0px 5px;" target="_blank" href="'.$gPlus.'">
                                                                <img src="'.$url.'email-g-plus.png"></a>
                                                            </td>
                                                      </tr>
                                                    </table>  
                                                    <p class="foot-p" style="margin:5px 0px;line-height:100%;color:#a9a8a8;text-align:center;font-size:8pt;font-family:verdana;padding-top:3px;padding-bottom:3px">
                                                        Copyrights &copy; '.date('Y').' by EzzyScorecard
                                                    </p>
                                                </td>
                                            </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    ';
                
        $mail = \Yii::$app->mailer->compose() 
        ->setTo($to)
        ->setFrom([$from=>$fromName])
        ->setSubject($subject)
        //->setTextBody('Did you request a password reset /\n/for your account?','text/plain')
        ->setHtmlBody($tablemail)               
        ->setBcc($bcc);         
         if($attachment != '' && count($attachment) >= 1) {
            foreach($attachment as $key => $val) {
                $mail->attach($val);      
            }
         }                    
        $mail->send();
        if($mail) {
            return true;
        } else {
            return false;
        }
    }
    
}

