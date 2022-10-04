<?php 

    // 收款设置
    $ZNPaySet = new Typecho_Widget_Helper_Form_Element_Select(
        'ZNPaySet',
        array(
            'on' => '开启（默认）',
            'off' => '关闭',
        ),
        'on',
        '是否启用执念打赏功能',
        '介绍：开启后，文章底部展示打赏功能 <br>
        详情可查看 <a href="https://zhinianboke.com/archives/892/">https://zhinianboke.com/archives/892/</a>
        '
    );
    $ZNPaySet->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ZNPaySet->multiMode());
    
    
	$ZNAlipay = new Typecho_Widget_Helper_Form_Element_Text(
        'ZNAlipay',
        NULL,
        NULL,
        '支付宝收款码',
        '介绍：填写此处，打赏界面展示支付宝收款码，图片地址 <br />'
    );
    $ZNAlipay->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ZNAlipay->multiMode());
    
    $ZNWeChat = new Typecho_Widget_Helper_Form_Element_Text(
        'ZNWeChat',
        NULL,
        NULL,
        '微信收款码',
        '介绍：填写此处，微信界面展示微信收款码，图片地址 <br />'
    );
    $ZNWeChat->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ZNWeChat->multiMode());
    
    $ZNQqPay = new Typecho_Widget_Helper_Form_Element_Text(
        'ZNQqPay',
        NULL,
        NULL,
        'QQ收款码',
        '介绍：填写此处，QQ界面展示QQ收款码，图片地址 <br />'
    );
    $ZNQqPay->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ZNQqPay->multiMode());


    $JBarragerStatus = new Typecho_Widget_Helper_Form_Element_Select(
        'JBarragerStatus',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启弹幕功能（仅限PC）',
        '介绍：开启后，网站将会显示评论弹幕功能，该功能采用CSS动画引擎，并非传统JS操作DOM，无任何性能消耗。'
    );
    $JBarragerStatus->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JBarragerStatus->multiMode());
    
    $JPageStatus = new Typecho_Widget_Helper_Form_Element_Select(
        'JPageStatus',
        array('default' => '按钮切换形式（默认）', 'ajax' => '点击加载形式'),
        'default',
        '选择首页的分页形式',
        '介绍：选择一款您所喜欢的分页形式'
    );
    $JPageStatus->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JPageStatus->multiMode());
    
    // 在线人数设置
    $onlinePersion = new Typecho_Widget_Helper_Form_Element_Select(
        'onlinePersion',
        array(
            'on' => '开启（默认）',
            'off' => '关闭',
        ),
        'on',
        '是否启用在线人数统计',
        '介绍：开启后，文章底部展示当前在线人数'
    );
    $onlinePersion->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($onlinePersion->multiMode());
    
    // 文章阅读时长设置
    $onlineTime = new Typecho_Widget_Helper_Form_Element_Select(
        'onlineTime',
        array(
            'off' => '关闭（默认）',
            'on' => '开启',
        ),
        'off',
        '是否启用文章阅读时长统计',
        '介绍：开启后，文章底部展示文章字数，预计阅读时长和已阅读时长'
    );
    $onlineTime->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($onlineTime->multiMode());
    
    // 手机端登录
    $login4Phone = new Typecho_Widget_Helper_Form_Element_Select(
        'login4Phone',
        array(
            'off' => '关闭（默认）',
            'on' => '开启',
        ),
        'off',
        '是否启用手机端登录功能',
        '介绍：开启后，手机端侧边栏将展示登录功能和登录后的操作'
    );
    $login4Phone->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($login4Phone->multiMode());
    
    // 全站置灰
    $websiteChgGray = new Typecho_Widget_Helper_Form_Element_Select(
        'websiteChgGray',
        array(
            'off' => '关闭（默认）',
            'on' => '开启',
        ),
        'off',
        '是否启用全站置灰',
        '介绍：开启后，网站所有信息全部变成黑白'
    );
    $websiteChgGray->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($websiteChgGray->multiMode());
    
    $JPrevent = new Typecho_Widget_Helper_Form_Element_Select(
        'JPrevent',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '请选择是否开启QQ跳转浏览器功能',
        '介绍：开启后，如果在QQ里打开网站，则会提示跳转浏览器打开'
    );
    $JPrevent->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JPrevent->multiMode());
    
    // 互动读者
    $JactiveUsers = new Typecho_Widget_Helper_Form_Element_Select(
        'JactiveUsers',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启互动读者',
        '介绍：显示评论相关用户'
    );
    $JactiveUsers->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JactiveUsers);
    
    // 纯数字评论无需审核
    $CommentPass4Num = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentPass4Num',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启纯数字评论无需审核',
        '介绍：开启后，如果评论都是数字则无需审核'
    );
    $CommentPass4Num->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentPass4Num);
    
    
    $_51la = new Typecho_Widget_Helper_Form_Element_Text(
        '_51la',
        NULL,
        NULL,
        '51la站点ID，例如：JhHp631DhthE2c5m',
        '介绍：填写此处用于展示51la统计，申请地址 https://invite.51.la/1NSWenP5?target=V6 ;申请后到统计代码中找'
    );
    $_51la->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($_51la->multiMode());
    
    // 海报
    $Haibao = new Typecho_Widget_Helper_Form_Element_Select(
        'Haibao',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启底部海报功能',
        '介绍：开启后，文章底部展示生成海报按钮；特别注意：安装插件之后才可以正常使用，插件下载地址 https://zhinianboke.com/archives/993/'
    );
    $Haibao->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($Haibao);
    
    // 今日文章
    $TodayArchive4Phone = new Typecho_Widget_Helper_Form_Element_Select(
        'TodayArchive4Phone',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启手机侧边栏今日文章',
        '介绍：开启后，手机端侧边栏展示今日文章数量'
    );
    $TodayArchive4Phone->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($TodayArchive4Phone);
    
    // 评论楼层
    $CommentFloor = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentFloor',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启评论楼层',
        '介绍：开启后，评论右侧展示该评论所属楼层'
    );
    $CommentFloor->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentFloor);
    
    // 评论等级
    $CommentLevel = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentLevel',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启评论等级',
        '介绍：开启后，评论部分展示评论者的等级'
    );
    $CommentLevel->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentLevel);
    
    // 复制内容弹窗提醒
    $CopyRightText = new Typecho_Widget_Helper_Form_Element_Text(
        'CopyRightText',
        NULL,
        NULL,
        '网站复制时提醒内容',
        '介绍：填写此处，有人复制网站内容则弹出该提示 <br />'
    );
    $CopyRightText->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CopyRightText->multiMode());
    
    // 百度收录
    $BaiduDomain = new Typecho_Widget_Helper_Form_Element_Select(
        'BaiduDomain',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启百度收录查询',
        '介绍：开启后，底部展示百度收录条数'
    );
    $BaiduDomain->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($BaiduDomain);
    
    // 版权声明
    $CopyRightContent = new Typecho_Widget_Helper_Form_Element_Select(
        'CopyRightContent',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启文章底部版权声明',
        '介绍：开启后，文章底部展示版权声明及转载提示'
    );
    $CopyRightContent->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CopyRightContent);
    
    // 前台审核评论
    $Comments4Reception = new Typecho_Widget_Helper_Form_Element_Select(
        'Comments4Reception',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启前台评论审核功能',
        '介绍：开启后，文章底部评论区域显示删除和垃圾按钮，可以对该条评论做删除等操作'
    );
    $Comments4Reception->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($Comments4Reception);
    
    // 友链样式
    $FriendLinkStyle = new Typecho_Widget_Helper_Form_Element_Select(
        'FriendLinkStyle',
        array(
            '01' => '样式1',
            '02' => '样式2',
        ),
        '01',
        '选择友链样式',
        '介绍：可以根据个人选择不同的友链样式'
    );
    $FriendLinkStyle->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($FriendLinkStyle->multiMode());
    
    // 友链随机排序
    $FriendsSort = new Typecho_Widget_Helper_Form_Element_Select(
        'FriendsSort',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启友链随机排序',
        '介绍：开启后，友链界面所有友链随机排序'
    );
    $FriendsSort->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($FriendsSort);
    
    
    // 导航
    $Navigation1Name = new Typecho_Widget_Helper_Form_Element_Text(
        'Navigation1Name',
        NULL,
        NULL,
        '导航栏目一名称',
        '介绍：填写后将展示导航栏目一 <br />'
    );
    $Navigation1Name->setAttribute('class', 'joe_content joe_navigation');
    $form->addInput($Navigation1Name->multiMode());
    
    
    $Navigation1Cont = new Typecho_Widget_Helper_Form_Element_Textarea(
        'Navigation1Cont',
        NULL,
        '百度 || https://baidu.com || https://www.baidu.com/img/flexible/logo/pc/result.png || 中国最大的搜索引擎',
        '导航栏目一（非必填）',
        '介绍：用于填写导航栏目一内容 <br />
         注意：您需要先增加导航页面（新增独立页面-右侧模板选择个人导航），该项才会生效 <br />
         格式：网站名称 || 网站地址 || 网站地址 || 网站简介 <br />
         其他：一行一个，一行代表一个网站'
    );
    $Navigation1Cont->setAttribute('class', 'joe_content joe_navigation');
    $form->addInput($Navigation1Cont);


    $Navigation2Name = new Typecho_Widget_Helper_Form_Element_Text(
        'Navigation2Name',
        NULL,
        NULL,
        '导航栏目二名称',
        '介绍：填写后将展示导航栏目二 <br />'
    );
    $Navigation2Name->setAttribute('class', 'joe_content joe_navigation');
    $form->addInput($Navigation2Name->multiMode());
    
    
    $Navigation2Cont = new Typecho_Widget_Helper_Form_Element_Textarea(
        'Navigation2Cont',
        NULL,
        '百度 || https://baidu.com || https://www.baidu.com/img/flexible/logo/pc/result.png || 中国最大的搜索引擎',
        '导航栏目二（非必填）',
        '介绍：用于填写导航栏目二内容 <br />
         注意：您需要先增加导航页面（新增独立页面-右侧模板选择个人导航），该项才会生效 <br />
         格式：网站名称 || 网站地址 || 网站地址 || 网站简介 <br />
         其他：一行一个，一行代表一个网站'
    );
    $Navigation2Cont->setAttribute('class', 'joe_content joe_navigation');
    $form->addInput($Navigation2Cont);
    
    $Navigation3Name = new Typecho_Widget_Helper_Form_Element_Text(
        'Navigation3Name',
        NULL,
        NULL,
        '导航栏目三名称',
        '介绍：填写后将展示导航栏目三 <br />'
    );
    $Navigation3Name->setAttribute('class', 'joe_content joe_navigation');
    $form->addInput($Navigation3Name->multiMode());
    
    
    $Navigation3Cont = new Typecho_Widget_Helper_Form_Element_Textarea(
        'Navigation3Cont',
        NULL,
        '百度 || https://baidu.com || https://www.baidu.com/img/flexible/logo/pc/result.png || 中国最大的搜索引擎',
        '导航栏目三（非必填）',
        '介绍：用于填写导航栏目三内容 <br />
         注意：您需要先增加导航页面（新增独立页面-右侧模板选择个人导航），该项才会生效 <br />
         格式：网站名称 || 网站地址 || 网站地址 || 网站简介 <br />
         其他：一行一个，一行代表一个网站'
    );
    $Navigation3Cont->setAttribute('class', 'joe_content joe_navigation');
    $form->addInput($Navigation3Cont);
    
    // 友链管理
    $linkManage = new Typecho_Widget_Helper_Form_Element_Select(
        'linkManage',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启友链管理，开启前请务必开启插件，否则友链界面将报错',
        '介绍：开启后，友链界面可以展示通过提交审批通过的链接'
    );
    $linkManage->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($linkManage);
    
    // 评论图片
    $CommentImg = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentImg',
        array('on' => '开启（默认）', 'off' => '关闭'),
        'on',
        '是否开启评论图片功能',
        '介绍：开启后，评论区域可以选择图片进行评论'
    );
    $CommentImg->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentImg);
    
    // 图床token
    $TuChuangToken = new Typecho_Widget_Helper_Form_Element_Text(
        'TuChuangToken',
        NULL,
        NULL,
        '图床Token',
        '介绍：填写此处，编辑器上传图床按钮可以将图片自动上传到图床并自动返回链接到编辑器 <br/>
        token申请地址 <a href="https://img.'.$ZhinianSite.'">https://img.'.$ZhinianSite.'</a>'
    );
    $TuChuangToken->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($TuChuangToken->multiMode());
    
    // 是否开启回复可见全部显示
    $CommentShow = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentShow',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启回复可见全部显示',
        '介绍：开启后，所有设置的回复可见均可以正常显示'
    );
    $CommentShow->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentShow);
    
    // 跳转页地址
    $JumpPageUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'JumpPageUrl',
        NULL,
        NULL,
        '跳转页地址',
        '介绍：填写此处，点击友链先打开跳转页，等待3秒后自动打开友链网站 <br/>
        样例(可填写以下地址)： https://zhinianboke.com/usr/themes/Joe-master/library/jump/jumpPage.php?url='
    );
    $JumpPageUrl->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JumpPageUrl->multiMode());
    
    $FooterNavs = new Typecho_Widget_Helper_Form_Element_Textarea(
        'FooterNavs',
        NULL,
        NULL,
        '底部导航栏自定义菜单（非必填）',
        '介绍：用于自定义底部导航栏链接 <br />
         格式：跳转文字 || 跳转链接 || svg图标，大小30左右（在 https://www.iconfont.cn/ 中获取）<br />
         其他：一行一个，一行代表一个菜单 <br />
         例如：<br />
            百度一下 || https://baidu.com || svg图标代码 <br />
            百度一下 || https://baidu.com || svg图标代码
         '
    );
    $FooterNavs->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($FooterNavs);
    
    // 首页广告样式
    $IndexAdStyle = new Typecho_Widget_Helper_Form_Element_Select(
        'IndexAdStyle',
        array(
            '01' => '平铺',
            '02' => '轮播',
        ),
        '01',
        '选择首页广告显示样式',
        '介绍：可以根据个人选择不同的首页广告样式'
    );
    $IndexAdStyle->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($IndexAdStyle->multiMode());
    
    // 头像呼吸灯
    $AvatarLight = new Typecho_Widget_Helper_Form_Element_Select(
        'AvatarLight',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启头像呼吸灯',
        '介绍：开启后，所有头像都会显示呼吸灯效果'
    );
    $AvatarLight->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($AvatarLight);
    
    // 评论验证码功能
    $CommentGeetest = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentGeetest',
        array('on' => '开启（默认）', 'off' => '关闭'),
        'on',
        '是否开启评论验证码功能',
        '介绍：开启后，评论需要输入验证码才能提交'
    );
    $CommentGeetest->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentGeetest);
    
    // 最新文章
    $ShowNewArticle = new Typecho_Widget_Helper_Form_Element_Select(
        'ShowNewArticle',
        array(
            'off' => '关闭',
            '1' => '一天内',
            '2' => '二天内',
            '3' => '三天内',
            '4' => '四天内',
            '5' => '五天内',
        ),
        'off',
        '选择最新文章标记天数',
        '介绍：最新文章在标题左侧显示最新文章标志，选择显示最近几天的最新文章'
    );
    $ShowNewArticle->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ShowNewArticle->multiMode());
    
    // 恋爱计时
    $LoveTime = new Typecho_Widget_Helper_Form_Element_Textarea(
        'LoveTime',
        NULL,
        NULL,
        '侧边栏恋爱计时',
        '格式：你的QQ号 || 你对象的QQ号 || 恋爱时间<br/>
         例如：123456 || 45678 || 2021-01-04'
    );
    $LoveTime->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($LoveTime);
    
    
    // 文章列表穿插广告
    // $Ad4Article = new Typecho_Widget_Helper_Form_Element_Textarea(
    //     'Ad4Article',
    //     NULL,
    //     NULL,
    //     '文章列表穿插广告',
    //     '格式：你的QQ号 || 你对象的QQ号 || 恋爱时间<br/>
    //      例如：123456 || 45678 || 2021-01-04'
    // );
    // $Ad4Article->setAttribute('class', 'joe_content joe_custom');
    // $form->addInput($Ad4Article);
    
    // 文章目录树
    $ArticleDirTree = new Typecho_Widget_Helper_Form_Element_Select(
        'ArticleDirTree',
        array('on' => '开启（默认）', 'off' => '关闭'),
        'on',
        '是否开启文章目录树功能（仅限PC并且分辨率大于1700像素才会显示）',
        '介绍：开启后，文章左侧会显示目录树，文章内需要使用H标题(编辑器自带)'
    );
    $ArticleDirTree->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ArticleDirTree);
    
    $JADPost4Header = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JADPost4Header',
        NULL,
        NULL,
        '文章页顶部广告',
        '介绍：用于设置文章页顶部广告 <br />
         格式：广告图片 || 跳转链接 （中间使用两个竖杠分隔）|| 到期日<br />
         注意：如果您只想显示图片不想跳转，可填写：广告图片 || javascript:void(0)  || 2022-04-09 <br />
         其他：一行一个，一行代表一个轮播广告图'
    );
    $JADPost4Header->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JADPost4Header);
    
    $JADPost4Fotter = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JADPost4Fotter',
        NULL,
        NULL,
        '文章页底部广告',
        '介绍：用于设置文章页底部广告 <br />
         格式：广告图片 || 跳转链接 （中间使用两个竖杠分隔）|| 到期日<br />
         注意：如果您只想显示图片不想跳转，可填写：广告图片 || javascript:void(0)  || 2022-04-09 <br />
         其他：一行一个，一行代表一个轮播广告图'
    );
    $JADPost4Fotter->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JADPost4Fotter);
    
    
    $JsdelivrPath = new Typecho_Widget_Helper_Form_Element_Select(
        'JsdelivrPath',
        array(
            'https://fastly.jsdelivr.net' => '官方（默认）',
            'https://cdn.xxhzm.cn/jsdelivr' => 'https://www.xxhzm.cn/',
            'https://zhinianboke.com/usr/themes/Joe-master/assets/jsdelivr' => '执念博客',
            'https://zhinianboke.cn/usr/themes/Joe-master/assets/jsdelivr' => '执念博客1',
            'https://static.4ce.cn' => 'https://static.4ce.cn',
            'https://cdn.tencent-weixin.com/jsdelivr' => 'https://cdn.tencent-weixin.com/',
            'on' => '本地',
        ),
        'https://fastly.jsdelivr.net',
        '选择Jsdelivr静态文件cdn地址',
        '介绍：自行测试cdn源的快慢'
    );
    
    $JsdelivrPath->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JsdelivrPath);
    
    // 评论城市
    $CommentCity = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentCity',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启显示评论者所属城市',
        '介绍：开启后，评论会显示评论者的归属地'
    );
    $CommentCity->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentCity);
    
    // 底部好久不见
    $Footer4Hello = new Typecho_Widget_Helper_Form_Element_Select(
        'Footer4Hello',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启底部好久不见',
        '介绍：开启后，网站底部显示好久不见'
    );
    $Footer4Hello->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($Footer4Hello);
    
    // logo扫光
    $Logo4SaoGuang = new Typecho_Widget_Helper_Form_Element_Select(
        'Logo4SaoGuang',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启LOGO扫光特效',
        '介绍：开启后，LOGO图片显示扫光特效'
    );
    $Logo4SaoGuang->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($Logo4SaoGuang);
    
    // 首页大图
    $IndexBigImg = new Typecho_Widget_Helper_Form_Element_Text(
        'IndexBigImg',
        NULL,
        NULL,
        '首页大图url地址',
        '介绍：填写此处，首页顶部将显示大图 <br />'
    );
    $IndexBigImg->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($IndexBigImg->multiMode());
    
    
    // 首页大图
    $ZhinianSite = new Typecho_Widget_Helper_Form_Element_Text(
        'ZhinianSite',
        NULL,
        NULL,
        '执念博客域名',
        '介绍：防止官方修改域名之后后台无法使用，例如填写：zhinianboke.com <br />'
    );
    $ZhinianSite->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ZhinianSite->multiMode());
    
    // 匿名评论
    $NimingComment = new Typecho_Widget_Helper_Form_Element_Select(
        'NimingComment',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启匿名评论',
        '介绍：开启后，用户可以匿名评论'
    );
    $NimingComment->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($NimingComment);
    
    $ShareStaticFile = new Typecho_Widget_Helper_Form_Element_Select(
		'ShareStaticFile',
		array('02' => '否（默认）', '01' => '是'),
		'02',
		'是否共享自己静态文件(已启用，快来用爱发电吧)',
		'介绍：开启后别人可以调用你网站的静态文件，注意网站流量不多的谨慎开启，防止流量用超'
	);
	$ShareStaticFile->setAttribute('class', 'joe_content joe_custom1');
	$form->addInput($ShareStaticFile->multiMode());
	
	// cdn地址
    $CdnUrl4Themes = new Typecho_Widget_Helper_Form_Element_Text(
        'CdnUrl4Themes',
        NULL,
        NULL,
        '静态文件远程地址',
        '介绍：开启后，主题依赖的静态文件从远程地址获取，自行测试地址的响应速度 <br />
        静态文件地址从以下链接中获取，填入对应的CDN地址即可 <br />
        <a href="https://dy.zhinianboke.com/blog/theme/users/ThemeUsers001/init">https://dy.zhinianboke.com/blog/theme/users/ThemeUsers001/init</a>
        '
    );
    $CdnUrl4Themes->setAttribute('class', 'joe_content joe_custom1');
    $form->addInput($CdnUrl4Themes->multiMode());
	
	
	 //彩虹条
    $RainbowBar = new Typecho_Widget_Helper_Form_Element_Select(
        'RainbowBar',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启顶部彩虹条',
        '介绍：开启后，首页和文章展示顶部彩虹条'
        );
    $RainbowBar->setAttribute('class', 'joe_content joe_custom1');
    $form->addInput($RainbowBar);
    
    $Greetingpop = new Typecho_Widget_Helper_Form_Element_Select(
        'Greetingpop',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启访问问候弹窗',
        '介绍：开启后，网站弹窗显示客户端信息和FPS'
        );
    $Greetingpop->setAttribute('class', 'joe_content joe_custom1');
    $form->addInput($Greetingpop);
    
    //打字框
    $dzj = new Typecho_Widget_Helper_Form_Element_Select(
	    'dzj',
	    array('off' => '关闭（默认）', 'on' => '开启'),
	    'off',
	    '是否开启评论打字框特效',
	    '介绍：开启后，评论打字的时候将会有爱心特效'
	    );
    $dzj->setAttribute('class', 'joe_content joe_custom1');
    $form->addInput($dzj->multiMode());
    
    $JHeaderCounter = new Typecho_Widget_Helper_Form_Element_Select(
		'JHeaderCounter',
		array('off' => '关闭（默认）','on' => '开启'),
		'off',
		'是否开启顶部浏览进度条',
		'介绍：开启后页面顶部位置将会展示屏幕浏览进度条'
	);
	$JHeaderCounter->setAttribute('class', 'joe_content joe_custom1');
	$form->addInput($JHeaderCounter->multiMode());
	
	$JFooterFish = new Typecho_Widget_Helper_Form_Element_Select(
		'JFooterFish',
		array('off' => '关闭（默认）','on' => '开启'),
		'off',
		'是否开启底部鱼群跳跃',
		'介绍：开启后页面底部位置将会展示灵动的鱼群跳跃，增添网站灵动气氛'
	);
	$JFooterFish->setAttribute('class', 'joe_content joe_custom1');
	$form->addInput($JFooterFish->multiMode());
	
	$JArticleBottomText = new Typecho_Widget_Helper_Form_Element_Textarea(
		'JArticleBottomText',
		NULL,
		NULL,
		'文章底部自定义信息',
		'介绍：可以写免责声明等 <br>
		 格式：一行代表一列<br>
		 例：<br>
		 本站资源多为网络收集，如涉及版权问题请及时与站长联系，我们会在第一时间内删除资源。<br>
         本站用户发帖仅代表本站用户个人观点，并不代表本站赞同其观点和对其真实性负责。<br>
         本站一律禁止以任何方式发布或转载任何违法的相关信息，访客发现请向站长举报。<br>
         本站资源大多存储在云盘，如发现链接失效，请及时与站长联系，我们会第一时间更新。<br>
         转载本网站任何内容，请按照转载方式正确书写本站原文地址。<br>'
	);
	$JArticleBottomText->setAttribute('class', 'joe_content joe_custom1');
	$form->addInput($JArticleBottomText);
	
	$JessayTarget = new Typecho_Widget_Helper_Form_Element_Select(
		'JessayTarget',
		array(
			'_blank' => '_blank（默认，新窗口）',
			'_parent' => '_parent（当前窗口）',
			'_self' => '_self（同窗口）',
			'_top' => '_top（顶端打开窗口）',
		),
		'_blank',
		'文章列表打开方式',
		'介绍：用来切换文章的打开方式，新窗口打开或者是本窗口打开'
	);
	$JessayTarget->setAttribute('class', 'joe_content joe_custom1');
	$form->addInput($JessayTarget->multiMode());
	
	$ClickXiaoGuo = new Typecho_Widget_Helper_Form_Element_Text(
		'ClickXiaoGuo',
		NULL,
		NULL,
		'鼠标点击特效',
		'介绍：鼠标每一次点击，展示对应的文字或者表情 <br>
		 格式：文字1||文字2||文字3<br>
		 例：执念||☺||博客<br>'
	);
	$ClickXiaoGuo->setAttribute('class', 'joe_content joe_custom1');
	$form->addInput($ClickXiaoGuo);
	
	$ffyd_shouquanma = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_shouquanma',
		NULL,
		NULL,
		'授权码',
		'介绍：必须填写该处才可以正常使用 <br/>
        授权码申请地址 <a href="https://dy.zhinianboke.com">https://dy.zhinianboke.com</a><br>
        <span style="color:red;">下面的支付宝和微信配置不填写也可以使用，不过要到 https://dy.zhinianboke.com 的支付管理菜单中进行提现，请知悉</span><br>
        不填写官方也可以自行到账，填写下方易支付商户id和秘钥即可'
	);
	$ffyd_shouquanma->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_shouquanma->multiMode());
	
	$ffyd_qq = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_qq',
		NULL,
		NULL,
		'QQ号码',
		'介绍：没啥介绍的'
	);
	$ffyd_qq->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_qq->multiMode());
	
	$ffyd_cookietime = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_cookietime',
		NULL,
		NULL,
		'免登录Cookie保存时间(天)',
		'介绍：付费后多长时间内可以重复阅读，默认为1天。'
	);
	$ffyd_cookietime->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_cookietime->multiMode());
	
	$ffyd_zhifubao_zhifu = new Typecho_Widget_Helper_Form_Element_Select(
		'ffyd_zhifubao_zhifu',
		array('' => '关闭（默认）','01' => '开启'),
		'',
		'是否开启支付宝支付',
		'介绍：开启后付费阅读支持支付宝支付'
	);
	$ffyd_zhifubao_zhifu->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_zhifubao_zhifu->multiMode());
	
	$ffyd_weixin_zhifu = new Typecho_Widget_Helper_Form_Element_Select(
		'ffyd_weixin_zhifu',
		array('' => '关闭（默认）','01' => '开启'),
		'',
		'是否开启微信支付',
		'介绍：开启后付费阅读支持微信支付'
	);
	$ffyd_weixin_zhifu->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_weixin_zhifu->multiMode());
	
	$ffyd_qq_zhifu = new Typecho_Widget_Helper_Form_Element_Select(
		'ffyd_qq_zhifu',
		array('' => '关闭（默认）','01' => '开启'),
		'',
		'是否开启QQ支付',
		'介绍：开启后付费阅读支持QQ支付'
	);
	$ffyd_qq_zhifu->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_qq_zhifu->multiMode());
	
	$ffyd_zhifubao_appid = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_zhifubao_appid',
		NULL,
		NULL,
		'支付宝appid',
		'介绍：如果需要实时到账自己账号必须填写该处 <br/>'
	);
    $ffyd_zhifubao_appid->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_zhifubao_appid->multiMode());
	
	$ffyd_zhifubao_private_key = new Typecho_Widget_Helper_Form_Element_Textarea(
		'ffyd_zhifubao_private_key',
		NULL,
		NULL,
		'支付宝应用私钥',
		'介绍：应用私钥，不是支付宝私钥。'
	);
	$ffyd_zhifubao_private_key->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_zhifubao_private_key);
	
	$ffyd_zhifubao_public_key = new Typecho_Widget_Helper_Form_Element_Textarea(
		'ffyd_zhifubao_public_key',
		NULL,
		NULL,
		'支付宝公钥',
		'介绍：在支付宝生成的公钥。'
	);
	$ffyd_zhifubao_public_key->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_zhifubao_public_key);
	
	
	$ffyd_weixin_appid = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_weixin_appid',
		NULL,
		NULL,
		'微信公众号appid',
		'介绍：如果需要实时到账自己账号必须填写该处 <br/>'
	);
    $ffyd_weixin_appid->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_weixin_appid->multiMode());
	
	$ffyd_weixin_mchId = new Typecho_Widget_Helper_Form_Element_Textarea(
		'ffyd_weixin_mchId',
		NULL,
		NULL,
		'微信商户号',
		'介绍：微信商户号mchId。'
	);
	$ffyd_weixin_mchId->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_weixin_mchId);
	
	$ffyd_weixin_mchKey = new Typecho_Widget_Helper_Form_Element_Textarea(
		'ffyd_weixin_mchKey',
		NULL,
		NULL,
		'微信商户密钥',
		'介绍：微信商户密钥mchKey。'
	);
	$ffyd_weixin_mchKey->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_weixin_mchKey);
	
	
	$ffyd_yizhifu_interfUrl = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_yizhifu_interfUrl',
		NULL,
		NULL,
		'易支付API接口支付地址',
		'介绍：填写对应易支付网站中的API接口支付地址,注意后面有 mapi.php <br>
		例如：https://suyan.qqdsw8.cn/mapi.php'
	);
    $ffyd_yizhifu_interfUrl->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_yizhifu_interfUrl->multiMode());
	
	$ffyd_yizhifu_pid = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_yizhifu_pid',
		NULL,
		NULL,
		'易支付商户ID',
		'介绍：申请地址如下 <a href="https://suyan.qqdsw8.cn/user/reg.php" target="_BLANK">https://suyan.qqdsw8.cn/user/reg.php</a> <br/>
		<span style="color:red;">本站不对该地址资金结算做保证，只是提供一个渠道</span>'
	);
    $ffyd_yizhifu_pid->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_yizhifu_pid->multiMode());
	
	$ffyd_yizhifu_miyao = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_yizhifu_miyao',
		NULL,
		NULL,
		'易支付商户密钥',
		'介绍：申请的商户秘钥 <br/>'
	);
    $ffyd_yizhifu_miyao->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_yizhifu_miyao->multiMode());
	
	
	$ffyd_mazhifu_interfUrl = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_mazhifu_interfUrl',
		NULL,
		NULL,
		'码支付API接口支付地址',
		'介绍：填写对应码支付网站中的支付请求支付地址,注意后面可能有 submit.php <br>
		例如：https://pay.ococn.cn/submit.php'
	);
    $ffyd_mazhifu_interfUrl->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_mazhifu_interfUrl->multiMode());
	
	$ffyd_mazhifu_pid = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_mazhifu_pid',
		NULL,
		NULL,
		'码支付商户ID',
		'介绍：申请地址如下 <a href="https://pay.ococn.cn/User/Login.php?invite_user=199451637" target="_BLANK">https://pay.ococn.cn/User/Login.php?invite_user=199451637</a> <br/>
		<span style="color:red;">本站不对该地址资金结算做保证，只是提供一个渠道</span>'
	);
    $ffyd_mazhifu_pid->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_mazhifu_pid->multiMode());
	
	$ffyd_mazhifu_miyao = new Typecho_Widget_Helper_Form_Element_Text(
		'ffyd_mazhifu_miyao',
		NULL,
		NULL,
		'码支付商户密钥',
		'介绍：申请的商户秘钥 <br/>'
	);
    $ffyd_mazhifu_miyao->setAttribute('class', 'joe_content joe_ffyd');
	$form->addInput($ffyd_mazhifu_miyao->multiMode());
?>