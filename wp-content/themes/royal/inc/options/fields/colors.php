<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


class Royal_Options_Colors extends Royal_Options_Control
{
	public $type = 'colors';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>
		
			<div class="options-control-inputs">
				<colors v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></colors>
			</div>

		<?php
	}
}
