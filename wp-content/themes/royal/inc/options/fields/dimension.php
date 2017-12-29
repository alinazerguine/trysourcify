<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an dimension control
 */
class Royal_Options_Dimension extends Royal_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'dimension';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>

			<div class="options-control-inputs">
				<dimension v-bind:value="data" v-bind:choices="choices" v-on:change="triggerChange"></dimension>
			</div>
		
		<?php
	}
}
