<?php
/**
 * Sportspress Functions
 *
 * @author    Dan Fisher
 * @package   Alchemists
 * @version   1.2.0
 */


/**
 * Sportspress custom widgets
 */
include get_template_directory() . '/sportspress/widgets/widget-alc-event-block.php';
include get_template_directory() . '/sportspress/widgets/widget-alc-game-result.php';
include get_template_directory() . '/sportspress/widgets/widget-alc-featured-player.php';


/**
 * Games - Remove Tabs
 */
if ( ! function_exists( 'alchemists_remove_event_tabs' ) ) {
	function alchemists_remove_event_tabs( $options = array() ) {
		foreach ( $options as $index => $option ) {
			if ( in_array( sp_array_value( $option, 'type' ), array( 'event_tabs' ) ) ) {
				unset( $options[ $index ] );
			}
		}
		return $options;
	}
	add_filter( 'sportspress_event_options', 'alchemists_remove_event_tabs' );
}


/**
 * Team - Remove Layout Builder
 */
if ( ! function_exists( 'alchemists_remove_team_layout' ) ) {
	function alchemists_remove_team_layout( $options = array() ) {
		foreach ( $options as $index => $option ) {
			if ( in_array( sp_array_value( $option, 'type' ), array( 'team_layout', 'team_tabs' ) ) ) {
				unset( $options[ $index ] );
			}
		}
		return $options;
	}
	add_filter( 'sportspress_team_options', 'alchemists_remove_team_layout' );
}


/**
 * Styling - Remove SportsPress Color schemes
 */
if ( ! function_exists( 'alchemists_remove_script_styling_options' ) ) {
	function alchemists_remove_script_styling_options( $options = array() ) {
		foreach ( $options as $index => $option ) {
			if ( in_array( sp_array_value( $option, 'type' ), array( 'colors' ) ) ) {
				unset( $options[ $index ] );
			}
		}
		return $options;
	}
	add_filter( 'sportspress_script_styling_options', 'alchemists_remove_script_styling_options' );
}


/**
 * Players - Remove Layout Builder
 */
if ( ! function_exists( 'alchemists_remove_player_layout' ) ) {
	function alchemists_remove_player_layout( $options = array() ) {
		foreach ( $options as $index => $option ) {
			if ( in_array( sp_array_value( $option, 'type' ), array( 'player_layout', 'player_tabs' ) ) ) {
				unset( $options[ $index ] );
			}
		}
		return $options;
	}
	add_filter( 'sportspress_player_options', 'alchemists_remove_player_layout' );
}


/**
 * Staff - Remove Layout Builder
 */
if ( ! function_exists( 'alchemists_remove_staff_layout' ) ) {
	function alchemists_remove_staff_layout( $options = array() ) {
		foreach ( $options as $index => $option ) {
			if ( in_array( sp_array_value( $option, 'type' ), array( 'staff_layout', 'staff_tabs' ) ) ) {
				unset( $options[ $index ] );
			}
		}
		return $options;
	}
	add_filter( 'sportspress_staff_options', 'alchemists_remove_staff_layout' );
}


/**
 * Convert date to Age
 */
if ( ! function_exists( 'alchemists_get_age' ) ) {
	function alchemists_get_age( $date ) {
		$date = explode( '-', $date );
		$age = ( date( 'md', date( 'U', mktime( 0, 0, 0, $date[0], $date[1], $date[2] ) ) ) > date('md')
			? ( ( date( 'Y' ) - $date[2] ) - 1 )
			: ( date( 'Y' ) - $date[2] ) );
		return $age;
	}
}


/**
 * Single Player permalinks and titles
 */
