<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
 
 


	/**
	 * Register menu locations
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	register_nav_menus( 
		array(
			'drop_menu' => 'ドロップメニュー',
			'foot_menu' => 'フッターメニュー',
			'mob_menu' => 'モバイルメニュー'
		)
	);





	/**
	 * Create Drop Menu
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function menu_drop() { ?>
		<div id="dropmenucontainer">
			<?php
				wp_nav_menu(
					array(
						'menu_class' => 'dropmenu',
						'menu_id' => '',
						'container_class' => 'dropmenu',
						'theme_location' => 'drop_menu',
						'depth' => '3',
						'fallback_cb' => ''
					)
				);
			?>
		</div>
	<?php }
	
	
	
	
	
	/**
	 * Create Footer Menu
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function menu_foot() { ?>
		<div id="footmenucontainer">
			<?php
				wp_nav_menu(
					array(
						'menu_class' => 'footmenu',
						'menu_id' => '',
						'container_class' => 'footmenu',
						'theme_location' => 'foot_menu',
						'depth' => '1',
						'fallback_cb' => ''
					)
				);
			?>
		</div>
	<?php }
	
	
	
	
	 
	/**
	 * Create Responsive Menu
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function menu_slide() { ?>
		<div id="responsivecontainer" class="centered_query">
			<?php
				wp_nav_menu(
					array(
						'menu_class' => 'responsive',
						'menu_id' => '',
						'container_class' => 'responsive',
						'theme_location' => 'mob_menu',
						'depth' => '3',
						'fallback_cb' => ''
					)
				);
			?>
		</div>
	<?php }

	
	
	
	
	
	/**
	 * Create Responsive Menu Button
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	*/
	
	function menu_button() { ?>
		<a id="expand_menu" title="">
			<i class="fa fa-bars fa-3x animated bounceInDown"></i>
		</a>
	<?php }
	
	
?>