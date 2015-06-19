<?php
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<div class="panel-display panel-2col clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
    <div class="center-wrapper one">
      <div class="panel-panel panel-col-first">
        <?php print $content['left_above']; ?>
      </div>
      <div class="panel-panel panel-col-last">
        <?php print $content['right_above']; ?>
      </div>
    </div>
    <div class="center-wrapper two">
      <div class="panel-panel panel-col-first">
        <?php print $content['left_below']; ?>
      </div>
      <div class="panel-panel panel-col-last">
        <?php print $content['right_below']; ?>
      </div>
    </div>

</div>