if ( ! function_exists( 'alchemists_insertrules' ) ) {
	add_filter('rewrite_rules_array', 'alchemists_insertrules');

	// Adding fake pages' rewrite rules
	function alchemists_insertrules($rules) {
		$alchemists_data       = get_option('alchemists_data');
		$single_player_pages   = isset( $alchemists_data['alchemists__player-subpages']['enabled'] ) ? $alchemists_data['alchemists__player-subpages']['enabled'] : array( 'stats' => esc_html__( 'Statistics', 'alchemists' ), 'bio' => esc_html__( 'Biography', 'alchemists' ), 'news' => esc_html__( 'Related News', 'alchemists' ), 'gallery' => esc_html__( 'Gallery', 'alchemists' ));

		// Player subpages slugs
		$stats_slug            = isset( $alchemists_data['alchemists__player-subpages-slug--stats'] ) ? esc_html( $alchemists_data['alchemists__player-subpages-slug--stats'] ) : 'stats';
		$bio_slug              = isset( $alchemists_data['alchemists__player-subpages-slug--bio'] ) ? esc_html( $alchemists_data['alchemists__player-subpages-slug--bio'] ) : 'bio';
		$news_slug             = isset( $alchemists_data['alchemists__player-subpages-slug--news'] ) ? esc_html( $alchemists_data['alchemists__player-subpages-slug--news'] ) : 'news';
		$gallery_slug          = isset( $alchemists_data['alchemists__player-subpages-slug--gallery'] ) ? esc_html( $alchemists_data['alchemists__player-subpages-slug--gallery'] ) : 'gallery';

		// Player page slug
		$player_slug = get_option( 'sportspress_player_slug', 'player' );

		$newrules = array();
		foreach ( $single_player_pages as $slug => $title ) {
			$newrules[$player_slug . '/([^/]+)/' . strtolower( trim( $slug ) ) . '/?$'] = 'index.php?sp_player=$matches[1]&fpage=' . $slug;

			switch ($slug) {
				case 'stats':
					$newrules[$player_slug . '/([^/]+)/' . strtolower( trim( $stats_slug ) ) . '/?$'] = 'index.php?sp_player=$matches[1]&fpage=' . $slug;
				break;

				case 'bio':
					$newrules[$player_slug . '/([^/]+)/' . strtolower( trim( $bio_slug ) ) . '/?$'] = 'index.php?sp_player=$matches[1]&fpage=' . $slug;
				break;

				case 'news':
					$newrules[$player_slug . '/([^/]+)/' . strtolower( trim( $news_slug ) ) . '/?$'] = 'index.php?sp_player=$matches[1]&fpage=' . $slug;
				break;

				case 'gallery':
					$newrules[$player_slug . '/([^/]+)/' . strtolower( trim( $gallery_slug ) ) . '/?$'] = 'index.php?sp_player=$matches[1]&fpage=' . $slug;
				break;

			}
		}
		return $newrules + $rules;
	}
}

if ( ! function_exists( 'alchemists_insertqv' ) ) {
	add_filter('query_vars', 'alchemists_insertqv');

	// Tell WordPress to accept our custom query variable
	function alchemists_insertqv($vars) {
		array_push($vars, 'fpage');
		return $vars;
	}
}

if ( ! function_exists( 'alchemists_rel_canonical' ) ) {
	// Remove WordPress's default canonical handling function
	remove_filter('wp_head', 'rel_canonical');
	add_filter('wp_head', 'alchemists_rel_canonical');
	function alchemists_rel_canonical() {
		global $current_fp, $wp_the_query;

		if (!is_singular()) {
			return;
		}

		if (!$id = $wp_the_query->get_queried_object_id()) {
			return;
		}

		$link = trailingslashit(get_permalink($id));

		// Make sure sub pages' permalinks are canonical
		if (!empty($current_fp)) {
			$link .= user_trailingslashit($current_fp);
		}
		echo '<link rel="canonical" href="' . $link . '" />';
	}
}

if ( ! function_exists( 'alchemists_wpseo_canonical_exclude' ) ) {
	/* Yoast Canonical Removal from Single Player pages */
	add_filter( 'wpseo_canonical', 'alchemists_wpseo_canonical_exclude' );

	function alchemists_wpseo_canonical_exclude( $canonical ) {
		global $post;
		if ( is_singular('sp_player')) {
			$canonical = false;
		}
		return $canonical;
	}
}


/**
 * Single Team permalinks and titles
 */

