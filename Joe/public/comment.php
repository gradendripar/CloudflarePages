<?php 
    $groupUserInfo = get_object_vars($this->user) ['row']['group'];
    $db = Typecho_Db::get();
    $CommentCoid = @$_POST["coid"];
    $db->query($db->update('table.comments')->rows(array('status' => @$_POST["type"]))->where('coid = ?', $CommentCoid));
?>
<?php $this->comments()->to($comments); ?>
<?php if ($this->options->dzj === 'on') : ?>
    <script src="<?php _CdnUrl4Themes('assets/js/joe.dzk.js'); ?>"></script>
<?php endif; ?>
<div class="joe_comment">
    <h3 class="joe_comment__title">评论 <?php if ($this->allow('comment') && $this->options->JCommentStatus !== "off") : ?>(<?php $this->commentsNum(); ?>)<?php endif; ?></h3>

    <?php if ($this->hidden) : ?>
        <div class="joe_comment__close">
            <svg class="joe_comment__close-icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="18" height="18">
                <path d="M512.307.973c282.317 0 511.181 201.267 511.181 449.587a402.842 402.842 0 0 1-39.27 173.26 232.448 232.448 0 0 0-52.634-45.977c16.384-39.782 25.293-82.688 25.293-127.283 0-211.098-199.117-382.157-444.621-382.157-245.555 0-444.57 171.06-444.57 382.157 0 133.427 79.514 250.88 200.039 319.18v107.982l102.041-65.127a510.157 510.157 0 0 0 142.49 20.122l19.405-.359c19.405-.716 38.758-2.508 57.958-5.427l3.584 13.415a230.607 230.607 0 0 0 22.323 50.688l-20.633 3.328a581.478 581.478 0 0 1-227.123-12.288L236.646 982.426c-19.66 15.001-35.635 7.168-35.635-17.664v-157.39C79.411 725.198 1.024 595.969 1.024 450.56 1.024 202.24 229.939.973 512.307.973zm318.464 617.011c97.485 0 176.794 80.435 176.794 179.2S928.256 976.23 830.77 976.23c-97.433 0-176.742-80.281-176.742-179.046 0-98.816 79.309-179.149 176.742-179.149zM727.757 719.002a131.174 131.174 0 0 0-25.754 78.182c0 71.885 57.805 130.406 128.768 130.406 28.877 0 55.552-9.625 77.056-26.01zm103.014-52.327c-19.712 0-39.117 4.557-56.678 13.312L946.33 854.58c8.499-17.305 13.158-36.864 13.158-57.395 0-71.987-57.805-130.509-128.717-130.509zM512.307 383.13l6.861.358a67.072 67.072 0 0 1 59.853 67.072l-.307 6.86a67.072 67.072 0 0 1-66.407 60.57l-6.81-.358a67.072 67.072 0 0 1-59.852-67.072 67.072 67.072 0 0 1 66.662-67.43zm266.752 0l6.861.358a67.072 67.072 0 0 1 59.853 67.072l-.307 6.86a67.072 67.072 0 0 1-66.407 60.57l-6.81-.358a67.072 67.072 0 0 1-59.852-67.072h-.051l.307-6.86a67.072 67.072 0 0 1 66.406-60.57zm-533.504 0l6.861.358a67.072 67.072 0 0 1 59.853 67.072l-.307 6.86a67.072 67.072 0 0 1-66.407 60.57l-6.81-.358a67.072 67.072 0 0 1-59.852-67.072 67.072 67.072 0 0 1 66.662-67.43z" />
            </svg>
            <span>当前文章受密码保护，无法评论</span>
        </div>
    <?php else : ?>
        <?php if ($this->allow('comment') && $this->options->JCommentStatus !== "off") : ?>
            <div id="<?php $this->respondId(); ?>" class="joe_comment__respond">
                <div class="joe_comment__respond-type">
                    <button class="item" data-type="draw">画图模式</button>
                    <button class="item active" data-type="text">文本模式</button>
                </div>
                <form method="post" class="joe_comment__respond-form" action="<?php $this->commentUrl() ?>" data-type="text">
                    <div class="head">
                        <div class="list">
                            <input type="text" id="commont_author" value="<?php $this->user->hasLogin() ? $this->user->screenName() : $this->remember('author') ?>" autocomplete="off" name="author" maxlength="16" placeholder="请输入昵称..." />
                        </div>
                        <div class="list">
                            <input type="text" id="commont_mail" value="<?php $this->user->hasLogin() ? $this->user->mail() : $this->remember('mail') ?>" autocomplete="off" name="mail" placeholder="请输入邮箱..." />
                        </div>
                        <div class="list">
                            <input type="text" value="<?php $this->user->hasLogin() ? $this->user->url() : $this->remember('url') ?>" autocomplete="off" name="url" placeholder="请输入网址（非必填）..." />
                        </div>
                    </div>
                    <div class="body">
                        <?php if ($this->options->CommentImg !== "off") : ?>
                            <div class="imgUpload">
                                <input type="file" title="上传图片" id="imgUpload_btn_file" hidden>
                                <input type="hidden" name="text" id="imgUpload_btn_text">
                                <div class="imgUpload-file">
                                    <div height="24" class="imgUpload_btn">
                                        <span id="imgUpload_btn_upload">
                                            <svg t="1629804953737" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2082" width="24" height="24"><path d="M740.693333 750.933333h-102.4c-20.48 0-34.133333-13.653333-34.133333-34.133333s13.653333-34.133333 34.133333-34.133333h102.4c58.026667 0 102.4-44.373333 102.4-102.4 0-47.786667-34.133333-88.746667-78.506666-98.986667-17.066667-3.413333-27.306667-20.48-27.306667-37.546667 3.413333-13.653333 3.413333-23.893333 3.413333-34.133333 0-112.64-92.16-204.8-204.8-204.8-88.746667 0-170.666667 61.44-197.973333 146.773333 0 13.653333-13.653333 23.893333-27.306667 23.893334-81.92 3.413333-146.773333 71.68-146.773333 153.6 0 85.333333 68.266667 153.6 153.6 153.6h51.2c20.48 0 34.133333 13.653333 34.133333 34.133333s-13.653333 34.133333-34.133333 34.133333H314.026667c-122.88 0-221.866667-98.986667-221.866667-221.866666 0-112.64 81.92-204.8 191.146667-218.453334 40.96-102.4 143.36-174.08 252.586666-174.08 150.186667 0 273.066667 122.88 273.066667 273.066667v13.653333c61.44 27.306667 102.4 88.746667 102.4 157.013334 0 95.573333-75.093333 170.666667-170.666667 170.666666z m-204.8 102.4V477.866667c0-13.653333-6.826667-23.893333-20.48-30.72-10.24-6.826667-23.893333-3.413333-34.133333 3.413333l-136.533333 102.4c-13.653333 10.24-17.066667 34.133333-6.826667 47.786667 10.24 13.653333 34.133333 17.066667 47.786667 6.826666l81.92-61.44v307.2c0 20.48 13.653333 34.133333 34.133333 34.133334s34.133333-13.653333 34.133333-34.133334z m129.706667-252.586666c10.24-13.653333 6.826667-37.546667-6.826667-47.786667l-34.133333-27.306667c-13.653333-10.24-37.546667-6.826667-47.786667 6.826667-10.24 13.653333-6.826667 37.546667 6.826667 47.786667l34.133333 27.306666c6.826667 3.413333 13.653333 6.826667 20.48 6.826667 10.24 0 20.48-3.413333 27.306667-13.653333z" fill="#3E2AD1" p-id="2083"></path></svg>
                                        </span>
                                        <span id="imgUpload_btn_clear">
                                            <svg t="1629805039741" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3008" width="24" height="24"><path d="M897.23 333.08H657.88V122.51c0-19.76-16.08-35.84-35.84-35.84H451.77c-19.76 0-35.84 16.08-35.84 35.84v210.57H176.58c-19.76 0-35.84 16.08-35.84 35.84v109.17c0 19.76 16.08 35.84 35.84 35.84h23.23v337.9c0 19.76 16.08 35.84 35.84 35.84h602.51c19.76 0 35.84-16.08 35.84-35.84v-337.9h23.23c19.76 0 35.84-16.08 35.84-35.84V368.92c0-19.76-16.08-35.84-35.84-35.84z m-700.49 56h247.19c15.46 0 28-12.54 28-28V142.67h129.95v218.41c0 15.46 12.54 28 28 28h247.19v68.85H196.74v-68.85z m491.43 442.59V705.28c0-15.46-12.54-28-28-28s-28 12.54-28 28v126.39h-67.26V705.28c0-15.46-12.54-28-28-28s-28 12.54-28 28v126.39h-67.26V705.28c0-15.46-12.54-28-28-28s-28 12.54-28 28v126.39H255.81V513.93H818v317.74H688.17z" fill="#31D0C8" p-id="3009"></path></svg>
                                        </span>
                                    </div>
                                    <div height="260">
                                        <img style="display: none;width: 100%" id="imgUpload_img" src="">
                                    </div>
                                </div>
                                <textarea class="text joe_owo__target" name="text" value="" autocomplete="new-password" placeholder="说点什么吧，点击右上方切换成画图或者点击上传图片试试？"></textarea>
                            </div>
                        <?php else : ?>
                        	<div class="imgUpload">
                                <textarea class="text joe_owo__target" name="text" value="" autocomplete="new-password" placeholder="说点什么吧，点击右上方切换成画图或者点击上传图片试试？"></textarea>
                            </div>
                        <?php endif; ?>
                        <div class="draw" style="display: none;">
                            <ul class="line">
                                <li data-line="3">细</li>
                                <li data-line="5" class="active">中</li>
                                <li data-line="8">粗</li>
                            </ul>
                            <ul class="color">
                                <li data-color="#303133" class="active"></li>
                                <li data-color="#67c23a"></li>
                                <li data-color="#e6a23c"></li>
                                <li data-color="#f56c6c"></li>
                            </ul>
                            <svg class="icon icon-undo" viewBox="0 0 1365 1024" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                <path d="M754.133 337.333c-16.4-2.266-32.933-3.6-49.6-3.6h-7.066V161.867c0-40.4-14.667-65.734-36.667-70.134-1.467-.4-3.067 0-4.667-.133-2.8-.267-5.466-.667-8.533-.133-10.133 1.466-21.2 6.533-33.067 16L192 447.467c-3.067 2.4-4.8 5.466-7.467 8-3.2 3.2-6.4 6.4-9.066 9.866-2.4 3.334-4.534 6.534-6.534 9.867-2.666 4.667-4.666 9.467-6.4 14.4-.8 2.267-1.866 4.4-2.4 6.667-.8 3.333-.933 6.666-1.333 9.866-.133 1.334-.4 2.534-.4 3.867-.267 3.067-.133 6 0 9.067.133 1.733.4 3.333.667 4.933.4 2.8.4 5.733 1.066 8.533.8 3.867 2.667 7.334 4.134 11.067 1.066 2.8 2.266 5.733 3.733 8.533 2.533 4.8 5.467 9.467 9.2 14l.133.134c4.4 5.466 8.667 11.066 14.667 15.866l419.467 336.534c45.466 36.4 85.466-.534 85.466-54.667V680.4h63.6c22 0 43.467 1.333 64.134 3.6 9.466 1.067 18.533 3.2 27.866 4.667 11.067 1.866 22.4 3.333 33.2 5.866 8.667 2 16.8 4.934 25.2 7.467 11.067 3.333 22.134 6.267 32.8 10.4 7.2 2.667 14 6.267 21.067 9.333 11.333 5.067 22.8 10 33.6 16 5.467 3.067 10.533 6.8 15.867 10 11.866 7.334 23.6 14.667 34.533 23.067 3.6 2.8 6.933 6.133 10.533 9.067 12.134 10 24.134 20.266 35.334 31.733 1.2 1.2 2.266 2.667 3.466 4 26.667 28.133 50.667 60.4 71.334 97.2 8.533 14 17.2 19.333 23.733 18.4 6.667-.533 11.333-7.333 11.333-18.4-3.333-255.733-206.4-540.933-450.4-575.467zm6.4 276.267h-130.4v249.067c-6-2.4-12.266-5.734-18.533-10.8L232.8 548c-10-21.333-10.133-44.933-.4-66.267l382.133-307.466c5.2-4.267 10.4-7.467 15.467-10v236.8l66.933-.534h7.6c99.867 0 194.4 43.867 274.134 112.534 62.8 73.733 123.2 161.466 149.066 254.133-85.733-102-217.866-153.6-367.2-153.6zm0 0" />
                            </svg>
                            <svg class="icon icon-animate" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                <path d="M954.9 228.4H619.1c-4.5 0-8.1 3.6-8.1 8s53.8 56 58.2 56H955c4.4 0 8.1-3.6 8.1-8v-48c-.1-4.4-3.7-8-8.2-8zm5.3 352H837.9c-1.5 0-2.8 3.6-2.8 8v48c0 4.4 1.3 8 2.8 8h122.4c1.5 0 2.8-3.6 2.8-8v-48c-.1-4.4-1.3-8-2.9-8zm-1.6 128H807.4c-2.4 0-4.4 3.6-4.4 8v48c0 4.4 2 8 4.4 8h151.2c2.4 0 4.4-3.6 4.4-8v-48c0-4.4-2-8-4.4-8z" />
                                <path d="M457.4 798.5l-171.7 90.3c-31.3 16.4-70 4.4-86.4-26.9-6.5-12.5-8.8-26.7-6.4-40.6l32.8-191.2-139-135.4c-25.3-24.7-25.8-65.2-1.2-90.5 9.8-10.1 22.7-16.6 36.6-18.7l192-27.9 85.9-174c15.6-31.7 54-44.7 85.7-29.1 12.6 6.2 22.8 16.4 29.1 29.1l85.9 174 192 27.9c35 5.1 59.2 37.6 54.1 72.5-2 13.9-8.6 26.8-18.7 36.6L689.2 630.1 722 821.4c6 34.8-17.4 67.9-52.3 73.9-13.9 2.4-28.1.1-40.6-6.4l-171.7-90.4zM656 837.8c1.2.7 2.7.9 4.1.6 3.5-.6 5.8-3.9 5.2-7.4l-37.9-221L788 453.4c1-1 1.7-2.3 1.9-3.7.5-3.5-1.9-6.7-5.4-7.3l-222-32.3-99.3-201.2c-.6-1.3-1.6-2.3-2.9-2.9-3.2-1.6-7-.3-8.6 2.9l-99.3 201.2-222 32.3c-1.4.2-2.7.9-3.7 1.9-2.5 2.5-2.4 6.6.1 9.1L287.5 610l-37.9 221.1c-.2 1.4 0 2.8.6 4.1 1.6 3.1 5.5 4.3 8.6 2.7l198.6-104.4L656 837.8z" />
                            </svg>
                            <canvas id="joe_comment_draw" height="300"></canvas>
                        </div>
                    </div>
                    <div class="foot">
                        <div class="owo joe_owo__contain"></div>
                        <div class="submit">
                            <span class="cancle joe_comment__cancle">取消</span>
                            <button type="submit">发送评论</button>
                            <input style="<?php if(Helper::options()->NimingComment !== 'on') echo 'display:none;'  ?>" id="joe_comment_niming" class="barrager" type="checkbox" title="开启/关闭匿名">
                        </div>
                    </div>
                </form>
            </div>
            <?php if ($comments->have()) : ?>
                <?php $comments->listComments(); ?>
                <?php
                $comments->pageNav(
                    '<svg class="icon icon-prev" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>',
                    '<svg class="icon icon-next" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>',
                    1,
                    '...',
                    array(
                        'wrapTag' => 'ul',
                        'wrapClass' => 'joe_pagination',
                        'itemTag' => 'li',
                        'textTag' => 'a',
                        'currentClass' => 'active',
                        'prevClass' => 'prev',
                        'nextClass' => 'next'
                    )
                );
                ?>
            <?php endif; ?>
        <?php else : ?>
            <div class="joe_comment__close">
                <svg class="joe_comment__close-icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="18" height="18">
                    <path d="M512.307.973c282.317 0 511.181 201.267 511.181 449.587a402.842 402.842 0 0 1-39.27 173.26 232.448 232.448 0 0 0-52.634-45.977c16.384-39.782 25.293-82.688 25.293-127.283 0-211.098-199.117-382.157-444.621-382.157-245.555 0-444.57 171.06-444.57 382.157 0 133.427 79.514 250.88 200.039 319.18v107.982l102.041-65.127a510.157 510.157 0 0 0 142.49 20.122l19.405-.359c19.405-.716 38.758-2.508 57.958-5.427l3.584 13.415a230.607 230.607 0 0 0 22.323 50.688l-20.633 3.328a581.478 581.478 0 0 1-227.123-12.288L236.646 982.426c-19.66 15.001-35.635 7.168-35.635-17.664v-157.39C79.411 725.198 1.024 595.969 1.024 450.56 1.024 202.24 229.939.973 512.307.973zm318.464 617.011c97.485 0 176.794 80.435 176.794 179.2S928.256 976.23 830.77 976.23c-97.433 0-176.742-80.281-176.742-179.046 0-98.816 79.309-179.149 176.742-179.149zM727.757 719.002a131.174 131.174 0 0 0-25.754 78.182c0 71.885 57.805 130.406 128.768 130.406 28.877 0 55.552-9.625 77.056-26.01zm103.014-52.327c-19.712 0-39.117 4.557-56.678 13.312L946.33 854.58c8.499-17.305 13.158-36.864 13.158-57.395 0-71.987-57.805-130.509-128.717-130.509zM512.307 383.13l6.861.358a67.072 67.072 0 0 1 59.853 67.072l-.307 6.86a67.072 67.072 0 0 1-66.407 60.57l-6.81-.358a67.072 67.072 0 0 1-59.852-67.072 67.072 67.072 0 0 1 66.662-67.43zm266.752 0l6.861.358a67.072 67.072 0 0 1 59.853 67.072l-.307 6.86a67.072 67.072 0 0 1-66.407 60.57l-6.81-.358a67.072 67.072 0 0 1-59.852-67.072h-.051l.307-6.86a67.072 67.072 0 0 1 66.406-60.57zm-533.504 0l6.861.358a67.072 67.072 0 0 1 59.853 67.072l-.307 6.86a67.072 67.072 0 0 1-66.407 60.57l-6.81-.358a67.072 67.072 0 0 1-59.852-67.072 67.072 67.072 0 0 1 66.662-67.43z" />
                </svg>
                <?php if ($this->options->JCommentStatus === "off") : ?>
                    <span>博主关闭了所有页面的评论</span>
                <?php else : ?>
                    <span>博主关闭了当前页面的评论</span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<form style="display: none;" id="comment_form_operation" action="" method="post"></form>
