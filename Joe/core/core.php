<?php

/* 继承方法函数 */
require_once('widget.php');

/* 公用函数 */
require_once('function.php');

/* 过滤内容函数 */
require_once('parse.php');

/* 主题内置开放API */
require_once('route.php');

/* 插件方法 */
require_once('factory.php');

// 验证码
require_once('geetest/GeetestService.php');

/* 页面加载计时 */
_startCountTime();

/* 主题初始化 */
function themeInit($self)
{
    /* 强制用户要求填写邮箱 */
    Helper::options()->commentsRequireMail = true;
    /* 强制用户要求无需填写url */
    Helper::options()->commentsRequireURL = false;
    /* 强制用户开启评论回复 */
    Helper::options()->commentsThreaded = true;
    /* 强制回复楼层最高999层 */
    Helper::options()->commentsMaxNestingLevels = 999;
    /* 主题开放API 路由规则 */
    if ($self->request->getPathInfo() == "/joe/api") {
        switch ($self->request->routeType) {
            case 'publish_list':
                _getPost($self);
                break;
            case 'baidu_record':
                _getRecord($self);
                break;
            case 'baidu_push':
                _pushRecord($self);
                break;
            case 'handle_views':
                _handleViews($self);
                break;
            case 'handle_agree':
                _handleAgree($self);
                break;
            case 'wallpaper_type':
                _getWallpaperType($self);
                break;
            case 'wallpaper_list':
                _getWallpaperList($self);
                break;
            case 'maccms_list':
                _getMaccmsList($self);
                break;
            case 'huya_list':
                _getHuyaList($self);
                break;
            case 'server_status':
                _getServerStatus($self);
                break;
            case 'comment_lately':
                _getCommentLately($self);
                break;
            case 'article_filing':
                _getArticleFiling($self);
                break;
        };
    }

    /* 增加自定义SiteMap功能 */
    if (Helper::options()->JSiteMap && Helper::options()->JSiteMap !== 'off') {
        if (strpos($self->request->getRequestUri(), 'sitemap.xml') !== false) {
            $self->response->setStatus(200);
            $self->setThemeFile("library/sitemap.php");
        }
    }
}

/* 增加自定义字段 */
function themeFields($layout)
{
    $mode = new Typecho_Widget_Helper_Form_Element_Select(
        'mode',
        array(
            'default' => '默认模式',
            'single' => '大图模式',
            'multiple' => '三图模式',
            'none' => '无图模式'
        ),
        'default',
        '文章显示方式',
        '介绍：用于设置当前文章在首页和搜索页的显示方式 <br /> 
         注意：独立页面该功能不会生效'
    );
    $layout->addItem($mode);

    $keywords = new Typecho_Widget_Helper_Form_Element_Text(
        'keywords',
        NULL,
        NULL,
        'SEO关键词（非常重要！）',
        '介绍：用于设置当前页SEO关键词 <br />
         注意：多个关键词使用英文逗号进行隔开 <br />
         例如：Typecho,Typecho主题,Typecho模板 <br />
         其他：如果不填写此项，则默认取文章标签'
    );
    $layout->addItem($keywords);

    $description = new Typecho_Widget_Helper_Form_Element_Textarea(
        'description',
        NULL,
        NULL,
        'SEO描述语（非常重要！）',
        '介绍：用于设置当前页SEO描述语 <br />
         注意：SEO描述语不应当过长也不应当过少 <br />
         其他：如果不填写此项，则默认截取文章片段'
    );
    $layout->addItem($description);

    $abstract = new Typecho_Widget_Helper_Form_Element_Textarea(
        'abstract',
        NULL,
        NULL,
        '自定义摘要（非必填）',
        '填写时：将会显示填写的摘要 <br>
         不填写时：默认取文章里的内容'
    );
    $layout->addItem($abstract);

    $thumb = new Typecho_Widget_Helper_Form_Element_Textarea(
        'thumb',
        NULL,
        NULL,
        '自定义缩略图（非必填）',
        '填写时：将会显示填写的文章缩略图 <br>
         不填写时：<br>
            1、若文章有图片则取文章内图片 <br>
            2、若文章无图片，并且外观设置里未填写·自定义缩略图·选项，则取模板自带图片 <br>
            3、若文章无图片，并且外观设置里填写了·自定义缩略图·选项，则取自定义缩略图图片 <br>
         注意：多个缩略图时换行填写，一行一个（仅在三图模式下生效）'
    );
    $layout->addItem($thumb);

    $video = new Typecho_Widget_Helper_Form_Element_Textarea(
        'video',
        NULL,
        NULL,
        'M3U8或MP4地址（非必填）',
        '填写后，文章会插入一个视频模板 <br>
         格式：视频名称$视频地址。如果有多个，换行写即可 <br>
         例如：<br>
            第01集$https://iqiyi.cdn9-okzy.com/20201104/17638_8f3022ce/index.m3u8 <br>
            第02集$https://iqiyi.cdn9-okzy.com/20201104/17639_5dcb8a3b/index.m3u8 
        '
    );
    $layout->addItem($video);
}

/**
 * 显示用户等级，按邮箱
 */
