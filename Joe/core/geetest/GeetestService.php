<?php

class GeetestService
{
    
    public static function GetVerify()
    {
        $Sdk = new GeetestConfig();
        $data = [
            'user_id' => md5($_SERVER['REMOTE_ADDR']),
            'client_type' => 'web',
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ];
        $status = $Sdk->pre_process($data, 1);
        $_SESSION['gtserver'] = $status;
        $_SESSION['user_id'] = md5($_SERVER['REMOTE_ADDR']);
        return $Sdk->get_response_str();
    }
    
    public static function DoVerify($data)
    {
        $GtSdk = new GeetestConfig();
        $Gdata = [
            'user_id' => md5($_SERVER['REMOTE_ADDR']),
            'client_type' => 'web',
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ];
        if ($_SESSION['gtserver'] == 1) {
            $result = $GtSdk->success_validate($data['geetest_challenge'], $data['geetest_validate'], $data['geetest_seccode'], $Gdata);
            if ($result) {
                $geetest = true;
            } else {
                $geetest = false;
            }
        } else {
            if ($GtSdk->fail_validate($data['geetest_challenge'], $data['geetest_validate'], $data['geetest_seccode'])) {
                $geetest = true;
            } else {
                $geetest = false;
            }
        }
        if (!$geetest) return false;
        return true;
    }
}