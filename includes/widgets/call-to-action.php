<?php 

class Prorental_CTA_Widget extends WP_Widget {
    public function __construct() {
        // actual widget processes
        parent::__construct(
            'prorental-cta',  // Base ID
            'Prorental Call To Action',   // Name
            array( 'description' => __( 'Display a banner with background image, text and a button', 'prorental' ), )
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Prorental_CTA_Widget' );
        });
    }
 
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        extract($args);
        
        echo $before_widget;

        $background_style = wp_sprintf( 'background-image: url(%s);', $instance['image'] );
        
 
        if('style-1' == $instance['style']) { 
            ?>
            <div class="banner banner--style1" style="<?php echo $background_style; ?>">
                <div class="banner__left">
                    <h3 class="banner__title"><?php echo $instance['title']; ?></h3>
                    <a href="<?php echo $instance['url']; ?>" class="c-btn c-btn--primary"><?php echo $instance['label']; ?></a>
                </div>
                <div class="banner__right">
                    <?php echo wpautop( $instance['text'] ); ?>
                </div>
            </div>

            <?php
            
        } else { 
            ?>
            <div class="banner banner--style2" style="<?php echo $background_style; ?>">
                <div class="banner__right">
                    <h3 class="banner__title"><?php echo $instance['title']; ?></h3>
                    <?php echo wpautop( $instance['text'] ); ?>
                    <a href="<?php echo $instance['url']; ?>" class="c-btn c-btn--primary"><?php echo $instance['label']; ?></a>
                </div>
            </div>
            <?php
        }
 
        echo $after_widget;
    }
 
    public function form( $instance ) {
        // outputs the options form in the admin
        // Default values for your variables
		$instance = wp_parse_args(
			(array) $instance,
            array(
                'title'     => '',
                'text'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, aspernatur iure!',
                'image'     => 'https://via.placeholder.com/600x350',
                'url'      => '',
                'style'    => 'style-1',
                'label'     => 'Go Here!'
            )
		);
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        ?>

        <p>
            <label for="<?= $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'prorental' ); ?></label>
            <input class="widefat" id="<?= $this->get_field_id( 'title' ); ?>" name="<?= $this->get_field_name( 'title' ); ?>" type="text" value="<?= esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?= $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:', 'prorental' ); ?></label>
            <textarea class="widefat" name="<?php echo $this->get_field_name( 'text' ); ?>" id="<?php echo $this->get_field_id( 'text' ); ?>" cols="30" rows="10"><?php echo esc_textarea( $instance['text'] ); ?></textarea>
        </p>

        <p>
            <label for="<?= $this->get_field_id( 'image' ); ?>"><?php _e( 'Image URL:', 'prorental' ) ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo esc_attr( $instance['image'] ); ?>" />
        </p>

        <p>
            <label for="<?= $this->get_field_id( 'label' ); ?>"><?php _e( 'Button Text:', 'prorental' ); ?></label>
            <input class="widefat" id="<?= $this->get_field_id( 'label' ); ?>" name="<?= $this->get_field_name( 'label' ); ?>" type="text" value="<?= esc_attr( $instance['label'] ); ?>" />
        </p>

        <p>
            <label for="<?= $this->get_field_id( 'url' ); ?>"><?php _e( 'Button Link:', 'prorental' ); ?></label>
            <input class="widefat" id="<?= $this->get_field_id( 'url' ); ?>" name="<?= $this->get_field_name( 'url' ); ?>" type="text" value="<?= esc_attr( $instance['url'] ); ?>" />
        </p>

        <p>
            <input type="radio" id="style-1" name="<?= $this->get_field_name( 'style' ); ?>" value="style-1" <?php checked($instance['style'], 'style-1'); ?>>
            <label for="style-1"><?php _e( 'Style 1:', 'prorental' ); ?></label><br>
            <input type="radio" id="style-2" name="<?= $this->get_field_name( 'style' ); ?>" value="style-2" <?php checked($instance['style'], 'style-2'); ?>>
            <label for="style-2"><?php _e( 'Style 2:', 'prorental' ); ?></label>
        </p>

        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text']       = $new_instance['text'];
        $instance['image']      = strip_tags( $new_instance['image'] );
        $instance['url']      = strip_tags( $new_instance['url'] );
        $instance['label']       = $new_instance['label'];
        $instance['style']     = $new_instance['style'];

        return $instance;
    }
}

new Prorental_CTA_Widget();