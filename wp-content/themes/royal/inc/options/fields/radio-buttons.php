<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * Radio buttons control
 */
class Royal_Options_RadioButtons extends Royal_Options_Control
{
	public $type = 'radio-buttons';

	public function render_content() {
		?>

			<div class="options-control-inputs">
				<radio-buttons v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></radio-buttons>
			</div>

		<?php
	}
}
