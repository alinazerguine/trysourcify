<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Royal_Options_Typography extends Royal_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'typography';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>

			<div class="options-control-inputs">
				<typography v-bind:value="data" v-bind:fonts="_royalfonts" v-on:change="triggerChange"></typography>
			</div>
		
		<?php
	}
}
