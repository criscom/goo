<?php

// Plugin definition
$plugin = array(
  'title' => t('Two column criscom'),
  'category' => t('Columns: 2'),
  'icon' => 'panel_two_two.png',
  'theme' => 'panel_two_two',
  'css' => 'panel_two_two.css',
  'regions' => array(
    'left_above' => t('Left above'),
    'right_above' => t('Right above'),
    'left_below' => t('Left below'),
    'right_below' => t('Right below'),
  ),
);
