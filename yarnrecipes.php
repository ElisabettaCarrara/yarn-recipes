<?php 

/**
 * Plugin Name:       Yarn Recipes
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Adds Yarn Recipes to the block editor.
 * Version:           1.0.0
 * Requires at least: 5.5
 * Requires PHP:      7.2
 * Author:            Elisabetta Carrara
 * Author URI:        https://yarnblog.netsons.org/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       yarn-recipes
 */

/**
* Check for Easy Digital Downloads and Easy Digitals Downloads Blocks dependencies
*/

$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
if ( in_array( 'easy-digital-downloads/easy-digital-downloads.php' || 'edd-blocks/edd-blocks.php', $active_plugins ) ) {
    // Plugin is active
}

// yarn-recipes/classes/Dependency_Checker.php
class yarn_recipes_dependency_checker {

	/**
	 * Define the plugins that our plugin requires to function.
	 * Array format: 'Plugin Name' => 'Path to main plugin file'
	 */
	const REQUIRED_PLUGINS = array(
		'Easy Digital Download'     => 'easy-digital-downloads/easy-digital-downloads.php',
		'Easy Digital Downloads Blocks' => 'edd-blocks/edd-blocks.php',
	);

	/**
	 * Check if all required plugins are active, otherwise throw an exception.
	 *
	 * @throws yarn_recipes_missing_dependencies_exception
	 */
	public function check() {
		$missing_plugins = $this->get_missing_plugins_list();
		if ( ! empty( $missing_plugins ) ) {
			throw new yarn_recipes_missing_dependencies_exception( $missing_plugins );
		}
	}

	/**
	 * @return string[] Names of plugins that we require, but that are inactive.
	 */
	private function get_missing_plugins_list() {
		$missing_plugins = array();
		foreach ( self::REQUIRED_PLUGINS as $plugin_name => $main_file_path ) {
			if ( ! $this->is_plugin_active( $main_file_path ) ) {
				$missing_plugins[] = $plugin_name;
			}
		}
		return $missing_plugins;
	}

	/**
	 * @param string $main_file_path Path to main plugin file, as defined in self::REQUIRED_PLUGINS.
	 *
	 * @return bool
	 */
	private function is_plugin_active( $main_file_path ) {
		return in_array( $main_file_path, $this->get_active_plugins() );
	}

	/**
	 * @return string[] Returns an array of active plugins' main files.
	 */
	private function get_active_plugins() {
		return apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	}

}

/**
 * Register Yarn Recipes Block Pattern
*/

function yarn_recipes_block_patterns() {

    register_block_pattern(
        'yarn-recipes-block/yarn-recipes',
        array(
            'title'       => __( 'Yarn Recipes', 'yarn-recipes' ),
            
            'description' => __( 'Includes a yarn recipes pattern.', 'Block pattern description', 'yarn-recipes' ),
            
            'content'     => "<!-- wp:gallery {\"linkTo\":\"none\"} -->\n<figure class=\"wp-block-gallery has-nested-images columns-default is-cropped\"><!-- wp:image {\"id\":79,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/playingcatyarn-1024x768.jpg\" alt=\"\" class=\"wp-image-79\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:image {\"id\":78,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/sleepingcatsmile-768x1024.jpg\" alt=\"\" class=\"wp-image-78\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:image {\"id\":80,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-default\"} -->\n<figure class=\"wp-block-image size-large is-style-default\"><img src=\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/exploringcat-576x1024.jpg\" alt=\"\" class=\"wp-image-80\"/></figure>\n<!-- /wp:image --><figcaption class=\"blocks-gallery-caption\">You can upload up to three pics per recipe</figcaption></figure>\n<!-- /wp:gallery -->\n\n<!-- wp:spacer {\"height\":15} -->\n<div style=\"height:15px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:table {\"hasFixedLayout\":true,\"className\":\"is-style-regular\",\"fontSize\":\"medium\"} -->\n<figure class=\"wp-block-table is-style-regular has-medium-font-size\"><table class=\"has-fixed-layout\"><tbody><tr><td>Yarn</td><td></td></tr><tr><td>Materials</td><td></td></tr><tr><td>Needles</td><td></td></tr><tr><td>Gauge</td><td></td></tr><tr><td>Skill Level</td><td></td></tr><tr><td>Notes</td><td></td></tr></tbody></table><figcaption>Fill the table with the relevant information</figcaption></figure>\n<!-- /wp:table -->\n\n<!-- wp:spacer {\"height\":15} -->\n<div style=\"height:15px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:paragraph {\"backgroundColor\":\"light-green-cyan\"} -->\n<p class=\"has-light-green-cyan-background-color has-background\">Describe your pattern here. You can customize this block appearance to your likings so that it matches your brand.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":15} -->\n<div style=\"height:15px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:file {\"id\":83,\"href\":\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/logo.pdf\",\"displayPreview\":false} -->\n<div class=\"wp-block-file\"><a id=\"wp-block-file--media-03007112-2625-4d7e-8511-938257f7580a\" href=\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/logo.pdf\" target=\"_blank\" rel=\"noreferrer noopener\">logo</a><a href=\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/logo.pdf\" class=\"wp-block-file__button\" download aria-describedby=\"wp-block-file--media-03007112-2625-4d7e-8511-938257f7580a\">Download</a></div>\n<!-- /wp:file -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->",
            
            'categories'  => array('text'),
        )
    );

}    
add_action( 'init', 'yarn_recipes_block_patterns' );

/**
* Register Yarn Recipes Block Patternwith EDD purchase button block for paid patterns
*/

function paid_yarn_recipes_block_patterns() {

    register_block_pattern(
        'paid-yarn-recipes-block/paid-yarn-recipes',
        array(
            'title'       => __( 'Paid Yarn Recipes', 'paid-yarn-recipes' ),
            
            'description' => __( 'Includes a paid yarn recipes block pattern.', 'Block pattern description', 'paid-yarn-recipes' ),
            
            'content'     => "<!-- wp:gallery {\"linkTo\":\"none\"} -->\n<figure class=\"wp-block-gallery has-nested-images columns-default is-cropped\"><!-- wp:image {\"id\":79,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/playingcatyarn-1024x768.jpg\" alt=\"\" class=\"wp-image-79\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:image {\"id\":78,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/sleepingcatsmile-768x1024.jpg\" alt=\"\" class=\"wp-image-78\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:image {\"id\":80,\"sizeSlug\":\"large\",\"linkDestination\":\"none\",\"className\":\"is-style-default\"} -->\n<figure class=\"wp-block-image size-large is-style-default\"><img src=\"https://yarnblog.netsons.org/wp-content/uploads/2022/02/exploringcat-576x1024.jpg\" alt=\"\" class=\"wp-image-80\"/></figure>\n<!-- /wp:image --><figcaption class=\"blocks-gallery-caption\">You can upload up to three pics per recipe</figcaption></figure>\n<!-- /wp:gallery -->\n\n<!-- wp:spacer {\"height\":15} -->\n<div style=\"height:15px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:table {\"hasFixedLayout\":true,\"className\":\"is-style-regular\",\"fontSize\":\"medium\"} -->\n<figure class=\"wp-block-table is-style-regular has-medium-font-size\"><table class=\"has-fixed-layout\"><tbody><tr><td>Yarn</td><td></td></tr><tr><td>Materials</td><td></td></tr><tr><td>Needles</td><td></td></tr><tr><td>Gauge</td><td></td></tr><tr><td>Skill Level</td><td></td></tr><tr><td>Notes</td><td></td></tr></tbody></table><figcaption>Fill the table with the relevant information</figcaption></figure>\n<!-- /wp:table -->\n\n<!-- wp:spacer {\"height\":15} -->\n<div style=\"height:15px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:paragraph {\"backgroundColor\":\"light-green-cyan\"} -->\n<p class=\"has-light-green-cyan-background-color has-background\">Describe your pattern here. You can customize this block appearance to your likings so that it matches your brand.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":15} -->\n<div style=\"height:15px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:shortcode /-->\n\n<!-- wp:paragraph -->\n<p>Paste in the shortcode block the shortcode you can find in the edit screen of the single download. This will show a button with the price that allows instant purchase of the single pattern</p>\n<!-- /wp:paragraph -->",
            
            'categories'  => array('text'),
        )
    );

}    
add_action( 'init', 'paid_yarn_recipes_block_patterns' );
