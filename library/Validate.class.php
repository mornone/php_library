<?php
/**
 * 校验类
 * @author Flc <2016-01-26 14:42:45>
 */
namespace Library;

class Validate{

    /**
     * 校验字符串是否为空
     * @param  string  $string 带校验字符串
     * @return boolean         
     */
    public static function isEmpty($string){
        if(!isset($string))
            return true;
        if($string === null )
            return true;
        if(trim($string) === "")
            return true;
        
        return false;
    }

    /**
     * 校验字符串是否为数字
     * @param  number  $string 数字
     * @return boolean         
     */
    public static function isNumeric($string){
        return is_null($string) || is_numeric($string);
    }

    /**
     * 校验是否为字符串
     * @param  string  $string 待校验字符
     * @return boolean         
     */
    public static function isString($string){
        return is_null($string) || is_string($string);
    }

    /**
     * 校验是否为int类型
     * @param  integer  $string 待校验字符
     * @return boolean         
     */
    public static function isInteger($string){
        return is_null($string) || filter_var($string, FILTER_VALIDATE_INT) !== false;
    }

    /**
     * 校验是否为浮点数
     * @param  number  $number 待校验字符
     * @return boolean         
     */
    public static function isFloat($string){
        return is_null($string) && filter_var($string, FILTER_VALIDATE_FLOAT);
    }

