//Main Methods
const readerWp = ()=>{

	const wpbar= document.getElementById('wpadminbar');
	//if(wpbar){document.getElementById('tecb-main-body').style.paddingTop=`${wpbar.offsetHeight}px`;}
}

const setRequiredSimbol = (htmlItem)=>{

	htmlItem.querySelectorAll('.wpcf7-form-control[aria-required="true"]').forEach((element)=>{

		let newSpan = document.createElement("span");
		newSpan.classList.add("tecb-required-label");
		newSpan.innerHTML="*";

		const nLabel = element.closest('.form-group').querySelector('label');

		if(nLabel){nLabel.appendChild(newSpan);}

	});

}

const setHeader = ()=>{

	const firstSelect = document.querySelector('.tecb-global-container>section:nth-child(1)');

	if(!firstSelect.classList.contains('tecb-banner-section')){
		document.querySelector('header').classList.add('tecb-no-banner-found');
	}
}

const testimonialsBanner = ($start=true)=>{

	document.querySelectorAll('.tecb-main-testimonial-carousel').forEach((item,index)=>{

		if ($start) {
			jQuery(item).slick({
			  dots: false,
			  adaptiveHeight:true,
			  infinite: true,
			  autoplay:true,
			  slidesToShow: parseInt(item.dataset.showitems),
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 2,
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 1,
			      }
			    }
			  ]
			});
		}

		const startHeight = item.offsetHeight-40;

		item.querySelectorAll('.tecb-testimonial-block').forEach((crslitem,crslindex)=>{


			const itemtitle = crslitem.querySelector('.tecb-testimonial-block>div>div:nth-child(1)');
			itemtitle.classList.add('tecb-title-onli-on-render');

			crslitem.querySelector('.tecb-testimonial-block>div').style.height=`${startHeight}px`;
			crslitem.querySelector('.tecb-testimonial-block>div>div:nth-child(2)').style.paddingTop=`${itemtitle.offsetHeight}px`;
		});

	});
}

const resetTestimonialsHeight=()=>{
	document.querySelectorAll('.tecb-testimonial-block').forEach((item,index)=>{
		//item.querySelector('.tecb-title-onli-on-render').classList.remove('tecb-title-onli-on-render');
		item.querySelector('.tecb-testimonial-block>div').style.height=`auto`;
	});
}


document.addEventListener('DOMContentLoaded',()=>{

	//Main Actions
	readerWp();
	setHeader();
	testimonialsBanner();

	//Main Setters

	setRequiredSimbol(document);

	//Main Events
	window.addEventListener('resize', ()=>{
		resetTestimonialsHeight();
		testimonialsBanner(false);
	});

	document.getElementById('tecb-main-collapse-btn').addEventListener('click',(e)=>{

		e.preventDefault();

		const mainMenu= e.target.closest('.tecb-movile-header');

		if (!mainMenu.classList.contains('tecb-movile-show-collapse')) {
			mainMenu.classList.add('tecb-movile-show-collapse');
		}else{

			if (!mainMenu.classList.contains('tecb-movile-hide-collapse')){
				mainMenu.classList.add('tecb-movile-hide-collapse');
			}else{
				mainMenu.classList.remove('tecb-movile-hide-collapse');
			}

		}

	});

	if(document.querySelector('.tcb-open-sidebar')){

		document.querySelector('.tcb-open-sidebar').addEventListener('click',(e)=>{

			e.preventDefault();

			const mainSidebar= e.target.closest('.tecb-side-bar-content');

			if (!mainSidebar.classList.contains('tecb-open-sidebar')) {
				mainSidebar.classList.add('tecb-open-sidebar');
			}else{

				if (!mainSidebar.classList.contains('tecb-close-sidebar')){
					mainSidebar.classList.add('tecb-close-sidebar');
				}else{
					mainSidebar.classList.remove('tecb-close-sidebar');
				}

			}

		});
	}

	//Submit button dowload file

	document.querySelectorAll( '.tecb-file-form .wpcf7' ).forEach((wpcf7Elm)=>{

		wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {

			const filedata = wpcf7Elm.querySelector('.tecb-general-btn');
			var element = document.createElement('a');
			element.setAttribute('href', filedata.dataset.fileurl);
			element.setAttribute('download', filedata.dataset.filename);
			element.setAttribute('target', "_blank");

			element.style.display = 'none';
			document.body.appendChild(element);

			element.click();

			document.body.removeChild(element);

	    }, false );

	});

});