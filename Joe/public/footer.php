<?php
    //首先你要有读写文件的权限，首次访问不显示，正常情况刷新即可
    $online_log = "slzxrs.dat"; //保存人数的文件到根目录,
    $timeout = 30;//30秒内没动作者,认为掉线
    @$entries = file($online_log);
    $temp = array();
    for ($i=0;$i<count($entries);$i++){
        $entry = explode(",",trim($entries[$i]));
        if(($entry[0] != getenv('REMOTE_ADDR')) && ($entry[1] > time())) {
            array_push($temp,$entry[0].",".$entry[1]."\n"); //取出其他浏览者的信息,并去掉超时者,保存进$temp
        }
    }
    array_push($temp,getenv('REMOTE_ADDR').",".(time() + ($timeout))."\n"); //更新浏览者的时间
    $slzxrs = count($temp); //计算在线人数
    $entries = implode("",$temp);
    //写入文件
    $fp = fopen($online_log,"w");
    flock($fp,LOCK_EX); //flock() 不能在NFS以及其他的一些网络文件系统中正常工作
    fputs($fp,$entries);
    flock($fp,LOCK_UN);
    fclose($fp);
    $tj= "在线人数：". $slzxrs . " 人";
?>
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
<?php 
    if(!empty(Helper::options()->_51la)) {
        $_51laIdSave = Helper::options()->_51la;
        $_51laTypeStyle = $_51laIdSave;
    }
?>
<footer class="joe_footer">
    <div class="joe_container" style="min-height: 20px;margin-top: 20px;">
        <div class="item">
            <?php $this->options->JFooter_Left() ?>
        </div>
        <div class="item" style="margin: 10px; <?php if(Helper::options()->onlinePersion !== 'on') echo 'display:none;'  ?>">
            <?php echo $tj ?>
        </div>
        <?php if ($this->options->JBirthDay) : ?>
            <div class="item run" style="<?php if(Helper::options()->Footer4Hello == 'on') echo 'display:none;'  ?>">
                <span>已运行 <strong class="joe_run__day">00</strong> 天 <strong class="joe_run__hour">00</strong> 时 <strong class="joe_run__minute">00</strong> 分 <strong class="joe_run__second">00</strong> 秒</span>
            </div>
        <?php endif; ?>
        <div class="item">
            <?php $this->options->JFooter_Right() ?>
        </div>
    </div>
    <div class="joe_container" style="min-height: 20px;margin-bottom: 20px;">
        <?php if (!empty(Helper::options()->_51la)) : ?>
        	<div class="item" style="<?php if(empty(Helper::options()->_51la)) echo 'display:none;'  ?>">
                <script charset="UTF-8" id="LA_COLLECT" src="//sdk.51.la/js-sdk-pro.min.js"></script>
                <script>LA.init({id: "<?php echo $_51laTypeStyle ?>",ck: "<?php echo $_51laTypeStyle ?>"})</script>
                <a target="_blank" title="51la网站统计" href="https://v6.51.la/land/<?php echo $_51laTypeStyle ?>"><img src="https://sdk.51.la/icon/3-1.png"></a>
                <script id="LA-DATA-WIDGET" crossorigin="anonymous" charset="UTF-8" src="https://v6-widget.51.la/v6/<?php echo $_51laTypeStyle ?>/quote.js?theme=0&f=12&display=0,1,1,1,1,1,1,1"></script>
            </div>
        <?php endif; ?>
        <div class="item" id="mli" style="<?php if(Helper::options()->BaiduDomain !== 'on') echo 'display:none;'  ?>">
        </div>
    </div>
    <?php
    if ($this->options->JFooterFish == 'on') {
        ?>
            <div id="footer_fish"></div>
            <script src="<?php _CdnUrl4Themes('assets/js/FooterFish.js'); ?>"></script>
        <?php
    }
    ?>
</footer>