    /**
     * 校验是否为为Email
     * @param  string  $string 邮箱
     * @return boolean         
     */
    public static function isEmail($string){
        return filter_var($string, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * 校验值是否为允许字母或数字
     * @param  string  $string 字符串
     * @return boolean
     */
    public static function isAlphaNum($string){
        if (! is_string($string) && ! is_numeric($string)) {
            return false;
        }

        return preg_match('/^[\pL\pM\pN]+$/u', $string);
    }

    /**
     * 校验值仅是否为字母、数字、破折号（-）以及底线（_）
     * @param  string  $string 字符串
     * @return boolean         
     */
    public static function isAlphaDash($string){
        if (! is_string($string) && ! is_numeric($string)) {
            return false;
        }

        return preg_match('/^[\pL\pM\pN_-]+$/u', $string);
    }

    /**
     * 校验是否为手机号
     * @param  string  $string 手机号
     * @return boolean         
     */
    public static function isMobile($string){
        if(strlen($string) != 11)
            return false;
        if(!preg_match("/^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/", $string)) 
            return false;

        return true;
    }

    /**
     * 校验是否为URL(支持校验http，ftp，ip等)
     * @param  string  $string 链接
     * @return boolean         
     */
    public static function isUrl($string){
        $pattern = '~^
            ((aaa|aaas|about|acap|acct|acr|adiumxtra|afp|afs|aim|apt|attachment|aw|barion|beshare|bitcoin|blob|bolo|callto|cap|chrome|chrome-extension|cid|coap|coaps|com-eventbrite-attendee|content|crid|cvs|data|dav|dict|dlna-playcontainer|dlna-playsingle|dns|dntp|dtn|dvb|ed2k|example|facetime|fax|feed|feedready|file|filesystem|finger|fish|ftp|geo|gg|git|gizmoproject|go|gopher|gtalk|h323|ham|hcp|http|https|iax|icap|icon|im|imap|info|iotdisco|ipn|ipp|ipps|irc|irc6|ircs|iris|iris.beep|iris.lwz|iris.xpc|iris.xpcs|itms|jabber|jar|jms|keyparc|lastfm|ldap|ldaps|magnet|mailserver|mailto|maps|market|message|mid|mms|modem|ms-help|ms-settings|ms-settings-airplanemode|ms-settings-bluetooth|ms-settings-camera|ms-settings-cellular|ms-settings-cloudstorage|ms-settings-emailandaccounts|ms-settings-language|ms-settings-location|ms-settings-lock|ms-settings-nfctransactions|ms-settings-notifications|ms-settings-power|ms-settings-privacy|ms-settings-proximity|ms-settings-screenrotation|ms-settings-wifi|ms-settings-workplace|msnim|msrp|msrps|mtqp|mumble|mupdate|mvn|news|nfs|ni|nih|nntp|notes|oid|opaquelocktoken|pack|palm|paparazzi|pkcs11|platform|pop|pres|prospero|proxy|psyc|query|redis|rediss|reload|res|resource|rmi|rsync|rtmfp|rtmp|rtsp|rtsps|rtspu|secondlife|service|session|sftp|sgn|shttp|sieve|sip|sips|skype|smb|sms|smtp|snews|snmp|soap.beep|soap.beeps|soldat|spotify|ssh|steam|stun|stuns|submit|svn|tag|teamspeak|tel|teliaeid|telnet|tftp|things|thismessage|tip|tn3270|turn|turns|tv|udp|unreal|urn|ut2004|vemmi|ventrilo|videotex|view-source|wais|webcal|ws|wss|wtai|wyciwyg|xcon|xcon-userid|xfire|xmlrpc\.beep|xmlrpc.beeps|xmpp|xri|ymsgr|z39\.50|z39\.50r|z39\.50s))://                                 # protocol
            (([\pL\pN-]+:)?([\pL\pN-]+)@)?          # basic auth
            (
                ([\pL\pN\pS-\.])+(\.?([\pL]|xn\-\-[\pL\pN-]+)+\.?) # a domain name
                    |                                              # or
                \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}                 # a IP address
                    |                                              # or
                \[
                    (?:(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){6})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:::(?:(?:(?:[0-9a-f]{1,4})):){5})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){4})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,1}(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){3})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,2}(?:(?:[0-9a-f]{1,4})))?::(?:(?:(?:[0-9a-f]{1,4})):){2})(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,3}(?:(?:[0-9a-f]{1,4})))?::(?:(?:[0-9a-f]{1,4})):)(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,4}(?:(?:[0-9a-f]{1,4})))?::)(?:(?:(?:(?:(?:[0-9a-f]{1,4})):(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9]))\.){3}(?:(?:25[0-5]|(?:[1-9]|1[0-9]|2[0-4])?[0-9])))))))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,5}(?:(?:[0-9a-f]{1,4})))?::)(?:(?:[0-9a-f]{1,4})))|(?:(?:(?:(?:(?:(?:[0-9a-f]{1,4})):){0,6}(?:(?:[0-9a-f]{1,4})))?::))))
                \]  # a IPv6 address
            )
            (:[0-9]+)?                              # a port (optional)
            (/?|/\S+)                               # a /, nothing or a / with something
        $~ixu';

        return preg_match($pattern, $string) === 1;
    }

    /**
     * 校验是否为ip
     * @param  string  $string ip地址
     * @return boolean         
     */
    public static function isIp($string){
        return filter_var($string, FILTER_VALIDATE_IP) !== false;
    }

    /**
     * 校验是否为json
     * @param  string  $string json字符串
     * @return boolean         
     */
    public static function isJson($string){
        if (! is_scalar($string) && ! method_exists($string, '__toString')) {
            return false;
        }

        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }

    // 是否为图片(jpeg, png, bmp, gif 或 svg)
    public static function isImage($filename){}

    public static function isDate(){}

    

    /**
     * 校验字符串是否为指定长度
     * @param  string  $string 字符串
     * @param  integer $len    校验长度
     * @return boolean          
     */
    public static function chkLength($string, $length = 0){
        //if 
        if (mb_strlen($string, 'UTF-8') != $length)
            return false;

        return true;
    }

    // 校验值的长度是否符合所属范围
    public static function chkRangeLength($string, $minlength = 0, $maxlength = 0) {}

    public static function chkMinLength($string, $minlength = 0){}

    public static function chkMaxLength($string, $maxlength = 0){}

    // 校验值是否在所属范围内
    public static function chkRange($string, $min = 0, $max = 0) {}

    // 校验值的是不是符合最小值
    public static function chkMin($string, $min = 0){}


    public static function chkMax($string, $max = 0){}

    

}