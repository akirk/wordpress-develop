<?php
/**
 * Unit tests covering WP_HTML_Tag functionality.
 *
 * @package WordPress
 * @subpackage HTML-API
 */

/**
 * @group html-api
 *
 * @coversDefaultClass WP_HTML_Tag
 */
class Tests_HtmlApi_WpHtmlTag extends WP_UnitTestCase {
	public function test_generic() {
		$p = new WP_HTML_Tag_Processor( '<html><a href="test"></a><b id="hello"></b><strong class="howdy"></strong>' );
		$a = $p->next_tag( 'a',true );
		$this->assertEquals( 'test', $a->get_attribute( 'href' ) );

		$b = $p->next_tag( 'b',true );
		$this->assertEquals( 'hello',  $b->get_attribute( 'id' ) );
		$this->assertEquals( 'test',  $a->get_attribute( 'href' ) );

	}
}