if ( ! function_exists( 'alchemists_team_insertrules' ) ) {
	add_filter('rewrite_rules_array', 'alchemists_team_insertrules');

	// Adding sub pages' rewrite rules
	function alchemists_team_insertrules($rules) {

		$alchemists_data       = get_option('alchemists_data');
		$single_team_pages     = isset( $alchemists_data['alchemists__team-subpages']['enabled'] ) ? $alchemists_data['alchemists__team-subpages']['enabled'] : array( 'roster' => esc_html__( 'Roster', 'alchemists' ), 'standings' => esc_html__( 'Standings', 'alchemists' ), 'results' => esc_html__( 'Latest Results', 'alchemists' ), 'schedule' => esc_html__( 'Schedule', 'alchemists' ), 'gallery' => esc_html__( 'Gallery', 'alchemists' ));

		// Team subpages slugs
		$roster_slug           = isset( $alchemists_data['alchemists__team-subpages-slug--roster'] ) ? esc_html( $alchemists_data['alchemists__team-subpages-slug--roster'] ) : 'roster';
		$standings_slug        = isset( $alchemists_data['alchemists__team-subpages-slug--standings'] ) ? esc_html( $alchemists_data['alchemists__team-subpages-slug--standings'] ) : 'standings';
		$results_slug          = isset( $alchemists_data['alchemists__team-subpages-slug--results'] ) ? esc_html( $alchemists_data['alchemists__team-subpages-slug--results'] ) : 'results';
		$schedule_slug         = isset( $alchemists_data['alchemists__team-subpages-slug--schedule'] ) ? esc_html( $alchemists_data['alchemists__team-subpages-slug--schedule'] ) : 'schedule';
		$gallery_slug          = isset( $alchemists_data['alchemists__team-subpages-slug--gallery'] ) ? esc_html( $alchemists_data['alchemists__team-subpages-slug--gallery'] ) : 'gallery';

		// Team page slug
		$team_slug = get_option( 'sportspress_team_slug', 'team' );

		$newrules = array();
		foreach ( $single_team_pages as $slug => $title ) {

			switch ($slug) {
				case 'roster':
					$newrules[$team_slug . '/([^/]+)/' . strtolower( trim( $roster_slug ) ) . '/?$'] = 'index.php?sp_team=$matches[1]&teampage=' . $slug;
				break;

				case 'standings':
					$newrules[$team_slug . '/([^/]+)/' . strtolower( trim( $standings_slug ) ) . '/?$'] = 'index.php?sp_team=$matches[1]&teampage=' . $slug;
				break;

				case 'results':
					$newrules[$team_slug . '/([^/]+)/' . strtolower( trim( $results_slug ) ) . '/?$'] = 'index.php?sp_team=$matches[1]&teampage=' . $slug;
				break;

				case 'schedule':
					$newrules[$team_slug . '/([^/]+)/' . strtolower( trim( $schedule_slug ) ) . '/?$'] = 'index.php?sp_team=$matches[1]&teampage=' . $slug;
				break;

				case 'gallery':
					$newrules[$team_slug . '/([^/]+)/' . strtolower( trim( $gallery_slug ) ) . '/?$'] = 'index.php?sp_team=$matches[1]&teampage=' . $slug;
				break;
			}
		}
		return $newrules + $rules;
	}
}

if ( ! function_exists( 'alchemists_team_insertqv' ) ) {
	add_filter('query_vars', 'alchemists_team_insertqv');

	// Tell WordPress to accept our custom query variable
	function alchemists_team_insertqv($vars) {
		array_push($vars, 'teampage');
		return $vars;
	}
}


/**
 * Allow to remove method for an hook when, it's a class method used and class don't have variable, but you know the class name :)
 */
