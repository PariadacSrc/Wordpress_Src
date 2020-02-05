<?php

/**
*@package Unidos en Red Theme
*/

class classMainPostTypes{

	private $tecb_post_types=array(
		UER_PRFX.'news' =>array(
			'capability_type' => 'page',
			'supports'	=> array('thumbnail','title','editor','page-attributes'),
			'public'	=> true,
			'label'		=> 'News',
			'description' => 'Here all the main news of "Unidos en Red" are published'
		),
		UER_PRFX.'camp' =>array(
			'capability_type' => 'page',
			'supports'	=> array('thumbnail','title','editor','page-attributes'),
			'public'	=> true,
			'label'		=> 'Campaigns',
			'description' => 'Here all the main campaign of "Unidos en Red" are published'
		),
		UER_PRFX.'allics' =>array(
			'capability_type' => 'page',
			'supports'	=> array('thumbnail','title','editor','page-attributes'),
			'public'	=> true,
			'label'		=> 'Alliances',
			'description' => 'Here all the main alliances of "Unidos en Red" are published'
		),
		UER_PRFX.'othrs' =>array(
			'capability_type' => 'page',
			'supports'	=> array('thumbnail','title','editor','page-attributes'),
			'public'	=> true,
			'label'		=> 'Other Calls',
			'description' => 'Here all the main Other Calls of "Unidos en Red" are published'
		),
		UER_PRFX.'trngs' =>array(
			'capability_type' => 'page',
			'supports'	=> array('thumbnail','title','editor','page-attributes'),
			'public'	=> true,
			'label'		=> 'Trainings',
			'description' => 'Here all the main Trainings of "Unidos en Red" are published'
		),
		UER_PRFX.'celbrts' =>array(
			'capability_type' => 'page',
			'supports'	=> array('thumbnail','title','editor','page-attributes'),
			'public'	=> true,
			'label'		=> 'Celebrities',
			'description' => 'Here all the main Celebrities of "Unidos en Red" are published'
		),

	);

	public function get_tecb_post_types(){
		return $this->tecb_post_types;
	}

	function __construct($types=array()){
		add_action('init',array($this,'registerTypes'));
		add_action('edit_form_after_editor', array($this,'registerEditPostsSection'));
	}

	public function registerTypes(){
		try {
			foreach ($this->get_tecb_post_types() as $typekey => $type) {
				register_post_type($typekey,$type);
			}
		} catch (Exception $e) {
			classExeptionsHandler::show_exeption($e);
		}
	}


	public function registerEditPostsSection( $post ){

	    ob_start();

			switch ($post->post_type) {
				case UER_PRFX.'celbrts':
					include(UER_THEME_DIR.'/src/templates/celebritiesAdminPost.php');
					break;

				default:
					break;
			}

		$return = ob_get_contents();
		ob_end_clean();

	    echo $return;
	}



}