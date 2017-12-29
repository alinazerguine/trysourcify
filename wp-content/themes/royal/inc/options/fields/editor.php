<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an text control
 */
class Royal_Options_Editor extends Royal_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'editor';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		$name = '_options-editor-' . $this->id;
		?>
		<div class="options-control-inputs">
			<?php wp_editor( $this->value(), $name, array( 'textarea_name' => "op-options[{$this->id}]", 'drag_drop_upload' => true ) ) ?>
		</div>
		<?php
	}
}
