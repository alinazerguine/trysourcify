<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * Select control
 */
class Royal_Options_Dropdown extends Royal_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'dropdown';

	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>
		<div class="options-control-inputs">
			<dropdown v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></dropdown>
		</div><?php
	}
}
