<div class="joe_detail__agree">
    <div class="agree">
        <div class="icon">
            <svg class="icon-1" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="28" height="28">
                <path d="M736 128c-65.952 0-128.576 25.024-176.384 70.464-4.576 4.32-28.672 28.736-47.328 47.68L464.96 199.04C417.12 153.216 354.272 128 288 128 146.848 128 32 242.848 32 384c0 82.432 41.184 144.288 76.48 182.496l316.896 320.128C450.464 911.68 478.304 928 512 928s61.568-16.32 86.752-41.504l316.736-320 2.208-2.464C955.904 516.384 992 471.392 992 384c0-141.152-114.848-256-256-256z" fill="#fff" />
            </svg>
            <svg class="icon-2" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="28" height="28">
                <path d="M512 928c-28.928 0-57.92-12.672-86.624-41.376L106.272 564C68.064 516.352 32 471.328 32 384c0-141.152 114.848-256 256-256 53.088 0 104 16.096 147.296 46.592 14.432 10.176 17.92 30.144 7.712 44.608-10.176 14.432-30.08 17.92-44.608 7.712C366.016 204.064 327.808 192 288 192c-105.888 0-192 86.112-192 192 0 61.408 20.288 90.112 59.168 138.688l315.584 318.816C486.72 857.472 499.616 863.808 512 864c12.704.192 24.928-6.176 41.376-22.624l316.672-319.904C896.064 493.28 928 445.696 928 384c0-105.888-86.112-192-192-192-48.064 0-94.08 17.856-129.536 50.272l-134.08 134.112c-12.512 12.512-32.736 12.512-45.248 0s-12.512-32.736 0-45.248L562.24 196c48.32-44.192 109.664-68 173.76-68 141.152 0 256 114.848 256 256 0 82.368-41.152 144.288-75.68 181.696l-317.568 320.8C569.952 915.328 540.96 928 512 928z" fill="#fff" />
            </svg>
        </div>
        <span class="text"><?php _getAgree($this) ?></span>
    </div>

    <script language="javascript" type="text/javascript">
    	function zfb(){
            var obj=document.getElementById("ewm");
    	    obj.src=`<?php $this->options->ZNAlipay() ?>`;
    	};
    	function wx(){
            var obj=document.getElementById("ewm");
    	    obj.src=`<?php $this->options->ZNWeChat() ?>`;
    	};
    	function qq(){
            var obj=document.getElementById("ewm");
    	    obj.src=`<?php $this->options->ZNQqPay() ?>`;
    	};
	
	</script> 
	<?php 
        $ZhinianSite = Helper::options()->ZhinianSite;
        if(empty($ZhinianSite)) {
            $ZhinianSite = 'zhinianboke.com';
        }
    ?>
    <?php if (Helper::options()->ZNPaySet === 'on') : ?>
        <div style="text-align: center; margin-left:30px;">
            <div class="footer_flex">
                <img src="https://img.<?php echo $ZhinianSite; ?>/img/2500" width="20px" height="20px">
                <div class="flex-footer">
                <img id="ewm" src="<?php $this->options->ZNAlipay() ?>" width="120px" height="120px">
                <div style="margin-top:5px;">
        		<label><input name="pay" type="radio" value="wx" checked="checked" onclick="wx()">微信</label>
        		<label style="margin-left:3px; display:block-inline"><input name="pay" type="radio" value="zfb" onclick="zfb()" checked>支付宝</label>
        		<label style="margin-left:3px;"><input name="pay" type="radio" value="qq" onclick="qq()">QQ</label>
        		</div>
        		<div style="height:40px; background:rgba(0,0,0,0);"></div>
                </div>
            </div>
            <p style="margin-top:5px; color:#909399; font-size:12px">打赏</p>
        </div>
    <?php endif; ?>
    
    <div style="<?php if(Helper::options()->Haibao !== 'on') echo 'display:none;' ?>">
        <div class="article-poster-button" style="text-align: center; margin-left:30px;">
            <div class="haibao">
                <svg t="1623158793415" class="icon-haibao" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2237" width="100%" height="100%"><path d="M512 0C230.4 0 0 230.4 0 512s230.4 512 512 512 512-230.4 512-512-230.4-512-512-512zM403.2 704L256 851.2c-12.8 12.8-32 12.8-44.8 0s-12.8-32 0-44.8l147.2-147.2c12.8-12.8 32-12.8 44.8 0s12.8 32 0 44.8z m460.8-44.8h-192c-12.8 19.2-76.8 102.4-115.2 153.6-19.2 25.6-51.2 25.6-70.4-12.8-25.6-70.4-64-172.8-64-172.8S307.2 576 236.8 544c-25.6-12.8-32-44.8 0-64C294.4 435.2 384 364.8 384 364.8s6.4-128 6.4-204.8c0-44.8 12.8-51.2 19.2-51.2 6.4 0 19.2 0 44.8 19.2 64 44.8 166.4 115.2 166.4 115.2s108.8-32 172.8-51.2c32-12.8 57.6 12.8 51.2 38.4l-51.2 204.8s64 89.6 102.4 153.6c19.2 38.4 6.4 70.4-32 70.4z" fill="#FF9256" p-id="2238"></path></svg>
            </div>
            <p style="margin-top:5px; color:#909399; font-size:12px">海报</p>
        </div>
        <div class="haibao-shade">
            <div class="ball-spin-fade-loader_title">正在生成.....</div>
            <div class="ball-spin-fade-loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div data-id="<?php echo $this->cid ?>" class="article-poster action action-poster" style="display:none;">
            <div class="poster-popover-mask" data-event="poster-close">
            </div>
            <div class="poster-popover-box">
                <a class="poster-download" data-event="poster-download" data-url="">下载海报</a>
                <img class="article-poster-images"/>
            </div>
        </div>
    </div>
</div>
