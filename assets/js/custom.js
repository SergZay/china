navIcon = document.querySelector('.nav-icon');
menuMobile = document.querySelector('.nav_phone');
if(navIcon != null && menuMobile != null) {
	navIcon.addEventListener("click", function(e){
		e.preventDefault();
		this.classList.toggle("open");
		menuMobile.classList.toggle("open");
		// document.querySelector('body').classList.toggle("open-menu");
	});
}

jQuery(function($){
	$('.read_more').click(function(e){
		e.preventDefault();
		$(this).text('Загружаю...');
		var data = {
			'action': 'loadmore',
			'query': true_posts,
			'page' : current_page
		};
		$.ajax({
			url:ajaxurl,
			data:data,
			type:'POST',
			success:function(data){
				if( data ) {
					$('.read_more').text('Смотреть ещё');
					$('.wrp_items').append(data);
					current_page++;
					if (current_page == max_pages) $(".read_more").remove();
				} else {
					$('.read_more').remove();
				}
			}
		});
	});
});