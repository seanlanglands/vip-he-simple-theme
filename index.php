<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); /* required */ ?>
	</head>
	<body <?php body_class(); ?>>

    <strong>Welcome to the VIP Happiness Engineer Test Site!</strong>

    <?php

    ?>

		<?php
        // main post loop

        $my_posts_per_page = ! empty( $_GET['my_posts_per_page'] ) ? $_GET['my_posts_per_page'] : 10;
		$my_show_yahoo = ! empty( $_GET['my_show_yahoo'] ) ? true : false;

        $args = array(
                'orderby'   => 'rand',
                'posts_per_page' => $my_posts_per_page,
        );

        $the_query = new WP_Query( $args );

		// Define the URL
        $url = 'http://www.yahoo.commm/';
        // Make the request
        $yahoo_response = wp_remote_get( $url );

		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
				the_title('<h2>','</h2>');
				the_content();
			endwhile;
		endif;

        if ( true === $my_show_yahoo ) {
            echo $yahoo_response['body'];
        }

		?>



		<?php wp_footer(); /* required */ ?>
	</body>
</html>
