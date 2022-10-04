<?php

/**
 * 个人导航
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
    <link rel="stylesheet" href=<?php echo $JsdelivrPath ?>/npm/prismjs@1.23.0/themes/prism.min.css>
    <script src=<?php echo $JsdelivrPath ?>/npm/clipboard@2.0.6/dist/clipboard.min.js></script>
    <script src=<?php echo $JsdelivrPath ?>/npm/typecho-joe-next@6.2.4/plugin/prism/prism.min.js></script>
    <script src="<?php _CdnUrl4Themes('assets/js/joe.post_page.min.js?v=7.3.0'); ?>"></script>
</head>

<body>
    <div id="Joe">
        <?php $this->need('public/header.php'); ?>
        <div class="joe_container">
            <div class="joe_main">
                <section class="main">
                    <div id="mainContent">
                        <div class="joe_detail" data-cid="<?php echo $this->cid ?>">
                            <?php $this->need('public/batten.php'); ?>
        
                            <?php
                            $Navigation1ContArr = [];
                            $Navigation1_text = $this->options->Navigation1Cont;
                            if ($Navigation1_text) {
                                $Navigation1Cont_arr = explode("\r\n", $Navigation1_text);
                                if (count($Navigation1Cont_arr) > 0) {
                                    for ($i = 0; $i < count($Navigation1Cont_arr); $i++) {
                                        $name = explode("||", $Navigation1Cont_arr[$i])[0];
                                        $url = explode("||", $Navigation1Cont_arr[$i])[1];
                                        $img = explode("||", $Navigation1Cont_arr[$i])[2];
                                        $desc = explode("||", $Navigation1Cont_arr[$i])[3];
                                        $Navigation1ContArr[] = array("name" => trim($name), "url" => trim($url), "img" => trim($img), "desc" => trim($desc));
                                    };
                                }
                            }
                            
                            $Navigation2ContArr = [];
                            $Navigation2_text = $this->options->Navigation2Cont;
                            if ($Navigation2_text) {
                                $Navigation2Cont_arr = explode("\r\n", $Navigation2_text);
                                if (count($Navigation1Cont_arr) > 0) {
                                    for ($i = 0; $i < count($Navigation2Cont_arr); $i++) {
                                        $name = explode("||", $Navigation2Cont_arr[$i])[0];
                                        $url = explode("||", $Navigation2Cont_arr[$i])[1];
                                        $img = explode("||", $Navigation2Cont_arr[$i])[2];
                                        $desc = explode("||", $Navigation2Cont_arr[$i])[3];
                                        $Navigation2ContArr[] = array("name" => trim($name), "url" => trim($url), "img" => trim($img), "desc" => trim($desc));
                                    };
                                }
                            }
                            
                            $Navigation3ContArr = [];
                            $Navigation3_text = $this->options->Navigation3Cont;
                            if ($Navigation3_text) {
                                $Navigation3Cont_arr = explode("\r\n", $Navigation3_text);
                                if (count($Navigation3Cont_arr) > 0) {
                                    for ($i = 0; $i < count($Navigation3Cont_arr); $i++) {
                                        $name = explode("||", $Navigation3Cont_arr[$i])[0];
                                        $url = explode("||", $Navigation3Cont_arr[$i])[1];
                                        $img = explode("||", $Navigation3Cont_arr[$i])[2];
                                        $desc = explode("||", $Navigation3Cont_arr[$i])[3];
                                        $Navigation3ContArr[] = array("name" => trim($name), "url" => trim($url), "img" => trim($img), "desc" => trim($desc));
                                    };
                                }
                            }
                            ?>
                            <?php if (sizeof($Navigation1ContArr) > 0 && !empty($this->options->Navigation1Name)) : ?>
                                <div class="box">
                                    <div class="sub-category">
                                        <div><i class="iconfont icon-shequ"></i><?php $this->options->Navigation1Name(); ?></div>
                                    </div>
                                    <?php foreach ($Navigation1ContArr as $item) : ?>
                                        <div>
                                            <a target="_blank" href="<?php echo $item['url']; ?>">
                                                <div class="item">
                                                    <div class="logo"><img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>"> <?php echo $item['name']; ?></div>
                                                    <div class="desc"><?php echo $item['desc']; ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            

                            <?php if (sizeof($Navigation2ContArr) > 0 && !empty($this->options->Navigation2Name)) : ?>
                                <div class="box">
                                    <div class="sub-category">
                                        <div><i class="iconfont icon-shequ"></i><?php $this->options->Navigation2Name(); ?></div>
                                    </div>
                                    <?php foreach ($Navigation2ContArr as $item) : ?>
                                        <div>
                                            <a target="_blank" href="<?php echo $item['url']; ?>">
                                                <div class="item">
                                                    <div class="logo"><img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>"> <?php echo $item['name']; ?></div>
                                                    <div class="desc"><?php echo $item['desc']; ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>


                            <?php if (sizeof($Navigation3ContArr) > 0 && !empty($this->options->Navigation3Name)) : ?>
                                <div class="box">
                                    <div class="sub-category">
                                        <div><i class="iconfont icon-shequ"></i><?php $this->options->Navigation3Name(); ?></div>
                                    </div>
                                    <?php foreach ($Navigation3ContArr as $item) : ?>
                                        <div>
                                            <a target="_blank" href="<?php echo $item['url']; ?>">
                                                <div class="item">
                                                    <div class="logo"><img src="<?php echo $item['img']; ?>" alt="<?php echo $item['name']; ?>"> <?php echo $item['name']; ?></div>
                                                    <div class="desc"><?php echo $item['desc']; ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php $this->need('public/article.php'); ?>
                            <?php $this->need('public/handle.php'); ?>
                            <?php $this->need('public/copyright.php'); ?>
                        </div>
                    </div>
                </section>
                <?php $this->need('public/comment.php'); ?>
            </div>
            <?php $this->need('public/aside.php'); ?>
        </div>
        <?php $this->need('public/footer.php'); ?>
    </div>
</body>

</html>