if ( ! function_exists( 'remove_filters_for_anonymous_class' ) ) {
	function remove_filters_for_anonymous_class( $hook_name = '', $class_name ='', $method_name = '', $priority = 0 ) {
		global $wp_filter;

		// Take only filters on right hook name and priority
		if ( !isset($wp_filter[$hook_name][$priority]) || !is_array($wp_filter[$hook_name][$priority]) )
			return false;

		// Loop on filters registered
		foreach( (array) $wp_filter[$hook_name][$priority] as $unique_id => $filter_array ) {
			// Test if filter is an array ! (always for class/method)
			if ( isset($filter_array['function']) && is_array($filter_array['function']) ) {
				// Test if object is a class, class and method is equal to param !
				if ( is_object($filter_array['function'][0]) && get_class($filter_array['function'][0]) && get_class($filter_array['function'][0]) == $class_name && $filter_array['function'][1] == $method_name ) {
						// Test for WordPress >= 4.7 WP_Hook class (https://make.wordpress.org/core/2016/09/08/wp_hook-next-generation-actions-and-filters/)
						if( is_a( $wp_filter[$hook_name], 'WP_Hook' ) ) {
								unset( $wp_filter[$hook_name]->callbacks[$priority][$unique_id] );
						}
						else {
							unset($wp_filter[$hook_name][$priority][$unique_id]);
						}
				}
			}

		}

		return false;
	}
}


/**
 * Remove additional content added by Sportspress
 */

// Single Team
remove_filters_for_anonymous_class( 'the_content', 'SP_Template_Loader', 'team_content', 10 );

// Single Staff
remove_filters_for_anonymous_class( 'the_content', 'SP_Template_Loader', 'staff_content', 10 );

// Single Player
remove_filters_for_anonymous_class( 'the_content', 'SP_Template_Loader', 'player_content', 10 );


/**
 * Get main result option
 */
if ( ! function_exists( 'alchemists_sportspress_primary_result' ) ) {
	function alchemists_sportspress_primary_result() {
		$primary_result = 'points';
		if ( get_option( 'sportspress_primary_result' ) != null ) {
			$primary_result = get_option( 'sportspress_primary_result' );
		}

		return $primary_result;
	}
}


/**
 * Adds plugins depends on selected Sport preset
 */
if ( ! function_exists( 'alchemists_sp_extension_plugins' ) ) {
	function alchemists_sp_extension_plugins() {
		$sport = sp_array_value( $_POST, 'sportspress_sport', get_option( 'sportspress_sport', null ) );
		if ( ! $sport ) return;

		$plugins = array();

		switch ( $sport ):
			case 'soccer':
				$plugins[] = array(
					'name'        => 'Alchemists Soccer for SportsPress',
					'slug'        => 'alc-soccer',
					'source'      => get_template_directory() . '/inc/plugins/alc-soccer.zip',
					'required'    => false,
					'version'     => '0.1.1',
				);
			break;
			case 'football':
				$plugins[] = array(
					'name'        => 'Alchemists American Football for SportsPress',
					'slug'        => 'alc-football',
					'source'      => get_template_directory() . '/inc/plugins/alc-football.zip',
					'required'    => false,
					'version'     => '0.2.0',
				);
			break;
		endswitch;

		$config = array(
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'is_automatic' => true,
			'message'      => '',
			'strings'      => array(
				'nag_type' => 'updated'
			)
		);

		tgmpa( $plugins, $config );
	}
}
add_action( 'tgmpa_register', 'alchemists_sp_extension_plugins' );



/**
 * Player: Circular Bar on Player Header Stats (player-statistics-avg.php)
 */
 if ( ! function_exists( 'alchemists_sp_player_circular_bar' ) ) {
	function alchemists_sp_player_circular_bar(
		$class = 'player-info-stats__item',
		$percent = 100,
		$line_width = 8,
		$track_color = '',
		$bar_color = '',
		$stat_value = '',
		$stat_label = '',
		$stat_sublabel = '' ) {

		$output = '<div class="' . esc_attr( $class ) . '">';
			$output .= '<div class="circular">';
				$output .= '<div class="circular__bar" data-percent="' . round( $percent ) . '" data-line-width="' . $line_width . '" data-track-color="' . $track_color . '" data-bar-color="' . $bar_color . '">';
					$output .= '<span class="circular__percents">' . $stat_value . '<small>' . esc_html__( 'avg', 'alchemists' ) . '</small></span>';
				$output .= '</div>';
				$output .= '<span class="circular__label">' . $stat_label;
					// $output .= $stat_sublabel ? $stat_sublabel : esc_html__( 'per game', 'alchemists' );
				$output .= '</span>';
			$output .= '</div>';
		$output .= '</div>';

		echo $output;
	}
}


/**
 * Filter SportsPress Statistics array
 */
