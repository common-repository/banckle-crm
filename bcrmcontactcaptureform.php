<?php
/*
  Plugin Name: Banckle CRM
  Plugin URI: http://banckle.com
  Description: A light, platform-independent and feature-rich web conferencing solution that allows you to host and participate in online meetings, eLearning sessions and webinars easily and effectively! Banckle Online Meeting is based on an extremely stable, robust yet flexible architecture; allowing it to be a secure, reliable, platform-independent and user-friendly web conferencing application.
  Version: 1.0
  Author: Imran Anwar,Assad Mahmood Qazi
  Author URI: http://banckle.com

  Copyright (c) 2001-2013 Aspose Pty Ltd. All rights Reserved (email : marketplace@banckle.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details at <http://www.gnu.org/licenses/>.
 */

/**
* BCRM Contact Capture Form Widget
*/

class BCRMContactCaptureFormWidget extends WP_Widget {

     /** constructor */
     function BanckleOnlineMeetingWidget() {
          parent::WP_Widget(false, $name = 'BCRMContactCaptureFormWidget');
     }
    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'BCRMContactCaptureFormWidget',

            // Widget name will appear in UI
            __('BCRM Contact Widget', ''),


            array( 'description' => __( 'BCRM Contact Capture Form Widget' ), )
        );
    }


     /** @see WP_Widget::widget */
     function widget($args, $instance) {
          extract($args);
          $title = apply_filters('widget_title', $instance['title']);
         $BCRMWidgetCode = apply_filters('BCRMWidgetCode', $instance['widget_code']);


         ?>
            <style>
            .om-widget-container {
            width:100%;
            }
            .om-widget-content {
            padding:0px;
            }
            .om-widget-agenda {
            padding:5px;
            width:95%;
            }
            </style>
            <?php echo $before_widget; ?>
            <?php if ($title)
                            echo $before_title . $title . $after_title; ?>
            <?php echo $BCRMWidgetCode; ?>
            <?php echo $after_widget; ?>
            <?php
     }

     /** @see WP_Widget::update */
     function update($new_instance, $old_instance) {

          $instance = $old_instance;
          $instance['title'] = strip_tags($new_instance['title']);
          $instance['widget_code'] = $new_instance['widget_code'];

          return $instance;
     }

     /** @see WP_Widget::form */
     function form($instance) {
            $title = esc_attr($instance['title']);
            $widget_code = esc_attr($instance['widget_code']);

            ?>

            <p>
            Don't have Banckle account yet? <a target="_blank" href="http://banckle.com/action/signup?ref=https%3A%2F%2Fapps.banckle.com%2F" ;="">Sign Up for Free!</a>
            </p>
             <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />

                <label for="<?php echo $this->get_field_id('widget_code'); ?>"><?php _e('Widget Code:'); ?></label>
                 <textarea rows="10" class="widefat" id="<?php echo $this->get_field_id('widget_code'); ?>" name="<?php echo $this->get_field_name('widget_code'); ?>"><?php echo $widget_code; ?></textarea>

               

             </p>

            <?php
      }
}

// register widget

function bcrm_load_widget() {
    register_widget( 'BCRMContactCaptureFormWidget' );
}
add_action( 'widgets_init', 'bcrm_load_widget' );


?>