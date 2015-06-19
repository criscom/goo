<?php

// Plugin definition
$plugin = array(
  'title' => t('Two columns stacked criscom'),
  'category' => t('Columns: 2'),
  'icon' => 'panel_one_two.png',
  'theme' => 'panel_one_two',
  'css' => 'panel_one_two.css',
  'regions' => array(
    'top' => t('Top'),
    'left' => t('Left side'),
    'right' => t('Right side'),
    'bottom' => t('Bottom')
  ),
);
