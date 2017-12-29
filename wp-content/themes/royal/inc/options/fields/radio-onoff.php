<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * Radio buttons control
 */
class Royal_Options_RadioOnOff extends Royal_Options_RadioButtons
{
	public function __construct( $id, $args = array() ) {
		parent::__construct( $id, $args );

		$this->choices = array(
			'on'  => _x( 'On', 'options', 'royal' ),
			'off' => _x( 'Off', 'options', 'royal' )
		);
	}


	public function render_content() {
		?>

			<div class="options-control-inputs options-control-onoff">
				<radio-buttons v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></radio-buttons>
			</div>

		<?php
	}
}
