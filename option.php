<?php 

define( 'CS_ACTIVE_FRAMEWORK',  true  ); // default true
define( 'CS_ACTIVE_METABOX',    true ); // default true
define( 'CS_ACTIVE_TAXONOMY',   false ); // default true
define( 'CS_ACTIVE_SHORTCODE',  false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',  false ); // default true
define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false

function theshape_cs_metabox(){
    CSFramework_Metabox::instance(array());
}
add_action('init','theshape_cs_metabox');

// framework options filter example
function theshape_meta_option( $options ) {
    
	$options[]    = array(
		'id'      => 'page_metabox',
		'title'     => 'First Section',
		'post_type' => 'page',
		'icon'      => 'fa fa-heart',
		'context'   => 'normal',
		'priorty'   => 'default',
		'sections'  => array(
			array(
				'name'=>'section1',
				'title'=>__('Page Settings','philosophy'),
				'icon'=>'fa fa-image',
				'fields'    => array(
					array(
					  'id'    => 'page-heading',
					  'type'  => 'text',
					  'title' => __('Page Heading','philosophy'),
					),	
					array(
					  'id'    => 'page-excerpt',
					  'type'  => 'textarea',
					  'title' => __('Excerpt text','philosophy'),
					),	
					array(
						'id'      => 'is_favorite',
						'type'    => 'switcher',
						'title'   => 'Favorite',
						'default' => 1
					),	
					array(
						'id'      => 'is_extra',
						'type'    => 'switcher',
						'title'   => 'Extra Switch',
						'default' => 1
					),				  
					array(
						'id'    => 'extra_excerpt',
						'type'  => 'textarea',
						'title' => __('Condition Favorite Excerpt','philosophy'),
						'dependency'=>array('is_favorite|is_extra','==|==','1|1'),
					)				  
			)
		)
		
	));
  
	return $options;
  
  }
  add_filter( 'cs_metabox_options', 'theshape_meta_option' );


  // For Theme Option init 


  function theshape_theme_option_init(){
    $settings           = array(
        'menu_title'      => 'Theshape Option',
        'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
        'menu_slug'       => 'theshape-option-panel',
        'ajax_save'       => false,
        'show_reset_all'  => false,
        'framework_title' => 'Theshape Option',
        'menu_icon'       =>'dashicons-admin-home' ,
        'menu_position'   =>'21'  
      );
      CSFramework::instance($settings,array());
  }
add_action('init', 'theshape_theme_option_init');

 // For Theme Option 

function theshape_theme_option($options){
    $options[] = array(
        'name' => 'footer_option',
        'title' => __('Footer Option','theshape'),
        'icon'=>'fa fa-edit',
        'fields'=>array(
            array(
                'id'=>'footer_call_action',
                'type'  => 'switcher',
                'title' => __('Footer Call To Action Visible','theshape'),
                'default'=>'1',
            ),
            array(
                'id'=>'footer_call_action_title',
                'type'  => 'text',
                'title' => __('Footer Call To Action Title','theshape'),
                'default'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.','theshape',
                'dependency'=>array('footer_call_action','==', '1'),
            ),
            array(
                'id'=>'footer_call_action_btn',
                'type'  => 'text',
                'title' => __('Footer Call To Action Button Label','theshape'),
                'default'=>'Call Action','theshape',
                'dependency'=>array('footer_call_action','==', '1'),
            ),
            array(
                'id'=>'footer_call_action_btn_url',
                'type'  => 'text',
                'title' => __('Footer Call To Action Button Link','theshape'),
                'dependency'=>array('footer_call_action','==', '1'),
            )
        )
    );
    $options[] = array(
        'name' => 'footer_option-x',
        'title' => __('Footer Option X','theshape'),
        'icon'=>'fa fa-edit',
        'fields'=>array(
            array(
                'id'=>'footer_call_action-x',
                'type'  => 'switcher',
                'title' => __('Footer Call To Action Visible','theshape'),
                'default'=>'0'
            )
        )
    );
    $options[] = array(
        'name' => 'wp-editor',
        'title' => __('Your custom style','theshape'),
        'icon'=>'fa fa-edit',
        'fields'=>array(
            array(
                'id'    => 'theshape_option_editor',
                'type'  => 'wp_editor',
                'title' => 'Your custom style',
            )
        )
    );
    return $options;
}
add_filter('cs_framework_options','theshape_theme_option');