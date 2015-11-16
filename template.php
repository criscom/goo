<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */

/**
 * Add Bootstrap classes to button elements.
 */
function master2015_button($variables) {

  $element = $variables['element'];
  $element['#attributes']['type'] = 'submit';
  element_set_attributes($element, array('id', 'name', 'value'));

  $element['#attributes']['class'][] = 'btn-primary btn form-' . $element['#button_type'];
  if (!empty($element['#attributes']['disabled'])) {
    $element['#attributes']['class'][] = 'form-button-disabled';
  }

  return '<input' . drupal_attributes($element['#attributes']) . ' />';
}


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function master2015_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  master2015_preprocess_html($variables, $hook);
  master2015_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function master2015_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
// Adjusting the search performance 
function master2015_preprocess_search_api_page_results(array &$variables, $hook) {
   $results = $variables['results'];

  if (!empty($variables['results']['results'])) {
    $variables['items'] = $variables['index']->loadItems(array_keys($variables['results']['results']));
  }
  $variables['result_count'] = $results['result count'];
  $variables['sec'] = 0;
  if (isset($results['performance']['complete'])) {
    $variables['sec'] = round($results['performance']['complete'], 2);
  }
  $variables['search_performance'] = array(
    '#theme' => 'search_api_page_search_performance',
    '#markup' => format_plural(
      $results['result count'],
      'About 1 result (@sec seconds)',
      'About @count results (@sec seconds)',
      array('@sec' => $variables['sec'])
    ),
    '#prefix' => '<p class="search-performance">',
    '#suffix' => '</p>',
  );
}

function master2015_form_alter(&$form, &$form_state, $form_id) {

// search form home page

  if ($form_id == 'search_api_page_search_form_home') {
  
    unset($form['search_api_page_search_form_home']['#title']);
    
    $form['keys_3']['#title_display'] = 'invisible';
    // $form_default = t('Hi. How might we direct you?');
    // $form['keys_3']['#default_value'] = $form_default;
    // $form['submit_1'] = array('#type' => 'image_button', '#src' => base_path() . drupal_get_path('theme', 'einstern_2014') . '/images/search_icon.png', '#alt' => 'search', '#prefix' => '<div class="form-actions">', '#suffix' => '</div>');
    $form_default = "Hi. How might we direct you?";
    $form['keys_3']['#attributes'] = array('placeholder' => $form_default,  'onblur' => "if (this.placeholder == '') {this.placeholder = '{$form_default}';}", 'onfocus' => "if (this.placeholder == '{$form_default}') {this.placeholder = '';}" );
    // $form['submit_1'] = array('#prefix' => '<div class="form-actions criscom">', '#suffix' => '</div>');
    $form['submit_3']['#value'] = t('Google Search'); // Change the text on the submit button
    // $form['submit_2']['#value'] = t('I am feeling lucky');
    // dpm($form);
}
// search form results page

  if ($form_id == 'search_api_page_search_form_results') {
  
    unset($form['search_api_page_search_form_results']['#title']);
    
    $form['keys_4']['#title_display'] = 'invisible';
    $form_default = t('');
    $form['keys_4']['#default_value'] = $form_default;
    // $form['submit_2'] = array('#type' => 'image_button', '#src' => base_path() . drupal_get_path('theme', 'master2015') . '/images/nav_logo195.png', '#alt' => 'search', '#prefix' => '<div class="form-actions">', '#suffix' => '</div>');
    
    // $form['submit_2'] = array('#type' => 'image_button', '#prefix' => '<div class="form-actions"><span class="glyphicons glyphicons-search">', '#suffix' => '</span></div>');
    
    // $form['actions']['submit']['attributes']['class'][] = 'glyphicons glyphicons-search';
    
    // $form['keys_2']['#attributes'] = array('onblur' => "if (this.value == '') {this.value = '{$form_default}';}", 'onfocus' => "if (this.value == '{$form_default}') {this.value = '';}" );
    


        // Hide the default button from display.
        $form['submit_4']['#attributes']['class'][] = 'element-invisible';
         // Implement a theme wrapper to add a submit button containing a search
        // icon directly after the input element.
        $form['keys_4']['#theme_wrappers'] = array('master2015_search_form_wrapper');
        $form['keys_4']['#title'] = '';
        //control the width of the input           
        $form['keys_4']['#attributes']['class'][] = 'wide input';
        $form['keys_4']['#attributes']['placeholder'] = t('');
  }
}

function master2015_master2015_search_form_wrapper($variables) {
  $output = '<div class="field append">';
  $output .= $variables['element']['#children'];
  $output .= '<button type="submit" class="medium primary btn">';
  $output .= '<span class="glyphicons glyphicons-search"></span>';
  $output .= '<span class="element-invisible">' . t('Google Search') . '</span>';
  $output .= '</button>';
  $output .= '</div>';
  return $output;
}

function master2015_theme(&$existing, $type, $theme, $path) {
  // Custom theme hooks:
  // Do not define the `path` or `template`.
  $hook_theme = array(
    'master2015_search_form_wrapper' => array(
      'render element' => 'element',
    ),
  );

  return $hook_theme;
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function master2015_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // master2015_preprocess_node_page() or master2015_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function master2015_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function master2015_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function master2015_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */
