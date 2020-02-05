const initSliderGeneric=($start=true)=>{

	document.querySelectorAll('.uer-slider-standar').forEach((item,index)=>{

		if ($start) {
			jQuery(item).slick({
			  dots: false,
			  adaptiveHeight:true,
			  infinite: true,
			  autoplay:true,
			  slidesToShow: parseInt(item.dataset.showitems),
			  responsive: [
			    {
			      breakpoint: 1025,
			      settings: {
			        slidesToShow: 1,
			      }
			    }
			  ]
			});
		}

	});
}


document.addEventListener('DOMContentLoaded',()=>{

	initSliderGeneric();

});