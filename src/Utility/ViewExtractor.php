<?php

namespace Drupal\mymodule\Utility;

/**
 * Utility class for extracting views from facet sources.
 *
 * @group mymodule
 */
class ViewExtractor {

  /**
   * Takes a machine name and extrapolates the view and display id.
   *
   * @param string $machine_name
   *   The configuration machine name.
   *
   * @return string[]
   *   The array of items extracted from the string.
   */
  public static function extractViewInformation(string $machine_name) {
    preg_match('/(?:search_api(?:\:|__)views_rest)__([A-Z_]+)__([A-Z_]+)/i', $machine_name, $matches);

    if (!empty($matches)) {
      unset($matches[0]);
      $matches = array_values($matches);
    }

    return $matches;
  }

}