<div class="joe_action">
    <div class="joe_action_item scroll">
        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="25" height="25">
            <path d="M725.902 498.916c18.205-251.45-93.298-410.738-205.369-475.592l-6.257-3.982-6.258 3.414c-111.502 64.853-224.711 224.142-204.8 475.59-55.751 53.476-80.214 116.623-80.214 204.8v15.36l179.2-35.27c11.378 40.39 58.596 69.973 113.21 69.973 54.613 0 101.262-29.582 112.64-68.836l180.337 36.41v-15.36c-.569-89.885-25.031-153.6-82.489-206.507zM571.733 392.533c-33.564 31.29-87.04 28.445-118.329-5.12s-28.444-87.04 5.12-117.76c33.565-31.289 87.04-28.444 118.33 5.12s28.444 86.471-5.12 117.76zm-56.32 368.64c-35.84 0-64.284 29.014-64.284 64.285 0 35.84 54.044 182.613 64.284 182.613s64.285-146.773 64.285-182.613c0-35.271-29.014-64.285-64.285-64.285z" />
        </svg>
    </div>
    <div class="joe_action_item mode">
        <svg class="icon-1" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="25" height="25">
            <path d="M587.264 104.96c33.28 57.856 52.224 124.928 52.224 196.608 0 218.112-176.128 394.752-393.728 394.752-29.696 0-58.368-3.584-86.528-9.728C223.744 832.512 369.152 934.4 538.624 934.4c229.376 0 414.72-186.368 414.72-416.256 1.024-212.992-159.744-389.12-366.08-413.184z" />
            <path d="M340.48 567.808l-23.552-70.144-70.144-23.552 70.144-23.552 23.552-70.144 23.552 70.144 70.144 23.552-70.144 23.552-23.552 70.144zM168.96 361.472l-30.208-91.136-91.648-30.208 91.136-30.208 30.72-91.648 30.208 91.136 91.136 30.208-91.136 30.208-30.208 91.648z" />
        </svg>
        <svg class="icon-2" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="25" height="25">
            <path d="M234.24 512a277.76 277.76 0 1 0 555.52 0 277.76 277.76 0 1 0-555.52 0zM512 187.733a42.667 42.667 0 0 1-42.667-42.666v-102.4a42.667 42.667 0 0 1 85.334 0v102.826A42.667 42.667 0 0 1 512 187.733zm-258.987 107.52a42.667 42.667 0 0 1-29.866-12.373l-72.96-73.387a42.667 42.667 0 0 1 59.306-59.306l73.387 72.96a42.667 42.667 0 0 1 0 59.733 42.667 42.667 0 0 1-29.867 12.373zm-107.52 259.414H42.667a42.667 42.667 0 0 1 0-85.334h102.826a42.667 42.667 0 0 1 0 85.334zm34.134 331.946a42.667 42.667 0 0 1-29.44-72.106l72.96-73.387a42.667 42.667 0 0 1 59.733 59.733l-73.387 73.387a42.667 42.667 0 0 1-29.866 12.373zM512 1024a42.667 42.667 0 0 1-42.667-42.667V878.507a42.667 42.667 0 0 1 85.334 0v102.826A42.667 42.667 0 0 1 512 1024zm332.373-137.387a42.667 42.667 0 0 1-29.866-12.373l-73.387-73.387a42.667 42.667 0 0 1 0-59.733 42.667 42.667 0 0 1 59.733 0l72.96 73.387a42.667 42.667 0 0 1-29.44 72.106zm136.96-331.946H878.507a42.667 42.667 0 1 1 0-85.334h102.826a42.667 42.667 0 0 1 0 85.334zM770.987 295.253a42.667 42.667 0 0 1-29.867-12.373 42.667 42.667 0 0 1 0-59.733l73.387-72.96a42.667 42.667 0 1 1 59.306 59.306l-72.96 73.387a42.667 42.667 0 0 1-29.866 12.373z" />
        </svg>
    </div>
</div>
<div class="chenyuyc" style="<?php if(Helper::options()->Footer4Hello !== 'on') echo 'display:none;'  ?>">
    <div class="footer-fav">
      <div class="container">
        <div class="fl site-info">
          <h2><a href="<?php $this->options->JAside_Author_Link() ?>" target="_blank"><?php $this->options->JAside_Author_Nick ? $this->options->JAside_Author_Nick() : ($this->authorId ? $this->author->screenName() : $this->user->screenName()); ?></a></h2>
          <div class="site-p">
              <p><?php $this->options->JAside_Author_Nick ? $this->options->JAside_Author_Nick() : ($this->authorId ? $this->author->screenName() : $this->user->screenName()); ?>【<span class="motto joe_motto"></span>】</p>
              <p>
                <?php if ($this->options->JBirthDay) : ?>
                    <div class="item run">
                        <span>风风雨雨 <strong class="joe_run__day">00</strong> 天 <strong class="joe_run__hour">00</strong> 时 <strong class="joe_run__minute">00</strong> 分 <strong class="joe_run__second">00</strong> 秒，你是第 <?php echo theAllViews();?> 位相遇的小伙伴</span>
                    </div>
                <?php endif; ?>
              </p>
          </div>
        </div>
        <div class="fr site-fav">
          <a href="<?php $this->options->JAside_Author_Link() ?>" class="btn btn-fav btn-orange">Ctrl+D收藏本站</a></div>
        <div class="site-girl">
            <div class="girl fl"> <i class="thumb " style="<?php echo 'background-image:url(' . $JsdelivrPath. '/gh/cy-j/chenyu/img/cyxy.png)';?>"></i> </div>
            <div class="girl-info hide_md">
              <h4>绿水本无忧，因风皱面</h4>
              <h4>青山原不老，为雪白头</h4>
            </div>
        </div>
      </div>
    </div>
