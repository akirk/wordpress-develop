<?php

class WP_HTML_Tag {
	static $bookmark_id = 0;
	private $processor;
	private $bookmark;
	public function __construct( WP_HTML_Tag_Processor $processor ) {
		$this->processor = $processor;
		$this->bookmark = 'html-tag-' . ++self::$bookmark_id;
		$this->processor->set_bookmark( $this->bookmark );
	}

	public function __call( $name, $arguments ) {
		$this->processor->set_bookmark( 'current' . $this->bookmark );
		$this->processor->seek( $this->bookmark );
		$return = call_user_func_array( array( $this->processor, $name ), $arguments );
		$this->processor->seek( 'current' . $this->bookmark );
		return $return;
	}
}
