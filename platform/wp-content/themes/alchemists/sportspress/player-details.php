<?php
/**
 * Player Details
 *
 * @author    ThemeBoy
 * @package   SportsPress/Templates
 * @version   2.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( get_option( 'sportspress_player_show_details', 'yes' ) === 'no' ) return;

if ( ! isset( $id ) )
	$id = get_the_ID();

$defaults = array(
	'show_number' => get_option( 'sportspress_player_show_number', 'no' ) == 'yes' ? true : false,
	'show_name' => get_option( 'sportspress_player_show_name', 'no' ) == 'yes' ? true : false,
	'show_nationality' => get_option( 'sportspress_player_show_nationality', 'yes' ) == 'yes' ? true : false,
	'show_positions' => get_option( 'sportspress_player_show_positions', 'yes' ) == 'yes' ? true : false,
	'show_current_teams' => get_option( 'sportspress_player_show_current_teams', 'yes' ) == 'yes' ? true : false,
	'show_past_teams' => get_option( 'sportspress_player_show_past_teams', 'yes' ) == 'yes' ? true : false,
	'show_leagues' => get_option( 'sportspress_player_show_leagues', 'no' ) == 'yes' ? true : false,
	'show_seasons' => get_option( 'sportspress_player_show_seasons', 'no' ) == 'yes' ? true : false,
	'show_nationality_flags' => get_option( 'sportspress_player_show_flags', 'yes' ) == 'yes' ? true : false,
	'abbreviate_teams' => get_option( 'sportspress_abbreviate_teams', 'yes' ) === 'yes' ? true : false,
	'link_teams' => get_option( 'sportspress_link_teams', 'no' ) == 'yes' ? true : false,
);

extract( $defaults, EXTR_SKIP );

$countries = SP()->countries->countries;

$player = new SP_Player( $id );

$metrics_before = $player->metrics( true );
$metrics_after = $player->metrics( false );

$common = array();

if ( $show_number ):
	$common[ '#' ] = $player->number;
endif;

if ( $show_name ):
	$common[ esc_html__( 'Name', 'alchemists' ) ] = $player->post->post_title;
endif;

if ( $show_nationality ):
	$nationalities = $player->nationalities();
	if ( $nationalities && is_array( $nationalities ) ):
		$values = array();
		foreach ( $nationalities as $nationality ):
			$country_name = sp_array_value( $countries, $nationality, null );
			$values[] = $country_name ? ( $show_nationality_flags ? '<img src="' . plugin_dir_url( SP_PLUGIN_FILE ) . 'assets/images/flags/' . strtolower( $nationality ) . '.png" alt="' . $nationality . '"> ' : '' ) . $country_name : '&mdash;';
		endforeach;
		$common[ esc_html__( 'Nationality', 'alchemists' ) ] = implode( '<br>', $values );
	endif;
endif;

if ( $show_positions ):
	$positions = $player->positions();
	if ( $positions && is_array( $positions ) ):
		$position_names = array();
		foreach ( $positions as $position ):
			$position_names[] = $position->name;
		endforeach;
		$common[ esc_html__( 'Position', 'alchemists' ) ] = implode( ', ', $position_names );
	endif;
endif;

$data = array_merge( $metrics_before, $common, $metrics_after );

if ( $show_current_teams ):
	$current_teams = $player->current_teams();
	if ( $current_teams ):
		$teams = array();
		foreach ( $current_teams as $team ):
			$team_name = sp_get_team_name( $team, $abbreviate_teams );
			if ( $link_teams ) $team_name = '<a href="' . get_post_permalink( $team ) . '">' . $team_name . '</a>';
			$teams[] = $team_name;
		endforeach;
		$data[ esc_html__( 'Current Team', 'alchemists' ) ] = implode( ', ', $teams );
	endif;
endif;

if ( $show_past_teams ):
	$past_teams = $player->past_teams();
	if ( $past_teams ):
		$teams = array();
		foreach ( $past_teams as $team ):
			$team_name = sp_get_team_name( $team, $abbreviate_teams );
			if ( $link_teams ) $team_name = '<a href="' . get_post_permalink( $team ) . '">' . $team_name . '</a>';
			$teams[] = $team_name;
		endforeach;
		$data[ esc_html__( 'Past Teams', 'alchemists' ) ] = implode( ', ', $teams );
	endif;
endif;

if ( $show_leagues ):
	$leagues = $player->leagues();
	if ( $leagues && ! is_wp_error( $leagues ) ):
		$terms = array();
		foreach ( $leagues as $league ) {
			$terms[] = $league->name;
		}
		$data[ esc_html__( 'Competitions', 'alchemists' ) ] = implode( ', ', $terms );
	endif;
endif;

if ( $show_seasons ):
	$seasons = $player->seasons();
	if ( $seasons && ! is_wp_error( $seasons ) ):
		$terms = array();
		foreach ( $seasons as $season ) {
			$terms[] = $season->name;
		}
		$data[ esc_html__( 'Seasons', 'alchemists' ) ] = implode( ', ', $terms );
	endif;
endif;

$data = apply_filters( 'sportspress_player_details', $data, $id );

if ( empty( $data ) )
	return;

$output = '<div class="sp-template sp-template-player-details card sp-template-details"><div class="sp-list-wrapper"><div class="card__content"><dl class="sp-player-details">';

foreach( $data as $label => $value ):

	$output .= '<dt>' . $label . '</dt><dd>' . $value . '</dd>';

endforeach;

$output .= '</dl></div></div></div>';

echo wp_kses_post( $output );