</div>
<?php 
    $FooterNavs = array();
    $FooterNavs_text = $this->options->FooterNavs;
    if ($FooterNavs_text) {
        $FooterNavs_arr = explode("\r\n", $FooterNavs_text);
        if (count($FooterNavs_arr) > 0) {
            for ($i = 0; $i < count($FooterNavs_arr); $i++) {
                $name = explode("||", $FooterNavs_arr[$i])[0];
                $url =  explode("||", $FooterNavs_arr[$i])[1];
                $img = explode("||", $FooterNavs_arr[$i])[2];
                if(empty($img)) {
                    $img = '<svg t="1633853826797" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7556" width="30" height="30"><path d="M155.584 342.56l312.874667-224.565333a74.666667 74.666667 0 0 1 87.082666 0l312.874667 224.565333A117.333333 117.333333 0 0 1 917.333333 437.866667V800c0 64.8-52.533333 117.333333-117.333333 117.333333H224c-64.8 0-117.333333-52.533333-117.333333-117.333333V437.877333a117.333333 117.333333 0 0 1 48.917333-95.317333z m37.322667 51.989333A53.333333 53.333333 0 0 0 170.666667 437.877333V800a53.333333 53.333333 0 0 0 53.333333 53.333333h576a53.333333 53.333333 0 0 0 53.333333-53.333333V437.877333a53.333333 53.333333 0 0 0-22.24-43.328L518.218667 169.984a10.666667 10.666667 0 0 0-12.437334 0L192.906667 394.56z" p-id="7557"></path></svg>';
                }
                $FooterNavs[] = array("name" => trim($name), "url" => trim($url), "img" => trim($img));
            };
        }
    }
?>

<?php if (sizeof($FooterNavs) > 0) : ?>
    <div id="mobile-footer">
        <ul id="mobile-menu">
            <?php foreach ($FooterNavs as $item) : ?>
                <li> <a href="<?php echo $item['url']; ?>"><span><?php echo $item['img']; ?></span><?php echo $item['name']; ?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <script>
        var navsNum = <?php echo sizeof($FooterNavs); ?> || 1;
        var widthSize = 100 / navsNum;
        $("#mobile-footer #mobile-menu li").width(widthSize + '%');
        if(!$("#mobile-footer").is(":hidden")) {
            $('footer').css('marginBottom', 40);
        }
    </script>
    
<?php endif; ?>
<script>
    <?php
    $cookie = Typecho_Cookie::getPrefix();
    $notice = $cookie . '__typecho_notice';
    $type = $cookie . '__typecho_notice_type';
    ?>
    <?php if (isset($_COOKIE[$notice]) && isset($_COOKIE[$type]) && ($_COOKIE[$type] == 'success' || $_COOKIE[$type] == 'notice' || $_COOKIE[$type] == 'error')) : ?>
        Qmsg.info("<?php echo preg_replace('#\[\"(.*?)\"\]#', '$1', $_COOKIE[$notice]); ?>！")
    <?php endif; ?>
    <?php
    Typecho_Cookie::delete('__typecho_notice');
    Typecho_Cookie::delete('__typecho_notice_type');
    ?>
    console.log("%c页面加载耗时：<?php _endCountTime(); ?> | Theme By Joe", "color:#fff; background: linear-gradient(270deg, #986fee, #8695e6, #68b7dd, #18d7d3); padding: 8px 15px; border-radius: 0 15px 0 15px");
    <?php $this->options->JCustomScript() ?>
</script>
<?php if (strpos($_SERVER['HTTP_HOST'], 'zhinian') !== false) : ?>
    <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6621521188811126"
         crossorigin="anonymous"></script>-->
    <script>
    var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?a1a333f6c3236772fddf8b3f1f3d5e9c";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
    </script>

<?php endif; ?>
<?php $this->options->JCustomBodyEnd() ?>

<?php $this->footer(); ?>
