<?php

class WP_HTML_Tag {
	private $processor;
	private $tag_name_starts_at;
	public function __construct( WP_HTML_Tag_Processor $processor ) {
		$this->processor = $processor;
		$this->tag_name_starts_at = $processor->tag_name_starts_at;
	}

	public function __call( $name, $arguments ) {
		if ( $this->tag_name_starts_at !== $this->processor->tag_name_starts_at ) {
			throw new Exception;
		}
		$return = call_user_func_array( array( $this->processor, $name ), $arguments );
		return $return;
	}
}
