<?php

/**
 * 友链
 * 
 * @package custom 
 * 
 **/

?>

<!DOCTYPE html>
<html lang="zh-CN">
<?php 
    $JsdelivrPath = Helper::options()->JsdelivrPath;
    if(Helper::options()->JsdelivrPath == 'on') {
        $JsdelivrPath = Helper::options()->themeUrl;
        $JsdelivrPath = $JsdelivrPath . '/assets/jsdelivr';
    }
    if(empty($JsdelivrPath)) {
        $JsdelivrPath = 'https://cdn.jsdelivr.net';
    }
?>
<head>
    <?php $this->need('public/include.php'); ?>
    <?php if ($this->options->JPrismTheme) : ?>
        <link rel="stylesheet" href="<?php $this->options->JPrismTheme() ?>">
    <?php else : ?>
        <link rel="stylesheet" href=<?php echo $JsdelivrPath ?>/npm/prismjs@1.23.0/themes/prism.min.css>
    <?php endif; ?>
    <script src=<?php echo $JsdelivrPath ?>/npm/clipboard@2.0.6/dist/clipboard.min.js></script>
    <script src=<?php echo $JsdelivrPath ?>/npm/typecho-joe-next@6.2.4/plugin/prism/prism.min.js></script>
    <script src="<?php _CdnUrl4Themes('assets/js/joe.post_page.min.js'); ?>"></script>
</head>

