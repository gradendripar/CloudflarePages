
		if ($('.joe_comment').length) {
			let isSubmit = false;
			$('.joe_comment__respond-form').on('submit', function (e) {
				e.preventDefault();
				const action = $('.joe_comment__respond-form').attr('action') + '?time=' + +new Date();
				const type = $('.joe_comment__respond-form').attr('data-type');
				const parent = $('.joe_comment__respond-form').attr('data-coid');
				const author = $(".joe_comment__respond-form .head input[name='author']").val();
				const _ = $(".joe_comment__respond-form input[name='_']").val();
				const mail = $(".joe_comment__respond-form .head input[name='mail']").val();
				const url = $(".joe_comment__respond-form .head input[name='url']").val();
				let text = $(".joe_comment__respond-form .body textarea[name='text']").val();
				if (author.trim() === '') return Qmsg.info('请输入昵称！');
				if (!/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(mail)) return Qmsg.info('请输入正确的邮箱！');
				if (type === 'text' && text.trim() === '') return Qmsg.info('请输入评论内容！');
				if(window.Joe.JSensitiveWords) {
                    if(window.Joe.JSensitiveWords.indexOf(text.trim()) > 0) {
                        return Qmsg.error(window.Joe.JSensitiveWords);
                    }                    
				}
				if (type === 'draw') {
					const txt = $('#joe_comment_draw')[0].toDataURL('image/webp', 0.1);
					text = '{!{' + txt + '}!} ';
				}
				if (isSubmit) return;
				isSubmit = true;
				$('.joe_comment__respond-form .foot .submit button').html('发送中...');
				$.ajax({
					url: action,
					type: 'POST',
					data: { author, mail, text, parent, url, _ },
					dataType: 'text',
					success(res) {
						let arr = [],
							str = '';
						arr = $(res).contents();
						Array.from(arr).forEach(_ => {
							if (_.parentNode.className === 'container') str = _;
						});
						if (!/Joe/.test(res)) {
							Qmsg.warning(str.textContent.trim() || '');
							isSubmit = false;
							$('.joe_comment__respond-form .foot .submit button').html('发表评论');
						} else {
							window.location.reload();
						}
					},
					error() {
						isSubmit = false;
						$('.joe_comment__respond-form .foot .submit button').html('发表评论');
						Qmsg.warning('发送失败！请刷新重试！');
					}
				});
			});
		}
	