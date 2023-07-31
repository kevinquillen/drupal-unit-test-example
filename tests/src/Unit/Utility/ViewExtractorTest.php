<?php

namespace Drupal\Tests\mymodule\Utility;

use Drupal\mymodule\Utility\ViewExtractor;
use Drupal\Tests\UnitTestCase;

/**
 * Unit test for ViewExtractor class.
 *
 * @group mymodule
 */
class ViewExtractorTest extends UnitTestCase {

  /**
   * Assert that the regular expression extracts as expected.
   *
   * @dataProvider facetSourceMachineNames
   */
  public function testExtractedViewInformation($passed_value, $expected_value) {
    $matches = ViewExtractor::extractViewInformation($passed_value);
    $this->assertSame($expected_value, $matches);
  }

  /**
   * Data provider for testExtractedViewInformation().
   *
   * @return array
   *   An array of test values and expected results.
   */
  public function facetSourceMachineNames(): array {
    return [
      [
        'search_api:views_rest__search__content_listing',
        ['search', 'content_listing'],
      ],
      [
        'search_api:views_rest__search_foo__content',
        ['search_foo', 'content'],
      ],
      [
        'search_api:views_rest__search_foo_bar__content_bar_baz',
        ['search_foo_bar', 'content_bar_baz'],
      ],
      [
        'search_api__views_rest__search__content_listing',
        ['search', 'content_listing'],
      ],
      [
        'search_api__views_rest__search_foo__content',
        ['search_foo', 'content'],
      ],
      [
        'search_api__views_rest__search_foo_bar__content_bar_baz',
        ['search_foo_bar', 'content_bar_baz'],
      ],
      [
        'some_unkn0wN_string',
        [],
      ],
      [
        '', [],
      ],
    ];
  }

}
