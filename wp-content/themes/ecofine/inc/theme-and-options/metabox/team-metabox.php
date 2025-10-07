<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$teammeta = 'ecofine_teammeta';

//
// Create a metabox
//
CSF::createMetabox( $teammeta, array(
    'title'        => esc_html__( 'Team Options', 'ecofine' ),
    'post_type'    => array( 'ecofine_team' ),
    'show_restore' => true,
) );

//
// Create a section
//
CSF::createSection( $teammeta, array(
    'title'  => esc_html__( 'Team Member Options', 'ecofine' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'ecofine_team_stitle',
            'type'     => 'text',
            'title'    => esc_html__( 'Designation', 'ecofine' ),
            'subtitle' => esc_html__( 'Add Team Designation here', 'ecofine' ),
            'default'  => esc_html__( 'Software Engineer', 'ecofine' ),
        ),
         array(
            'id'       => 'ecofine_team_description',
            'type'     => 'textarea',
            'title'    => esc_html__( 'Designation', 'ecofine' ),
            'subtitle' => esc_html__( 'Add Team Designation here', 'ecofine' ),
            'default'  => esc_html__( 'A naturalist is a person who studies the natural world, including plants, animals, and their environments. They may have a background in biology.', 'ecofine' ),
        ),
        
         //------- Eco Team Details Info ----------
        
        array(
            'id'       => 'ecofine_team_info',
            'type'     => 'group',
            'title'    => esc_html__( 'Team Info Box', 'ecofine' ),
            'subtitle' => esc_html__( 'Add Team Members Info here', 'ecofine' ),
            'fields'   => array(
                array(
                    'id'       => 'ecofine_team_info_label',
                    'type'     => 'text',
                    'title'    => esc_html__( 'label', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add info Label Here', 'ecofine' ),
                    'default'  => esc_html__( 'Email', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_team_info_content',
                    'type'     => 'wp_editor',
                    'title'    => esc_html__( 'Content', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Team Content Here', 'ecofine' ),
                    'default'  => esc_html__( 'support@demo.com', 'ecofine' ),
                ),
            ),
            'default'  => array(
                array(
                    'ecofine_team_info_label'   => esc_html__( 'Email:', 'ecofine' ),
                    'ecofine_team_info_content' => esc_html__( 'support@demo.com', 'ecofine' ),
                ),
                array(
                    'ecofine_team_info_label'   => esc_html__( 'Phone:', 'ecofine' ),
                    'ecofine_team_info_content' => esc_html__( '+90 122 456 78', 'ecofine' ),
                ),
                 array(
                    'ecofine_team_info_label'   => esc_html__( 'Webiste:', 'ecofine' ),
                    'ecofine_team_info_content' => esc_html__( 'WWW.Youwebsite.com', 'ecofine' ),
                ),
                 array(
                    'ecofine_team_info_label'   => esc_html__( 'Address:', 'ecofine' ),
                    'ecofine_team_info_content' => esc_html__( ' 8502 Preston Rd. Inglewood, Maine London', 'ecofine' ),
                ),
            ),
        ),
    
        //------- Social Inpul ----------
        
        array(
            'id'        => 'ecofine_team_socials',
            'type'      => 'group',
            'title'     => esc_html__( 'Social Links', 'ecofine' ),
            'subtitle'     => esc_html__( 'Social Options Groups', 'ecofine' ),
            'fields'    => array(
                array(
                    'id'       => 'ecofine_team_social_label',
                    'type'     => 'text',
                    'title'    => esc_html__( 'label', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Social label Name', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_teams_social_icon',
                    'type'     => 'icon',
                    'title'    => esc_html__( 'Icon', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Social Icon', 'ecofine' ),
                    'default'  => 'fa fa-facebook',
                ),
                array(
                    'id'       => 'ecofine_teams_social_url',
                    'type'     => 'link',
                    'title'    => 'Link',
                    'default'  => array(
                      'url'    => 'facebook.com',
                      'target' => '_blank'
                    ),
                ),
            ),
            'default'   => array(
              array(
                'ecofine_team_social_label' => esc_html__( 'Facebook', 'ecofine' ),
                'ecofine_teams_social_icon' => 'fab fa-facebook-f',
                'ecofine_teams_social_url' => 'facebook.com',
              ),
              array(
                'ecofine_team_social_label' => esc_html__( 'Twitter', 'ecofine' ),
                'ecofine_teams_social_icon' => 'fab fa-twitter',
                'ecofine_teams_social_url' => 'twotter.com',
              ),
              array(
                'ecofine_team_social_label' => esc_html__( 'Linkedin', 'ecofine' ),
                'ecofine_teams_social_icon' => 'fab fa-linkedin-in',
                'ecofine_teams_social_url' => 'twotter.com',
              ),
              array(
                'ecofine_team_social_label' => esc_html__( 'instagram ', 'ecofine' ),
                'ecofine_teams_social_icon' => 'fab fa-instagram',
                'ecofine_teams_social_url' => 'instagram.com',
              ),
            ),
        ),
    ),
) );