<?php
/**
 * Template Name: Home
 */
?>
<?php get_header('home'); ?>
    <div class="focusboxes">
        <div class="container">


            <div class="focusbox">
                <div class="item movie">
                    <?php
                        $args = array(
                            'posts_per_page' => 1
                        );
                        $the_query = new WP_Query( $args );
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="alignleft"> <?php the_post_thumbnail( 'medium' ); ?></a>
                            <?php else: ?>
                            <?php endif; ?>
                                <p class="stick-to-child"><?php _e('Notícias','taguatingashopping'); ?></p>
                            <h2><a href="<?php the_permalink(); ?>"><?php echo bia_truncate(get_the_title(),41); ?></a></h2>
                            <div class="article-meta">
                                    <p><?php echo bia_truncate(get_the_excerpt(),80); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                                    <!--<?php
                                        $version = get_post_meta($post->ID, "display", true);
                                        if ($version == 'D') {
                                            echo '<span class="display" title="'.__('Dubbed','taguatingashopping').'">'.__('Dub','taguatingashopping').'</span>';
                                        } elseif ($version == 'L') {
                                            echo '<span class="display" title="'.__('Subtitled','taguatingashopping').'">'.__('Sub','taguatingashopping').'</span>';
                                        } else if ($version == 'O') {
                                            echo '<span class="display" title="'.__('Original','taguatingashopping').'">'.__('Org','taguatingashopping').'</span>';
                                        }
                                    ?>-->
                                    <!--<?php
                                        $age = get_post_meta($post->ID, "rating", true);
                                        echo '<span class="age age-'.strtolower(trim($age,' Anos ivre')).'" title="'.$age.'">'.trim($age,' Anos ivre').'</span>';
                                    ?>-->
                                </p>
                            </div>
                            <?php $key="showtimes"; echo get_post_meta($post->ID, $key, true); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <a href="/blog/" class="focusbox-more"><img width="10" height="10" src="<?php echo get_template_directory_uri(); ?>/gfx/empty.png" class="sprite" alt="More"> <?php _e('Outras notícias','taguatingashopping'); ?></a>
            </div>   



            <!-- if there is a promotion, show it. if not, show last blog entries  --> 
            <div class="focusbox">
                <?php
                    // Para controle dos posts que serao inseridos caso nao haja promocao ou eventos!
                    $nextoffset = 0;

                    $args = array(
                        'post_type'=>'taguatinga_promotion',
                        'posts_per_page' => 1
                    );
                    $the_query = new WP_Query( $args );
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php if(get_post_meta($post->ID, "taguatinga_promotion_imageonly", true) == 1) : ?>
                                <a href="<?php echo get_post_meta($post->ID, "taguatinga_promotion_url", true); ?>" class="full"><?php the_post_thumbnail('focus-box'); ?></a>
                            <?php else: ?>
                                <div class="item">
                                    <a href="<?php echo get_post_meta($post->ID, "taguatinga_promotion_url", true); ?>" class="alignleft"><?php the_post_thumbnail(); ?></a>
                                    <p class="stick-to-child"><?php _e('Promotion','taguatingashopping'); ?></p>
                                    <h2><a href="<?php echo get_post_meta($post->ID, "taguatinga_promotion_url", true); ?>"><?php the_title(); ?></a></h2>                                    
                                    <p><?php echo bia_truncate(get_the_excerpt(),80); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                                </div><!-- item -->
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="item">
                                <p class="stick-to-child"><?php _e('Promotion','taguatingashopping'); ?></p>
                                <h2><a href="<?php echo get_post_meta($post->ID, "taguatinga_promotion_url", true); ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo bia_truncate(get_the_excerpt(),130); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                            </div><!-- item -->
                        <?php endif; ?>
                    <?php endwhile; ?>
                        <a href="<?php the_permalink(); ?>" class="focusbox-more"><img width="10" height="10" src="<?php echo get_template_directory_uri(); ?>/gfx/empty.png" class="sprite" alt="More"> <?php _e('Promotion','taguatingashopping'); ?></a>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'post__not_in' => get_option( 'sticky_posts' )
                    );
                    $the_query = new WP_Query( $args );
                ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $nextoffset++; ?>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php if(get_post_meta($post->ID, "taguatinga_promotion_imageonly", true) == 1) : ?>
                             <a href="<?php the_permalink(); ?>" class="full"><?php the_post_thumbnail('focus-box'); ?></a>
                        <?php else: ?>
                             <div class="item">
                                <a href="<?php the_permalink(); ?>" class="alignleft"><?php the_post_thumbnail(); ?></a>
                                <p class="stick-to-child"><?php _e( 'Latest Blog Entry','taguatingashopping' ); ?></p>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>                                    
                                <p><?php echo bia_truncate(get_the_excerpt(),80); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                            </div><!-- item -->
                        <?php endif; ?>   
                    <?php else: ?>
                        <div class="item">
                            <p class="stick-to-child"><?php _e( 'Latest Blog Entry','taguatingashopping' ); ?></p>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo bia_truncate(get_the_excerpt(),130); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                        </div><!-- item -->
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <a href="/blog/" class="focusbox-more"><img width="10" height="10" src="<?php echo get_template_directory_uri(); ?>/gfx/empty.png" class="sprite" alt="More"> <?php _e('From The Blog','taguatingashopping'); ?></a>
                <?php endif; ?>
            </div><!-- focusbox -->



            <div class="focusbox">
    		<!-- show an upcoming/current event --> 
                <?php
                    $args = array(
                        'post_type' => 'taguatinga_event',
                        'posts_per_page' => 1,
                        'orderby'  => 'meta_value',
                        'meta_key' => 'taguatinga_event_end_date',
                        'order' => 'DESC',
                        'meta_query' => array(
                            array(
                                'key' => 'taguatinga_event_hide',
                                'value' => 1,
                                'compare' => '!=',
                                /** / 'meta-value' => $value, /**/
                            )
                        )
                    );
                    $the_query = new WP_Query( $args );
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php if(get_post_meta($post->ID, "taguatinga_event_imageonly", true) == 1) : ?>
                                <a href="<?php the_permalink(); ?>" class="full"><?php the_post_thumbnail('focus-box'); ?></a>
                            <?php else: ?>
                                <div class="item">
                                    <a href="<?php the_permalink(); ?>" class="alignleft"><?php the_post_thumbnail(); ?></a>
                                    <p class="stick-to-child"><?php _e('Event','taguatingashopping'); ?></p>
                                    <h2 class="stick-to-child"><a href="<?php the_permalink(); ?>"><?php echo bia_truncate(get_the_title(),41); ?></a></h2>
                                    <p class="taguatinga_event_date">
                                        <?php if(get_post_meta($post->ID, "taguatinga_event_start_date", true)) : ?>
                                            <span class="article-meta-date-start">
                                                <?php echo date_i18n(get_option('date_format'),strtotime(get_post_meta($post->ID, "taguatinga_event_start_date", true))); ?>
                                            </span><!-- article-meta-date-start -->
                                        <?php endif; ?>
                                        <?php if(get_post_meta($post->ID, "taguatinga_event_start_date", true) != get_post_meta($post->ID, "taguatinga_event_end_date", true)) : ?>
                                            <span class="article-meta-date-end">
                                                - <?php echo date_i18n(get_option('date_format'),strtotime(get_post_meta($post->ID, "taguatinga_event_end_date", true))); ?>
                                            </span><!-- article-meta-date-end -->
                                        <?php endif; ?>
                                    </p>
                                    <p><?php echo bia_truncate(get_the_excerpt(),80); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                                </div><!-- item -->
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="item">
                                <p class="stick-to-child"><?php _e('Event','taguatingashopping'); ?></p>
                                <h2 class="stick-to-child"><a href="<?php the_permalink(); ?>"><?php echo bia_truncate(get_the_title(),80); ?></a></h2>
                                <p class="taguatinga_event_date">
                                    <?php if(get_post_meta($post->ID, "taguatinga_event_start_date", true)) : ?>
                                        <span class="article-meta-date-start">
                                            <?php echo date_i18n(get_option('date_format'),strtotime(get_post_meta($post->ID, "taguatinga_event_start_date", true))); ?>
                                        </span><!-- article-meta-date-start -->
                                    <?php endif; ?>
                                    <?php if(get_post_meta($post->ID, "taguatinga_event_start_date", true) != get_post_meta($post->ID, "taguatinga_event_end_date", true)) : ?>
                                        <span class="article-meta-date-end">
                                            - <?php echo date_i18n(get_option('date_format'),strtotime(get_post_meta($post->ID, "taguatinga_event_end_date", true))); ?>
                                        </span><!-- article-meta-date-end -->
                                    <?php endif; ?>
                                </p>
                                <p><?php echo bia_truncate(get_the_excerpt(),130); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                            </div><!-- item -->
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <a href="/eventos/" class="focusbox-more"><img width="10" height="10" src="<?php echo get_template_directory_uri(); ?>/gfx/empty.png" class="sprite" alt="More"> <?php _e('More events','taguatingashopping'); ?></a>
                <?php else: ?>
                    <?php
                        $args = array(
                            'post_type=post',
                            'posts_per_page' => 1,
                            'post__not_in' => get_option( 'sticky_posts' ),
                            'offset' => $nextoffset
                        );
                        $the_query = new WP_Query( $args );
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <div class="item">
                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $nextoffset++; ?>
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>" class="alignleft"><?php the_post_thumbnail(); ?></a>
                                    <p class="stick-to-child"><?php _e('Blog','taguatingashopping'); ?></p>
                                    <h2><a href="<?php the_permalink(); ?>"><?php echo bia_truncate(get_the_title(),41); ?></a></h2>
                                    <p><?php echo bia_truncate(get_the_excerpt(),80); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                                <?php else: ?>
                                    <p class="stick-to-child"><?php _e('Blog','taguatingashopping'); ?></p>
                                    <h2><a href="<?php the_permalink(); ?>"><?php echo bia_truncate(get_the_title(),80); ?></a></h2>
                                    <p><?php echo bia_truncate(get_the_excerpt(),130); ?> <a href="<?php the_permalink(); ?>"><?php _e('read more','taguatingashopping');?></a></p>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div><!-- item -->
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div><!-- focusbox -->
        </div><!-- content-container -->
    </div><!-- focusboxes -->
<?php get_footer('home'); ?>