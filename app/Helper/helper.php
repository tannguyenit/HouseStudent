<?php
function getBrowser()
{
    $u_agent  = $_SERVER['HTTP_USER_AGENT'];
    $bname    = 'Unknown';
    $platform = 'Unknown';
    $version  = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'Linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'Mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'Windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub    = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub    = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub    = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub    = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
        $bname = 'Opera';
        $ub    = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub    = "Netscape";
    }

    // finally get the correct version number
    $known   = ['Version', $ub, 'other'];
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if (1 != $i) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }

    // check if we have a number
    if (null == $version || "" == $version) {
        $version = "?";
    }

    $result = [
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'   => $pattern,
    ];

    return (object) $result;
}

function setPrice($value)
{
    return str_replace('.', '', trim($value));
}

function setBirthdayUser($value)
{
    $date = str_replace('/', '-', $value);

    return date('Y-m-d', strtotime($date));
}

function facebookComment($url)
{
    $address = "https://graph.facebook.com/?fields=og_object{id},share&id=" . $url;
    $result  = file_get_contents($address);
    if ($result) {
        $array = json_decode($result);

        if ($array) {
            return $array->share->comment_count;
        }
    }

    return 0;
}

function vn_to_str($str)
{

    $unicode = [
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    ];

    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ', ' ', $str);

    return $str;
}
