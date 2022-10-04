<?php

function _parseContent($post, $login)
{
    $JsdelivrPath = Helper::options()->JsdelivrPath;
    if(Helper::options()->JsdelivrPath == 'on') {
        $JsdelivrPath = Helper::options()->themeUrl;
        $JsdelivrPath = $JsdelivrPath . '/assets/jsdelivr';
    }
    if(empty($JsdelivrPath)) {
        $JsdelivrPath = 'https://cdn.jsdelivr.net';
    }
    
    $content = $post->content;
    $content = _parseReply($content);
    if (strpos($content, '{lamp/}') !== false) {
        $content = strtr($content, array(
            "{lamp/}" => '<span class="joe_lamp"></span>',
        ));
    }
    if (strpos($content, '{x}') !== false || strpos($content, '{ }') !== false) {
        $content = strtr($content, array(
            "{x}" => '<input type="checkbox" class="joe_checkbox" checked disabled></input>',
            "{ }" => '<input type="checkbox" class="joe_checkbox" disabled></input>'
        ));
    }
    if (strpos($content, '{music') !== false) {
        $content = preg_replace('/{music-list([^}]*)\/}/SU', '<joe-mlist $1></joe-mlist>', $content);
        $content = preg_replace('/{music([^}]*)\/}/SU', '<joe-music $1></joe-music>', $content);
    }
    if (strpos($content, '{mp3') !== false) {
        $content = preg_replace('/{mp3([^}]*)\/}/SU', '<joe-mp3 $1></joe-mp3>', $content);
    }
    if (strpos($content, '{bilibili') !== false) {
        $content = preg_replace('/{bilibili([^}]*)\/}/SU', '<joe-bilibili $1></joe-bilibili>', $content);
    }
    if (strpos($content, '{dplayer') !== false) {
        $player = Helper::options()->JCustomPlayer ? Helper::options()->JCustomPlayer : Helper::options()->themeUrl . '/library/player.php?JsdelivrPath='.$JsdelivrPath.'&url=';
        $content = preg_replace('/{dplayer([^}]*)\/}/SU', '<joe-dplayer player="' . $player . '" $1></joe-dplayer>', $content);
    }
    if (strpos($content, '{mtitle') !== false) {
        $content = preg_replace('/{mtitle([^}]*)\/}/SU', '<joe-mtitle $1></joe-mtitle>', $content);
    }
    if (strpos($content, '{abtn') !== false) {
        $content = preg_replace('/{abtn([^}]*)\/}/SU', '<joe-abtn $1></joe-abtn>', $content);
    }
    if (strpos($content, '{cloud') !== false) {
        $content = preg_replace('/{cloud([^}]*)\/}/SU', '<joe-cloud $1></joe-cloud>', $content);
    }
    if (strpos($content, '{anote') !== false) {
        $content = preg_replace('/{anote([^}]*)\/}/SU', '<joe-anote $1></joe-anote>', $content);
    }
    if (strpos($content, '{dotted') !== false) {
        $content = preg_replace('/{dotted([^}]*)\/}/SU', '<joe-dotted $1></joe-dotted>', $content);
    }
    if (strpos($content, '{message') !== false) {
        $content = preg_replace('/{message([^}]*)\/}/SU', '<joe-message $1></joe-message>', $content);
    }
    if (strpos($content, '{progress') !== false) {
        $content = preg_replace('/{progress([^}]*)\/}/SU', '<joe-progress $1></joe-progress>', $content);
    }
    if (strpos($content, '{hide') !== false) {
        $db = Typecho_Db::get();
        $hasComment = $db->fetchAll($db->select()->from('table.comments')->where('cid = ?', $post->cid)->where('mail = ?', $post->remember('mail', true))->limit(1));
        if ($hasComment || $login || Helper::options()->CommentShow == 'on') {
            $content = strtr($content, array("{hide}" => "", "{/hide}" => ""));
        } else {
            $content = preg_replace('/{hide[^}]*}([\s\S]*?){\/hide}/', '<joe-hide></joe-hide>', $content);
        }
    }
    // 付费阅读
    if (strpos($content, '{ZhinianPay') !== false) {
        $db = Typecho_Db::get();
        $hasComment = $db->fetchAll($db->select()->from('table.comments')->where('cid = ?', $post->cid)->where('mail = ?', $post->remember('mail', true))->limit(1));
        if ($hasComment || $login || Helper::options()->CommentShow == 'on') {
            $content = preg_replace('/{ZhinianPay[^}]*}/', '', $content);
            $content = preg_replace('/{\/ZhinianPay}/', '', $content);
        } else {
            $zhiniantempContent = $content;
            $zhiniantempContent = preg_replace('/{ZhinianPay[^}]*}/', 'ZhinianPayStart', $zhiniantempContent);
            $zhiniantempContent = preg_replace('/{\/ZhinianPay}/', 'ZhinianPayEnd', $zhiniantempContent);
            
            $start = 'ZhinianPayStart';
            $end = 'ZhinianPayEnd';
            
            $hideContent = substr($zhiniantempContent, strlen($start)+strpos($zhiniantempContent, $start),(strlen($zhiniantempContent) - strpos($zhiniantempContent, $end))*(-1));
            $start = 'money=';
            $end = '}';
            $input = $content;
            $money = substr($input, strlen($start)+strpos($input, $start), strpos($input, '}', strpos($input, 'money='))-(strlen($start)+strpos($input, $start)));
            
            // 获取支付参数
            $alipay_appid = Helper::options()->ffyd_zhifubao_appid;
            $app_private_key = Helper::options()->ffyd_zhifubao_private_key;
            $alipay_public_key = Helper::options()->ffyd_zhifubao_public_key;
            
            $appId = Helper::options()->ffyd_weixin_appid;
            $mchId = Helper::options()->ffyd_weixin_mchId;
            $mchKey = Helper::options()->ffyd_weixin_mchKey;
            
            $yizhif_interfUrl = Helper::options()->ffyd_yizhifu_interfUrl;
            $yizhifu_pid = Helper::options()->ffyd_yizhifu_pid;
            $yizhifu_miyao = Helper::options()->ffyd_yizhifu_miyao;
            
            $mazhifu_interfUrl = Helper::options()->ffyd_mazhifu_interfUrl;
            $mazhifu_pid = Helper::options()->ffyd_mazhifu_pid;
            $mazhifu_miyao = Helper::options()->ffyd_mazhifu_miyao;
            
            
            $alipay = Helper::options()->ffyd_zhifubao_zhifu;
            $wxpay = Helper::options()->ffyd_weixin_zhifu;
            $qqpay = Helper::options()->ffyd_qq_zhifu;
            
            $qqNum = Helper::options()->ffyd_qq;
            $cardId = Helper::options()->ffyd_shouquanma;
            $cookietime = Helper::options()->ffyd_cookietime;
            if(empty($cookietime)) {
                $cookietime = 1;
            }
            
            $returnUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            
            $cid = $post->cid;
		    $query= $db->select()->from('table.contents')->where('cid = ?', $cid ); 
		    $row = $db->fetchRow($query);
		    
		    $str = $cid;
            $new = '';
            if ($str[strlen($str) - 1] != '0') {
                for ($i = 0; $i < strlen($str); ++$i) {
                    $new .= chr(ord('a') + intval($str[$i]) - 1);
                }
            }
            
            $cookieName =  'ZhinianPayCookie'.$new;
		    if(!isset($_COOKIE[$cookieName])) {
				$randomCode = md5(uniqid(microtime(true),true));
				setcookie($cookieName, $randomCode, time()+3600*24*$cookietime);
			}
			$bussId = $_COOKIE[$cookieName];
            
            $form = '<form style="display:none;" target="_blank" action="https://dy.zhinianboke.com/pay/zhifu/ZhiFu001/init" method="post" id="subscribe_form"><input type="hidden" name="qqNum" value="'.$qqNum.'"><input type="hidden" name="alipay" value="'.$alipay.'"><input type="hidden" name="wxpay" value="'.$wxpay.'"><input type="hidden" name="qqpay" value="'.$qqpay.'"><input type="hidden" name="appId" value="'.$appId.'"><input type="hidden" name="mchId" value="'.$mchId.'"><input type="hidden" name="mchKey" value="'.$mchKey.'"><input type="hidden" id="ZhinianPay_cardId" name="cardId" value="'.$cardId.'"><input type="hidden" id="ZhinianPay_cookietime" value="'.$cookietime.'"><input type="hidden" name="orderName" value="文章付费阅读"><input type="hidden" id="ZhinianPay_cookieName" value="'.$cookieName.'"><input type="hidden" id="ZhinianPay_bussId" name="bussId" value="'.$bussId.'"><input type="hidden" name="orderDes" value="文章付费阅读"><input type="hidden" name="alipayAppid" value="'.$alipay_appid.'"><input type="hidden" name="alipayAppPrivateKey" value="'.$app_private_key.'"><input type="hidden" name="alipayPublicKey" value="'.$alipay_public_key.'"><input type="hidden" id="ZhinianPay_orderFee" name="orderFee" value="'.$money.'"><input type="hidden" name="returnUrl" value="'.$returnUrl.'"><input type="hidden" name="
           interfUrl" value="'.$yizhif_interfUrl.'"><input type="hidden" name="pid" value="'.$yizhifu_pid.'"><input type="hidden" name="miyao" value="'.$yizhifu_miyao.'"><input type="hidden" name="
           mazhifuInterfUrl" value="'.$mazhifu_interfUrl.'"><input type="hidden" name="mazhifuPid" value="'.$mazhifu_pid.'"><input type="hidden" name="mazhifuMiyao" value="'.$mazhifu_miyao.'"><input type="submit" value="" id="submit"></form>';
            
            $replaceEnd = '<div class="zhinianpay_content" style="display: none;">'.$hideContent.'</div>';
            $replaceEnd = $replaceEnd . '<span class="zhinian_hide">此处内容作者设置了 <i class="zhinian_hide__button">付费'.$money . ' 元(点击此处支付) </i>可见，付费后 '. $cookietime . ' 天内有效</span>'.$form;
            $content = preg_replace('/{ZhinianPay[^}]*}([\s\S]*?){\/ZhinianPay}/', $replaceEnd, $content);
        }
    }
    
    if (strpos($content, '{card-default') !== false) {
        $content = preg_replace('/{card-default([^}]*)}([\s\S]*?){\/card-default}/', '<section style="margin-bottom: 15px"><joe-card-default $1><span class="_temp" style="display: none">$2</span></joe-card-default></section>', $content);
    }
    if (strpos($content, '{callout') !== false) {
        $content = preg_replace('/{callout([^}]*)}([\s\S]*?){\/callout}/', '<section style="margin-bottom: 15px"><joe-callout $1><span class="_temp" style="display: none">$2</span></joe-callout></section>', $content);
    }
    if (strpos($content, '{alert') !== false) {
        $content = preg_replace('/{alert([^}]*)}([\s\S]*?){\/alert}/', '<section style="margin-bottom: 15px"><joe-alert $1><span class="_temp" style="display: none">$2</span></joe-alert></section>', $content);
    }
    if (strpos($content, '{card-describe') !== false) {
        $content = preg_replace('/{card-describe([^}]*)}([\s\S]*?){\/card-describe}/', '<section style="margin-bottom: 15px"><joe-card-describe $1><span class="_temp" style="display: none">$2</span></joe-card-describe></section>', $content);
    }
    if (strpos($content, '{tabs') !== false) {
        $content = preg_replace('/{tabs}([\s\S]*?){\/tabs}/', '<section style="margin-bottom: 15px"><joe-tabs><span class="_temp" style="display: none">$1</span></joe-tabs></section>', $content);
    }
    if (strpos($content, '{card-list') !== false) {
        $content = preg_replace('/{card-list}([\s\S]*?){\/card-list}/', '<section style="margin-bottom: 15px"><joe-card-list><span class="_temp" style="display: none">$1</span></joe-card-list></section>', $content);
    }
    if (strpos($content, '{timeline') !== false) {
        $content = preg_replace('/{timeline}([\s\S]*?){\/timeline}/', '<section style="margin-bottom: 15px"><joe-timeline><span class="_temp" style="display: none">$1</span></joe-timeline></section>', $content);
    }
    if (strpos($content, '{collapse') !== false) {
        $content = preg_replace('/{collapse}([\s\S]*?){\/collapse}/', '<section style="margin-bottom: 15px"><joe-collapse><span class="_temp" style="display: none">$1</span></joe-collapse></section>', $content);
    }
    if (strpos($content, '{gird') !== false) {
        $content = preg_replace('/{gird([^}]*)}([\s\S]*?){\/gird}/', '<section style="margin-bottom: 15px"><joe-gird $1><span class="_temp" style="display: none">$2</span></joe-gird></section>', $content);
    }
    if (strpos($content, '{copy') !== false) {
        $content = preg_replace('/{copy([^}]*)\/}/SU', '<joe-copy $1></joe-copy>', $content);
    }

    echo $content;
}