<body>
    <div id="Joe">
        <?php $this->need('public/header.php'); ?>
        <?php
            $max_allow_links = 100; // 最大许可检查的链接数目
            function my_file_get_contents($url, $timeout = 30) {
                if (function_exists('curl_init')) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 3000);
                    curl_setopt($ch, CURLOPT_TIMEOUT_MS, 3000);
                    
                    $file_contents = curl_exec($ch);
                    curl_close($ch);
                } else if (ini_get('allow_url_fopen') == 1 || strtolower(ini_get('allow_url_fopen')) == 'on') {
                    $file_contents = @file_get_contents($url);
                } else {
                    $file_contents = '';
                }
                return $file_contents;
            }
            function isExistsContentUrl($url, &$retMsg, $mydomain = "") {
                if (!isset($url) || empty($url)) {
                    $retMsg = "配置URL为空";
                    return false;
                }
                if (!isset($mydomain) || empty($mydomain)) {
                    $mydomain = $_SERVER['SERVER_NAME'];
                }
                $resultContent = my_file_get_contents($url);
                if (trim($resultContent) == '') {
                    $retMsg = "网站无法访问";
                    return false;
                }
                if (strripos($resultContent, $mydomain)) {
                    $retMsg = "友链正常";
                    return true;
                } else {
                    $retMsg = "未添加本站";
                    return false;
                }
            }
        ?>
        <div class="joe_container">
            <div class="joe_main">
                <div class="joe_detail" data-cid="<?php echo $this->cid ?>">
                    <?php $this->need('public/batten.php'); ?>
                    <?php $this->need('public/article.php'); ?>

                    <?php
                    $jumpUrl = Helper::options()->JumpPageUrl;
                    $friends = [];
                    $friends_color = [
                        '#F8D800',
                        '#0396FF',
                        '#EA5455',
                        '#7367F0',
                        '#32CCBC',
                        '#F6416C',
                        '#28C76F',
                        '#9F44D3',
                        '#F55555',
                        '#736EFE',
                        '#E96D71',
                        '#DE4313',
                        '#D939CD',
                        '#4C83FF',
                        '#F072B6',
                        '#C346C2',
                        '#5961F9',
                        '#FD6585',
                        '#465EFB',
                        '#FFC600',
                        '#FA742B',
                        '#5151E5',
                        '#BB4E75',
                        '#FF52E5',
                        '#49C628',
                        '#00EAFF',
                        '#F067B4',
                        '#F067B4',
                        '#ff9a9e',
                        '#00f2fe',
                        '#4facfe',
                        '#f093fb',
                        '#6fa3ef',
                        '#bc99c4',
                        '#46c47c',
                        '#f9bb3c',
                        '#e8583d',
                        '#f68e5f',
                    ];
                    $friends_text = $this->options->JFriends;
                    if ($friends_text) {
                        $friends_arr = explode("\r\n", $friends_text);
                        if (count($friends_arr) > 0) {
                            for ($i = 0; $i < count($friends_arr); $i++) {
                                $name = explode("||", $friends_arr[$i])[0];
                                $url =  $jumpUrl . explode("||", $friends_arr[$i])[1];
                                $avatar = explode("||", $friends_arr[$i])[2];
                                $desc = explode("||", $friends_arr[$i])[3];
                                $friendsUrl = @explode("||", $friends_arr[$i])[4];
                                if($friendsUrl) {
                                    $friends[] = array("name" => trim($name), "url" => trim($url), "avatar" => trim($avatar), "desc" => trim($desc),
                                        "friendsUrl" => trim($friendsUrl));
                                }
                                else {
                                    $friends[] = array("name" => trim($name), "url" => trim($url), "avatar" => trim($avatar), "desc" => trim($desc),
                                        "friendsUrl" => trim($url));
                                }
                            };
                        }
                    }
                    
                    if(Helper::options()->linkManage === 'on') {
                        $db = Typecho_Db::get();
                        $result = $db->query($db->select()->from('table.friends_info')
                            ->where('status = ? ', 'E'));
                        while ($row = $db->fetchRow($result)) {
                            $siteFriendspage = $row['site_friendspage'];
                            if(!empty($siteFriendspage)) {
                                $friends[] = array("name" => trim($row['site_name']), "url" => $jumpUrl . trim($row['site_url']), "avatar" => trim($row['site_avatar']), "desc" => trim($row['site_desc']),
                                    "friendsUrl" => trim($row['site_friendspage']));
                            }
                            else {
                                $friends[] = array("name" => trim($row['site_name']), "url" => $jumpUrl . trim($row['site_url']), "avatar" => trim($row['site_avatar']), "desc" => trim($row['site_desc']),
                                    "friendsUrl" => trim($row['site_url']));
                            }
                        }
                    }
                    
                    ?>
                    <?php if (sizeof($friends) > 0) : ?>
                        <?php if(Helper::options()->FriendsSort === 'on') shuffle($friends); ?>
                        <?php if ($this->options->FriendLinkStyle === '01' || !$this->options->FriendLinkStyle) : ?>
                            <ul class="joe_detail__friends">
                                <?php foreach ($friends as $item) : ?>
                                    
                                    <li class="joe_detail__friends-item">
                                        <a class="contain" href="<?php echo $item['url']; ?>" target="_blank" rel="noopener noreferrer" style="background: <?php echo $friends_color[mt_rand(0, count($friends_color) - 1)] ?>">
                                            <span class="title"><?php echo $item['name']; ?></span>
                                            <span class="title" style="float: right;<?php if(Helper::options()->JFriendsSwitch !== 'on') echo 'display:none;' ?>">
                                                <?php
                                                    if(Helper::options()->JFriendsSwitch !== 'off') {
                                                        $result = "";
                                                        $ret = isExistsContentUrl($item['friendsUrl'], $result, null);
                                                        echo $result;
                                                    }
                                                ?>
                                            </span>
                                            <div class="content">
                                                <div class="desc"><?php echo $item['desc']; ?></div>
                                                <img width="40" height="40" class="avatar lazyload" src="<?php _getAvatarLazyload(); ?>" data-src="<?php echo $item['avatar']; ?>" alt="<?php echo $item['name']; ?>" />
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        
                        
                        <?php if ($this->options->FriendLinkStyle === '02' || $this->options->FriendLinkStyle === '') : ?>
                            <ul class="readers-list clearfix">
                                <?php foreach ($friends as $item) : ?>
                                    <li class="">
                                    	<a rel="noopener noreferrer" title="<?php echo $item['name']; ?>" target="_blank" href="<?php echo $item['url']; ?>"
                                    	    >
                                        	<img src="<?php echo $item['avatar']; ?>" alt="<?php echo $item['name']; ?>">
                                        	<em><?php echo $item['name']; ?></em>
                                        	<span><?php echo $item['desc']; ?></span>
                                    	</a>
                                    </li>
                                <?php endforeach; ?>
                                    <div style="clear:both;"></div>
                                </li>
                            </ul>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    
                        

                    <?php $this->need('public/handle.php'); ?>
                    <?php $this->need('public/copyright.php'); ?>
                </div>
                <?php $this->need('public/comment.php'); ?>
            </div>
            <?php $this->need('public/aside.php'); ?>
        </div>
        <?php $this->need('public/footer.php'); ?>
    </div>
</body>

</html>