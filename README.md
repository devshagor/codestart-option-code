# codestart-option-code

define( 'CS_ACTIVE_FRAMEWORK',  true  ); // default true
define( 'CS_ACTIVE_METABOX',    true ); // default true
define( 'CS_ACTIVE_TAXONOMY',   false ); // default true
define( 'CS_ACTIVE_SHORTCODE',  false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',  false ); // default true
define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // light version active

function theshape_cs_metabox(){
    CSFramework_Metabox::instance(array());
}
add_action('init','theshape_cs_metabox');
