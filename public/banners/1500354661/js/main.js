$(function(){
	init();
	function init() {
		var _obj = $('.animacao');
		TweenLite.to($('.cubo', _obj), 1.7, { top: 40, ease: Strong.easeInOut, onComplete() {
			setTimeout(function(){
				TweenLite.to($('.cubo', _obj), 1.7, { top: -140, ease: Strong.easeInOut, onComplete() {
					setTimeout(function(){
						TweenLite.to($('.cubo', _obj), 1.7, { top: -300, ease: Strong.easeInOut, onComplete() {
							setTimeout(function(){
								TweenLite.to($('.cubo img', _obj), 1.7, { height: '85%', left: '82%', ease: Strong.easeInOut});
								TweenLite.to($('.cubo', _obj), 1.7, { top: 10, ease: Strong.easeInOut, onComplete() {
									TweenLite.to($('.cartao img', _obj), 1, { width: '50%', left: 57, bottom: -10, ease: Back.easeOut.config(1.7), onComplete() {
										TweenLite.to($('.text p', _obj).eq(0), 0.5, {delay: .1, top: 20, opacity: 1, onComplete() {
											setTimeout(function(){
												TweenLite.to($('.footer', _obj), 1, {opacity: 1});
												TweenLite.to($('.text p', _obj).eq(0), 1, {top: 40, opacity: 0});
												TweenLite.to($('.text p', _obj).eq(1), 1, {delay: 1.2, top: 20, opacity: 1});
												TweenLite.to($('a.btn', _obj), 1, {delay: 2, top: 85, opacity: 1});
												TweenLite.to($('.logoBB', _obj), 1, {delay: 2, bottom: 30, opacity: 1});
											}, 1200);
										}});
									}});
								}});
							}, 750);
						}});
					}, 750);
				}});
			}, 750);
		}});
	}
});
