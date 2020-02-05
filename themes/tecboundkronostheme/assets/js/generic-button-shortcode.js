const destroymodal =(e,newDiv)=>{
	document.body.removeChild(newDiv);
	document.body.classList.remove('tecb-full-overflow');
}

const defaultModal = (e)=>{
	e.preventDefault();
	const target = e.target;

	const refineShortcode = target.dataset.shortcode.replace(/{/g,'[').replace(/}/g,']').replace(/'/g,'|');

	jQuery.ajax({
	  url: ajaxurl,
	  type: 'POST',
	  dataType: 'json',
	  data: {'action':'tecb_shortcode_render', 'tecb_render':refineShortcode},
	  success: function(respose) {

	    let newDiv = document.createElement("div");
		newDiv.classList.add("tecb-main-modal");
		console.log(respose);
		const template =`
			<div>
				<div class="tecb-mdl-mainbody">
					<div class="tecb-mdl-container">
						<div class="tecb-mdl-closermodal">
							<div><span class="fa fa-times"></span></div>
						</div>
						${respose.html}
					</div>
				</div>
			</div>
		`;


		newDiv.innerHTML=template;

		setRequiredSimbol(newDiv);
		newDiv.querySelector('.tecb-mdl-closermodal').addEventListener('click',(e)=>{
			e.preventDefault(); 
			destroymodal(e,newDiv);
		});

		document.body.appendChild(newDiv);
		document.body.classList.add('tecb-full-overflow');

		jQuery( 'div.wpcf7 > form' ).each( function() {
			var $form = jQuery( this );
			wpcf7.initForm( $form );

			if ( wpcf7.cached ) {
				wpcf7.refill( $form );
			}
		} );
	  }
	});

}