function autvip($i){
    $db=Typecho_Db::get();
    $mail=$db->fetchAll($db->select(array('COUNT(cid)'=>'rbq'))->from('table.comments')->where('mail = ?', $i)/**->where('authorId = ?','0')**/);
    foreach ($mail as $sl){
        $rbq=$sl['rbq'];}
    if($rbq<1){
        echo '<span class="autlv aut-0">Lv.0</span>';
    }elseif ($rbq<10 && $rbq>0) {
        echo '<span class="autlv aut-1">Lv.1</span>';
    }elseif ($rbq<20 && $rbq>=10) {
        echo '<span class="autlv aut-2">Lv.2</span>';
    }elseif ($rbq<40 && $rbq>=20) {
        echo '<span class="autlv aut-3">Lv.3</span>';
    }elseif ($rbq<80 && $rbq>=40) {
        echo '<span class="autlv aut-4">Lv.4</span>';
    }elseif ($rbq<100 && $rbq>=80) {
        echo '<span class="autlv aut-5">Lv.5</span>';
    }elseif ($rbq>=100) {
        echo '<span class="autlv aut-6">Lv.6</span>';
    }
}

/**
*输出作者文章总数，可以指定
*/
function allpostnum($id){
    $db = Typecho_Db::get();
    $postnum=$db->fetchRow($db->select(array('COUNT(authorId)'=>'allpostnum'))->from ('table.contents')->where ('table.contents.authorId=?',$id)->where('table.contents.type=?', 'post'));
    $postnum = $postnum['allpostnum'];
    if($postnum=='0')
    {
        return '暂无文章';
    }
    else{
        return '文章 '.$postnum.' 篇';
    }
}

/* 通过邮箱生成头像地址 */
function _getAvatarUrlByMail($mail)
{
	$gravatarsUrl = Helper::options()->JCustomAvatarSource ? Helper::options()->JCustomAvatarSource : 'https://gravatar.helingqi.com/wavatar/';
	$mailLower = strtolower($mail);
	$md5MailLower = md5($mailLower);
	$qqMail = str_replace('@qq.com', '', $mailLower);
	if (strstr($mailLower, "qq.com") && is_numeric($qqMail) && strlen($qqMail) < 11 && strlen($qqMail) > 4) {
		return 'https://thirdqq.qlogo.cn/g?b=qq&nk=' . $qqMail . '&s=100';
	} else {
		return $gravatarsUrl . $md5MailLower . '?d=mm';
	}
}
Helper::addRoute('ArticlePosterAction_make', '/ArticlePoster/make', 'ArticlePoster_Action','make');

/*
 * 获取今日文章
 */
function getNumPosts($days){ 
	$db = Typecho_Db::get(); 
	$date = date("Y-m-d");
	$nowtime = ''.$date.' 23:59:59';
	$times = strtotime($nowtime);
	$st_days= $times-$days*24*60*60; 
	$result = $db->fetchAll($db->select()->from('table.contents') ->where('status = ?','publish') ->where('type = ?', 'post') ->where('modified >= ?', $st_days)
	); 
	$total_posts = count($result); 
	return 
	$total_posts; 
}

/* 判断是否是移动端 */
function isMobile()
{
    if (isset($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;
    if (isset($_SERVER['HTTP_VIA'])) {
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            return true;
    }
    if (isset($_SERVER['HTTP_ACCEPT'])) {
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}
/* 生成目录树 */
function CreateCatalog($post)
{
    $obj = $post->content;
    global $catalog;
    global $catalog_count;
    $catalog = array();
    $catalog_count = 0;
    $obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function ($obj) {
        global $catalog;
        global $catalog_count;
        $catalog_count++;
        $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
        return '<h' . $obj[1] . $obj[2] . ' id="cl-' . $catalog_count . '"><span>' . $obj[3] . '</span></h' . $obj[1] . '>';
    }, $obj);
    setcookie($post->cid, '', time() - 36000);
    setcookie($post->cid, json_encode($catalog), time() + 36000);
    return $obj;
}

function GetCatalog($post)
{
    $catalog = json_decode($_COOKIE[$post->cid], true);
    $index = '';
    if ($catalog) {
        $index = '<ul>';
        $prev_depth = '';
        $to_depth = 0;
        foreach ($catalog as $catalog_item) {
            $catalog_depth = $catalog_item['depth'];
            if ($prev_depth) {
                if ($catalog_depth == $prev_depth) {
                    $index .= '</li>';
                } elseif ($catalog_depth > $prev_depth) {
                    $to_depth++;
                    $index .= '<ul>';
                } else {
                    $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                    if ($to_depth2) {
                        for ($i = 0; $i < $to_depth2; $i++) {
                            $index .= '</li></ul>';
                            $to_depth--;
                        }
                    }
                    $index .= '</li>';
                }
            }
            $index .= '<li><a href="#cl-' . $catalog_item['count'] . '" data-href="#cl-' . $catalog_item['count'] . '">' . $catalog_item['text'] . '</a>';
            $prev_depth = $catalog_item['depth'];
        }
        for ($i = 0; $i <= $to_depth; $i++) {

            $index .= '</li></ul>';
        }
        $index = '<div class="j-floor"><div class="contain" id="jFloor" style="top: 154px;"><div class="title">文章目录</div>' . $index . '<svg class="toc-marker" xmlns="http://www.w3.org/2000/svg"><path stroke="var(--theme)" stroke-width="3" fill="transparent" stroke-dasharray="0, 0, 0, 1000" stroke-linecap="round" stroke-linejoin="round" transform="translate(-0.5, -0.5)" /></svg></div></div>';
    }
    echo $index;
}

function theAllViews()
{
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select('SUM(VIEWS) as views')->from('table.contents')); 
    echo number_format($result[0]['views']);
}