<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://romroid.ir
 * @since      1.0.0
 *
 * @package    Tlspdb
 * @subpackage Tlspdb/public/partials
 */

$image_ids      = get_post_meta($attr['id'], tlspdb_constants::timelapse_box_image_ids_option, true);
$image_ids      = explode(',', $image_ids);
$image_ids_size = sizeof($image_ids);

error_log("post id: ${attr['id']}, image ids: " . var_export($image_ids, true));
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="masterplan-cont">
    <div id="masterplan" class="render-tabs">
        <!-- <ul class="nav nav-tabs">
			 <li class="active three-col"><a class="project-update-tab single" data-toggle="tab" href="#plan2">Timelapse</a></li>
			 <li class="three-col"><a class="master-plan-tab" data-toggle="tab" href="#plan1">Project</a></li>
			 <li class="three-col"><a class="construction-tab" data-toggle="tab" href="#plan3">Progress</a></li>
		 </ul>-->

        <div class="tab-content">
            <div id="plan2" class="tab-pane fade in active load">
                <div class="loading-text-box">
                    <span class="ltb-text">Loading</span>
                    <!--<div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>-->
                </div>
                <!--<ul class="nav nav-tabs timelapse-tab">
                    <li class=" active  col-width-2">
                        <a data-toggle="tab" href="#project-update1">Apartments</a>
                    </li>
                    <li class=" col-width-2">
                        <a data-toggle="tab" href="#project-update2">Hotel &amp; Villas </a>
                    </li>
                </ul>-->

                <div class="tab-content">
                    <div id="project-update1" class="tab-pane fade in active load">
                        <div class="timelapse-slider">
							<?php
							foreach ($image_ids as $id) {
							    getmedia
								$img = wp_get_attachment_image_src($id, 'full');
								echo "<div class='timelapse-item' data-date-time='31-Dec-2016 12:38 PM' style='position: absolute; overflow: hidden;'>";
								echo "<img
                                        role='presentation' alt=''
                                        src='$img[0]'
                                        class='zoomImg'
                                        style='position: absolute; top: 0; left: 0; opacity: 0; width: 1798.8px; height: 1200; border: none; max-width: none; max-height: none;'>";
								echo '</div>';
							}
							?>
                            <div class="timelapse-item" data-date-time="31-Dec-2016 12:38 PM" style="position: absolute; overflow: hidden;">
                                <img
                                        role="presentation" alt=""
                                        src="https://www.eaglehills.com/wp-content/uploads/timelapse/eh-10001/zoom/20161231123852.jpeg"
                                        class="zoomImg"
                                        style="position: absolute; top: 0; left: 0; opacity: 0; width: 1798.8px; height: 1200; border: none; max-width: none; max-height: none;">
                                <!--<img
                                        class="image-zoom timelapse-img-lazy-load lazy-load loaded-img"
                                        src="https://www.eaglehills.com/wp-content/uploads/timelapse/eh-10001/20161231123852.jpeg"
                                        data-src="https://www.eaglehills.com/wp-content/uploads/timelapse/eh-10001/20161231123852.jpeg"
                                        alt="20161231123852.jpeg"
                                        data-zoom-image="https://www.eaglehills.com/wp-content/uploads/timelapse/eh-10001/zoom/20161231123852.jpeg">-->
                            </div>
                        </div>
                        <div class="slider-range-cont">
                            <div class="slider-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
                                    <div id="tooltip" style="display: none;">18-Feb-2021 12:03 PM</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>