if ( ! function_exists( 'alchemists_sp_filter_array' ) ) {
	function alchemists_sp_filter_array( $array_default = array(), $array_filter = array() ) {
		return array_reverse( array_intersect_key( $array_default, array_flip( $array_filter ) ) );
	}
}


/**
 * Get goals by player (Soccer)
 */
if ( ! function_exists( 'alchemists_sp_player_goal_output' ) ) {
	function alchemists_sp_player_goal_output( $goals = array(), $event_team_performances = array() ) {
		$output = '';
		$event_performance = $event_team_performances;

		// remove total
		unset( $event_performance[0] );

		foreach( $event_performance as $player_id => $player ) {
			if ( isset( $player[ $goals ] ) ) {
				if ( $player[ $goals ] >= 1 ) {
					$output .= '<span class="game-result__goal">';
						$output .= get_the_title( $player_id ) . ' - ' . $player[ $goals ];
					$output .= '</span>';
				}
			}
		}

		echo $output;
	}
}


/**
 * Create a new Performances array based on custom values from Theme Options
 */
if ( ! function_exists( 'alchemists_sp_get_performances_array' ) ) {
	function alchemists_sp_get_performances_array( $array_custom = array(), $array_output = array() ) {
		if ( $array_custom ) {
			foreach ( $array_custom as $key => $value) {
				$array_output[] = get_post_field( 'post_name', $array_custom[ $key ] );
			}
		}
		return $array_output;
	}
}


/**
 * Display percent value for Player Performance
 */
if ( ! function_exists( 'alchemists_sp_performance_percent' ) ) {
	function alchemists_sp_performance_percent( $team1_key = '', $team2_key = '' ) {

		if ( isset( $team1_key ) && !empty( $team1_key ) ) {
			$event_team1_percent = $team1_key;
		} else {
			$event_team1_percent = 0;
		}

		if ( isset( $team2_key ) && !empty( $team2_key ) ) {
			$event_team2_percent = $team2_key;
		} else {
			$event_team2_percent = 0;
		}

		$event_total_percent = $event_team1_percent + $event_team2_percent;
		if ( $event_total_percent <= 0 ) {
			$event_total_percent = 1;
		}

		$output = round( ( $event_team1_percent / $event_total_percent ) * 100 );

		return $output;
	}
}


/**
 * Check if field exists and not empty
 */
if ( ! function_exists( 'alchemists_check_exists_not_empty' ) ) {
	function alchemists_check_exists_not_empty( $field = '' ) {

		if ( isset( $field ) && !empty( $field ) ) {
			$field_output = $field;
		} else {
			$field_output = 0;
		}

		return $field_output;
	}
}


/**
 * Display proper value depends on type of Player Performance
 */
if ( ! function_exists( 'alchemists_sp_get_performances_based_on_format' ) ) {
	function alchemists_sp_get_performances_based_on_format( $format = '', $team1_key = '', $team2_key = '' ) {

		if ( $format == 'number' ) {
			$output = alchemists_sp_performance_percent( $team1_key, $team2_key );
		} else {
			if ( isset( $team1_key ) && ! empty( $team1_key ) ) {
				$output = $team1_key;
			} else {
				$output = '';
			}
		}

		return $output;
	}
}


// Dequeue scripts
if( !function_exists( 'alchemists_remove_sp_pro_scripts' ) ) {
	function alchemists_remove_sp_pro_scripts() {
		wp_dequeue_script('sportspress-scoreboard');
		wp_dequeue_style('sportspress-scoreboard');
		wp_dequeue_style('sportspress-scoreboard-rtl');
		wp_dequeue_style('sportspress-scoreboard-ltr');
	}
	add_action( 'wp_enqueue_scripts', 'alchemists_remove_sp_pro_scripts' );
}

// Removes Team Colors
if ( class_exists('SportsPress_Team_Colors')) {
	if( !function_exists( 'alchemists_remove_teamcolors_metaboxes' ) ) {
		function alchemists_remove_teamcolors_metaboxes() {
			remove_meta_box( 'sp_colorssdiv', 'sp_team', 'normal' );
		}
		add_action( 'do_meta_boxes' , 'alchemists_remove_teamcolors_metaboxes' );
	}
}
