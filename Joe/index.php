<?php

/**
 * “ 心中无女人，代码自然神 - 78.AL ” <br /> “ 环境要求：PHP 5.4 ~ 7.4 ”
 * @package Joe
 * @author Joe
 * @link https://78.al
 */

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
	<link rel="stylesheet" href=<?php echo $JsdelivrPath ?>/npm/swiper@5.4.5/css/swiper.min.css />
	<script src=<?php echo $JsdelivrPath ?>/npm/swiper@5.4.5/js/swiper.min.js></script>
	<script src=<?php echo $JsdelivrPath ?>/npm/wowjs@1.1.3/dist/wow.min.js></script>
	<link rel="stylesheet" href="<?php _CdnUrl4Themes('assets/css/joe.index.min.css'); ?>">
	<script>
        document.addEventListener('DOMContentLoaded', () => {
            window.Joe.PAGE_INDEX = '<?php echo $this->_currentPage; ?>' || 1;
        });
    </script>
	<script src="<?php _CdnUrl4Themes('assets/js/joe.index.js?v=7.3.7'); ?>"></script>
</head>

<body>
	<div id="Joe">
		<?php $this->need('public/header.php'); ?>
		<?php if (!empty($this->options->IndexBigImg)) : ?>
    		<div class="HeaderImg" style="background: url(<?php echo $this->options->IndexBigImg ?>) center; background-size:cover;">
                <div class="infomation">
                    <div class="title"><?php $this->options->title(); ?></div>
                    <div class="desctitle">
                        <span class="motto joe_motto"</span>
                    </div>
                </div>
                <section class="HeaderImg_bottom">
                    <svg class="waves-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                        <defs>
                            <path id="gentle-wave" d="M -160 44 c 30 0 58 -18 88 -18 s 58 18 88 18 s 58 -18 88 -18 s 58 18 88 18 v 44 h -352 Z"></path>
                        </defs>
                        <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0"></use>
                            <use xlink:href="#gentle-wave" x="48" y="3"></use>
                            <use xlink:href="#gentle-wave" x="48" y="5"></use>
                            <use xlink:href="#gentle-wave" x="48" y="7"></use>
                        </g>
                    </svg>
                </section>
            </div>
        <?php endif; ?>
		<div class="joe_container">
			<div class="joe_main">
				<div class="joe_index">
					<?php
					$carousel = [];
					$carousel_text = $this->options->JIndex_Carousel;
					if ($carousel_text) {
						$carousel_arr = explode("\r\n", $carousel_text);
						if (count($carousel_arr) > 0) {
							for ($i = 0; $i < count($carousel_arr); $i++) {
								$img = explode("||", $carousel_arr[$i])[0];
								$url = explode("||", $carousel_arr[$i])[1];
								$title = explode("||", $carousel_arr[$i])[2];
								$carousel[] = array("img" => trim($img), "url" => trim($url), "title" => trim($title));
							};
						}
					}
					$recommend = [];
					$recommend_text = $this->options->JIndex_Recommend;
					if ($recommend_text) {
						$recommend_arr = explode("||", $recommend_text);
						if (count($recommend_arr) === 2) $recommend = $recommend_arr;
					}
					?>
					<?php if (sizeof($carousel) > 0 || sizeof($recommend) === 2) : ?>
						<div class="joe_index__banner">
							<?php if (sizeof($carousel) > 0) : ?>
								<div class="swiper-container">
									<div class="swiper-wrapper">
										<?php foreach ($carousel as $item) : ?>
											<div class="swiper-slide">
												<a class="item" href="<?php echo $item['url'] ?>" target="_blank" rel="noopener noreferrer nofollow">
													<img width="100%" height="100%" class="thumbnail lazyload" src="<?php _getLazyload() ?>" data-src="<?php echo $item['img'] ?>" alt="<?php echo $item['title'] ?>" />
													<div class="title"><?php echo $item['title'] ?></div>
													<svg class="icon" viewBox="0 0 1026 1024" xmlns="http://www.w3.org/2000/svg" width="18" height="18">
														<path d="M784.3 1007.961a33.2 33.2 0 0 1-27.106-9.062L540.669 854.55 431.766 962.813c-9.062 9.062-36.168 18.044-45.23 9.062a49.72 49.72 0 0 1-27.106-45.23V727.763a33.2 33.2 0 0 1 9.463-27.106l343.071-370.578a44.748 44.748 0 0 1 63.274 63.274l-334.17 361.515v72.175l63.273-54.211a42.583 42.583 0 0 1 54.212-9.062l198.64 126.386L910.847 140.34 151.647 510.837 323.343 619.34c18.044 9.062 27.106 45.23 9.062 63.273-9.062 18.044-45.23 27.106-63.273 18.044L34.082 547.005c-8.981-8.982-18.043-17.723-18.043-36.168s9.062-27.105 27.105-36.167l903.79-451.815c18.043-9.062 36.167-9.062 45.229 0 18.284 9.223 18.284 27.106 18.284 45.15L829.69 971.794c0 18.043-9.062 27.105-27.105 36.167z" />
													</svg>
												</a>
											</div>
										<?php endforeach; ?>
									</div>
									<div class="swiper-pagination"></div>
									<div class="swiper-button-next"></div>
									<div class="swiper-button-prev"></div>
								</div>
							<?php endif; ?>
							<?php if (sizeof($recommend) === 2) : ?>
								<div class="joe_index__banner-recommend <?php echo sizeof($carousel) === 0 ? 'noswiper' : '' ?>">
									<?php foreach ($recommend as $cid) : ?>
										<?php $this->widget('Widget_Contents_Post@' . $cid, 'cid=' . $cid)->to($item); ?>
										<figure class="item">
											<a class="thumbnail" href="<?php $item->permalink() ?>" title="<?php $item->title() ?>">
												<img width="100%" height="100%" class="lazyload" src="<?php _getLazyload(); ?>" data-src="<?php echo _getThumbnails($item)[0]; ?>" alt="<?php $item->title() ?>" />
											</a>
											<figcaption class="information">
												<span class="type">推荐</span>
												<div class="text"><?php $item->title() ?></div>
											</figcaption>
										</figure>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php if ($this->options->JIndex_Hot === "on") : ?>
						<?php $this->widget('Widget_Contents_Hot@Index', 'pageSize=4')->to($item); ?>
						<div class="joe_index__hot">
							<ul class="joe_index__hot-list">
								<?php while ($item->next()) : ?>
									<li class="item">
										<a class="link" href="<?php $item->permalink(); ?>" title="<?php $item->title(); ?>">
											<figure class="inner">
												<span class="views"><?php echo number_format($item->views); ?> ℃</span>
												<img width="100%" height="120" class="image lazyload" src="<?php _getLazyload(); ?>" data-src="<?php echo _getThumbnails($item)[0]; ?>" alt="<?php $item->title(); ?>" />
												<figcaption class="title"><?php $item->title(); ?></figcaption>
											</figure>
										</a>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
					<?php
    					$JIndex_Ad = [];
    					$JTop_Ad = [];
    					$JIndex_Ad_text = $this->options->JIndex_Ad;
                        if ($JIndex_Ad_text) {
                            $JIndex_Ad_arr = explode("\r\n", $JIndex_Ad_text);
                            if (count($JIndex_Ad_arr) > 0) {
                                for ($i = 0; $i < count($JIndex_Ad_arr); $i++) {
                                    $adImg = explode("||", $JIndex_Ad_arr[$i])[0];
                                    $adUrl = explode("||", $JIndex_Ad_arr[$i])[1];
                                    $adMdate = explode("||", $JIndex_Ad_arr[$i])[2];
                                    $top = explode("||", $JIndex_Ad_arr[$i])[3];
                                    if(!empty(trim($adMdate))) {
                                        $nowDate = date("Y-m-d");
                                        if(trim($adMdate) >= $nowDate) {
                                            $JIndex_Ad[] = array("adUrl" => trim($adUrl), "adImg" => trim($adImg), "adMdate" => trim($adMdate), "top" => trim($top));
                                            if(!empty(trim($top))) {
                                                $JTop_Ad[] = array("adUrl" => trim($adUrl), "adImg" => trim($adImg), "adMdate" => trim($adMdate), "top" => trim($top));
                                            }
                                        }
                                    }
                                    else {
                                        $JIndex_Ad[] = array("adUrl" => trim($adUrl), "adImg" => trim($adImg));
                                    }
                                };
                            }
                            shuffle($JIndex_Ad);
                        }
					?>
					<?php if ($this->options->IndexAdStyle === "01" or empty($this->options->IndexAdStyle)) : ?>
					    <?php if (sizeof($JTop_Ad) > 0) : ?>
    					    <?php foreach ($JTop_Ad as $item) : ?>
        				        <div class="joe_index__ad" style="margin-top: -10px;">
        							<a class="joe_index__ad-link" href="<?php echo $item['adUrl'] ?>" target="_blank" rel="noopener noreferrer nofollow">
        								<img width="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php echo $item['adImg'] ?>" alt="<?php echo $item['adUrl'] ?>" />
        								<span class="icon">广告 <i><?php echo $item['adMdate'] ?></i></span>
        							</a>
        						</div>
        				     <?php endforeach; ?>
    					<?php endif; ?>
					    <?php if (sizeof($JIndex_Ad) > 0) : ?>
    					    <?php foreach ($JIndex_Ad as $item) : ?>
					            <?php if (empty($item['top'])) : ?>
            				        <div class="joe_index__ad" style="margin-top: -10px;">
            							<a class="joe_index__ad-link" href="<?php echo $item['adUrl'] ?>" target="_blank" rel="noopener noreferrer nofollow">
            								<img width="100%" class="lazyload" src="<?php _getLazyload() ?>" data-src="<?php echo $item['adImg'] ?>" alt="<?php echo $item['adUrl'] ?>" />
            								<span class="icon">广告 <i><?php echo $item['adMdate'] ?></i></span>
            							</a>
            						</div>
					            <?php endif; ?>
        				     <?php endforeach; ?>
    					<?php endif; ?>
					<?php endif; ?>
					<?php if ($this->options->IndexAdStyle === "02") : ?>
					    <?php if (sizeof($JIndex_Ad) > 0) : ?>
    						<div class="swiper-container">
    							<div class="swiper-wrapper">
    								<?php foreach ($JIndex_Ad as $item) : ?>
    									<div class="swiper-slide">
    										<a class="item" href="<?php echo $item['adUrl'] ?>" target="_blank" rel="noopener noreferrer nofollow">
    											<img width="100%" class="thumbnail lazyload" src="<?php _getLazyload() ?>" data-src="<?php echo $item['adImg'] ?>" />
    											<div class="title">广告</div>
    											<svg class="icon" viewBox="0 0 1026 1024" xmlns="http://www.w3.org/2000/svg" width="18" height="18">
    												<path d="M784.3 1007.961a33.2 33.2 0 0 1-27.106-9.062L540.669 854.55 431.766 962.813c-9.062 9.062-36.168 18.044-45.23 9.062a49.72 49.72 0 0 1-27.106-45.23V727.763a33.2 33.2 0 0 1 9.463-27.106l343.071-370.578a44.748 44.748 0 0 1 63.274 63.274l-334.17 361.515v72.175l63.273-54.211a42.583 42.583 0 0 1 54.212-9.062l198.64 126.386L910.847 140.34 151.647 510.837 323.343 619.34c18.044 9.062 27.106 45.23 9.062 63.273-9.062 18.044-45.23 27.106-63.273 18.044L34.082 547.005c-8.981-8.982-18.043-17.723-18.043-36.168s9.062-27.105 27.105-36.167l903.79-451.815c18.043-9.062 36.167-9.062 45.229 0 18.284 9.223 18.284 27.106 18.284 45.15L829.69 971.794c0 18.043-9.062 27.105-27.105 36.167z" />
    											</svg>
    										</a>
    									</div>
    								<?php endforeach; ?>
    							</div>
    							<div class="swiper-pagination"></div>
    							<div class="swiper-button-next"></div>
    							<div class="swiper-button-prev"></div>
    						</div>
    					<?php endif; ?>
					<?php endif; ?>
					
					<div class="joe_index__title">
						<ul class="joe_index__title-title">
							<li class="item" data-type="created">最新文章</li>
							<li class="item" data-type="views">热门文章</li>
							<li class="item" data-type="commentsNum">评论最多</li>
							<li class="item" data-type="agree">点赞最多</li>
							<li class="line"></li>
						</ul>
						<?php
						$index_notice_text = $this->options->JIndex_Notice;
						$index_notice = null;
						if ($index_notice_text) {
							$index_notice_arr = explode("||", $index_notice_text);
							if (count($index_notice_arr) === 2) $index_notice = array("text" => trim($index_notice_arr[0]), "url" => trim($index_notice_arr[1]));
						}
						?>
						<?php if ($index_notice) : ?>
							<div class="joe_index__title-notice">
								<svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
									<path d="M656.261 347.208a188.652 188.652 0 1 0 0 324.05v-324.05z" fill="#F4CA1C" />
									<path d="M668.35 118.881a73.35 73.35 0 0 0-71.169-4.06l-310.01 148.68a4.608 4.608 0 0 1-2.013.46h-155.11a73.728 73.728 0 0 0-73.728 73.636v349.64a73.728 73.728 0 0 0 73.728 73.636h156.554a4.68 4.68 0 0 1 1.94.43l309.592 143.196a73.702 73.702 0 0 0 104.668-66.82V181.206a73.216 73.216 0 0 0-34.453-62.326zM125.403 687.237v-349.64a4.608 4.608 0 0 1 4.608-4.608h122.035v358.882H130.048a4.608 4.608 0 0 1-4.644-4.634zm508.319 150.441a4.608 4.608 0 0 1-6.564 4.193L321.132 700.32V323.773l305.97-146.723a4.608 4.608 0 0 1 6.62 4.157v656.471zM938.26 478.72H788.01a34.509 34.509 0 1 0 0 69.018H938.26a34.509 34.509 0 1 0 0-69.018zM810.01 360.96a34.447 34.447 0 0 0 24.417-10.102l106.245-106.122a34.524 34.524 0 0 0-48.84-48.809L785.587 302.08a34.509 34.509 0 0 0 24.423 58.88zm24.417 314.609a34.524 34.524 0 1 0-48.84 48.814L891.832 830.52a34.524 34.524 0 0 0 48.84-48.809z" fill="#595BB3" />
								</svg>
								<a href="<?php echo $index_notice['url'] ?>" target="_blank" rel="noopener noreferrer nofollow"><?php echo $index_notice['text'] ?></a>
							</div>
						<?php endif; ?>
					</div>
					<div class="joe_index__list" data-wow="<?php $this->options->JList_Animate() ?>">
						<ul class="joe_list"></ul>
						<ul class="joe_list__loading">
							<li class="item">
								<div class="thumbnail"></div>
								<div class="information">
									<div class="title"></div>
									<div class="abstract">
										<p></p>
										<p></p>
									</div>
								</div>
							</li>
							<li class="item">
								<div class="thumbnail"></div>
								<div class="information">
									<div class="title"></div>
									<div class="abstract">
										<p></p>
										<p></p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<?php $this->need('public/pagination.php'); ?>
				<!--<div class="joe_load">查看更多</div>-->
			</div>
			<?php $this->need('public/aside.php'); ?>
		</div>
		<?php $this->need('public/footer.php'); ?>
		
		<?php
            if ($this->options->Greetingpop == 'on') {
        ?>
        <div id="fps" style="z-index:5;position:fixed;bottom:-115px;left:3px;color:#2196F3;font-size:10px;-webkit-pointer-events: none; -moz-pointer-events: none; -ms-pointer-events: none; -o-pointer-events: none;"></div>
        <script src="<?php _CdnUrl4Themes('assets/js/fetch.min.js'); ?>"></script>
        <script src="https://cdn.gmit.vip/layer/3.1.1/layer.js" type="text/javascript" charset="utf-8"></script> 
        <script> 
            $(function(){ if(/*getCookie('msg') !=*/ 1){ var t = document.createElement("a"); t.href = document.referrer; var msgTitle = t.hostname; var name = t.hostname.split(".")[1]; if("" !== document.referrer){ switch (name) { case 'bing': msgTitle = '必应搜索'; break; case 'baidu': msgTitle = '百度搜索'; break; case 'so': msgTitle = '360搜索'; break; case 'google': msgTitle = '谷歌搜索'; break; case 'sm': msgTitle = '神马搜索'; break; case 'sogou': msgTitle = '搜狗搜索'; break; default: msgTitle = t.hostname; }; }; var time = (new Date).getHours(); var msg = ''; 23 < time || time <= 5 ? msg = "你是夜猫子呀？这么晚还不睡觉，明天起的来嘛？": 5< time && time <= 7 ? msg = "早上好！一日之计在于晨，美好的一天就要开始了！": 7< time && time <= 11 ? msg = "上午好！工作顺利嘛，不要久坐，多起来走动走动哦！": 11< time && time <= 14 ? msg = "中午了，工作了一个上午，现在是午餐时间！": 14< time && time <= 17 ? msg = "午后很容易犯困呢，今天的运动目标完成了吗？": 17< time && time <= 19 ? msg = "傍晚了！窗外夕阳的景色很美丽呢，最美不过夕阳红~": 19< time && time <= 21 ? msg = "晚上好，今天过得怎么样？": 21< time && time <= 23 && (msg = "已经这么晚了呀，早点休息吧，晚安~"); $.ajax({ type:"get", url:"https://api.gmit.vip/Api/UserInfo/", async:true, success:function(data){ window.info = data; layer.msg("Hi~ 来自"+ data.data.location + '~<br/>通过 '+msgTitle+' 进来的小伙伴！<br/>使用 '+ data.data.os +"&nbsp"+ data.data.browser +' 访问本站！' + '<br/>' + msg); var showFPS = (function(){ var requestAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) { window.setTimeout(callback, 1000/60); }; var e,pe,pid,fps,last,offset,step,appendFps; fps = 0; last = Date.now(); step = function(){ offset = Date.now() - last; fps += 1; if( offset >= 1000 ){ last += offset; appendFps(fps); fps = 0; }; requestAnimationFrame( step ); }; appendFps = function(fps){ var settings = { timeout: 5000, logError: true }; $('#fps').html('<span style="float:left;margin-top:-120px;">'+fps+'FPS</span><br/><span style="float:left;margin-top:-120px;">'+window.info.data.os+'</span><br/><span style="float:left;margin-top:-120px;">'+window.info.data.browser+'</span><br/><span style="float:left;margin-top:-120px;">'+window.info.data.location+'</span><br/><span style="float:left;margin-top:-120px;"></span>'); }; step(); })(); } }); }; }); 
            </script> 
        <?php
            }
        ?>
	</div>
</body>

</html>