<?php
function threadedComments($comments, $options)
{ ?>
    <li class="comment-list__item">
        <div class="comment-list__item-contain" id="<?php $comments->theId(); ?>">
            <div class="term">
                <img width="48" height="48" class="avatar lazyload" src="<?php _getAvatarLazyload() ?>" data-src="<?php _getAvatarByMail($comments->mail); ?>" alt="头像" />
                <div class="content">
                    <div class="user">
                        <span class="author"><?php $comments->author(); ?></span>
                        <span class="author" style="<?php if(Helper::options()->CommentLevel !== 'on') echo 'display:none;'  ?>"><?php autvip($comments->mail); ?></span>
                        <?php if ($comments->authorId === $comments->ownerId) : ?>
                            <i class="owner">作者</i>
                        <?php endif; ?>
                        <?php if ($comments->status === "waiting") : ?>
                            <em class="waiting">（评论审核中...）</em>
                        <?php endif; ?>
                        <div class="agent"><span style="<?php if(Helper::options()->CommentCity !== 'on') echo 'display:none;'  ?>"><?php _getCityById($comments->ip);?> ·</span><?php  _getAgentOS($comments->agent); ?> · <?php _getAgentBrowser($comments->agent); ?></div>
                        <span style="margin-left:5px;color:#617d0e;font-size:12px; <?php if(Helper::options()->CommentFloor !== 'on') echo 'display:none;'  ?>">
                        	<?php if($comments->levels == 0): ?>
                        		<?php if($comments->sequence == 1): ?>沙发
                        		<?php elseif($comments->sequence == 2): ?>板凳
                        		<?php elseif($comments->sequence == 3): ?>地毯
                        	<?php else: ?>
                        		第<?php  $comments->sequence(); ?>楼<?php endif; ?>
                        	<?php endif; ?>
                        </span>
                    </div>
                    <div class="substance">
                        <?php _getParentReply($comments->parent) ?>
                        <?php echo _parseCommentReply($comments->content); ?>
                    </div>
                    <div class="handle">
                        <time class="date" datetime="<?php $comments->date('Y-m-d'); ?>"><?php $comments->date('Y-m-d'); ?></time>
                        <span class="reply joe_comment__reply" data-id="<?php $comments->theId(); ?>" data-coid="<?php $comments->coid(); ?>">
                            <i class="icon fa fa-pencil" aria-hidden="true"></i>回复
                        </span>
                        <span class="reply comment_operation" style="margin-left: 5px;">
                            <svg t="1626580891087" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2242" width="15" height="15"><path d="M512 64c247.424 0 448 200.576 448 448S759.424 960 512 960 64 759.424 64 512 264.576 64 512 64z m0 64c-212.077 0-384 171.923-384 384s171.923 384 384 384 384-171.923 384-384-171.923-384-384-384z m201.827 182.173c12.372 12.371 12.496 32.353 0.372 44.877l-0.372 0.377L557.255 512l156.572 156.573c12.497 12.496 12.497 32.758 0 45.254-12.371 12.372-32.353 12.496-44.877 0.372l-0.377-0.372L512 557.255 355.427 713.827c-12.496 12.497-32.758 12.497-45.254 0-12.372-12.371-12.496-32.353-0.372-44.877l0.372-0.377L466.745 512 310.173 355.427c-12.497-12.496-12.497-32.758 0-45.254 12.248-12.249 31.954-12.492 44.5-0.732l0.377 0.36 0.377 0.372L512 466.745l156.573-156.572c12.496-12.497 32.758-12.497 45.254 0z" p-id="2243"></path></svg>
                            <span class="comment_btn_operation" data-type="delete" data-coid="<?php $comments->coid(); ?>">删除</span>
                        </span>
                        <span class="reply comment_operation" style="margin-left: 5px;">
                            <svg t="1626531257182" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7832" width="15" height="15"><path d="M781.28 851.36a58.56 58.56 0 0 1-58.56 58.56H301.28a58.72 58.72 0 0 1-58.56-58.56V230.4h538.56z m-421.6-725.92a11.84 11.84 0 0 1 12-12h281.28a11.84 11.84 0 0 1 12 12V160H359.68zM956.8 160H734.72v-34.56a81.76 81.76 0 0 0-81.76-81.76H371.68a82.08 82.08 0 0 0-81.76 81.76V160H67.2a35.36 35.36 0 0 0 0 70.56h105.12v620.8a128.96 128.96 0 0 0 128.96 128.96h421.44a128.96 128.96 0 0 0 128.96-128.96V230.4H956.8a35.2 35.2 0 0 0 35.2-35.2 34.56 34.56 0 0 0-35.2-35.2zM512 804.16a35.2 35.2 0 0 0 35.2-35.36V393.92a35.2 35.2 0 1 0-70.4 0V768.8a35.2 35.2 0 0 0 35.2 35.36m-164.32 0a35.36 35.36 0 0 0 35.36-35.36V393.92a35.36 35.36 0 1 0-70.56 0V768.8a36.32 36.32 0 0 0 35.2 35.36m328.64 0a35.36 35.36 0 0 0 35.2-35.36V393.92a35.36 35.36 0 1 0-70.56 0V768.8a35.36 35.36 0 0 0 35.36 35.36" p-id="7833"></path></svg>
                            <span class="comment_btn_operation" data-type="spam" data-coid="<?php $comments->coid(); ?>">垃圾</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($comments->children) : ?>
            <div class="comment-list__item-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php endif; ?>
    </li>
<?php } ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        var groupInfo = '<?php echo $groupUserInfo ?>';
        if(groupInfo != 'administrator') {
            $(".comment_operation").css("display", "none");
        }
        
        var comments4Reception = '<?php $this->options->Comments4Reception() ?>';
        if(!comments4Reception || comments4Reception == 'off') {
            $(".comment_operation").css("display", "none");
        }
    });
    
    // 前台编辑评论
    $('.comment_btn_operation').click(function() {
        var type = $(this).data('type');
        var coid = $(this).data('coid');
        $('#comment_form_operation').append('<input type="hidden" name="type" value="' + type + '" />');
        $('#comment_form_operation').append('<input type="hidden" name="coid" value="' + coid + '" />');
        $('#comment_form_operation').submit();
    });
    
    if($('#commont_mail').val() == 'niming@nm.com') {
        $('#commont_author').val('');
        $('#commont_mail').val('');
    }
</script>