<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Royal_Options_Markup extends Royal_Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'markup';

	/**
	 * The custom markup
	 * 
	 * @var  string
	 */
	public $content;

	/**
	 * Assets files that will be enqueued
	 * 
	 * @var  array
	 */
	public $enqueue;

	/**
	 * Enqueue assets for this control
	 * 
	 * @return  void
	 */
	public function enqueue() {
	}
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		echo wp_kses_post( $this->content );
	}
}
