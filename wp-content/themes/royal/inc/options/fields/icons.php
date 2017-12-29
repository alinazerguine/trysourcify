<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an social icons control
 */
class Royal_Options_Icons extends Royal_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'icons';
	public $default = array();

	public function render_content() {
		?>
			<div class="options-control-inputs">
				<icons v-bind:value="data" v-bind:icons="_royalicons" v-on:change="triggerChange"></icons>
			</div>
		<?php
	}
}
