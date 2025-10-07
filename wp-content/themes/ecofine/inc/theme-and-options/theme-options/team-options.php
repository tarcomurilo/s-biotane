<?php
//Team Page Options
CSF::createSection($EcofineThemeOption, array(
    'title'  => esc_html__('Team Page', 'ecofine'),
    'icon'   => 'fa fa-users',
    'fields' => array(
        array(
            'id'       => 'ecofine_team_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Banner', 'ecofine'),
            'default'  => true,
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide / Show Banner.', 'ecofine'),
        ),
        array(
            'id'         => 'ecofine_team_title',
            'type'       => 'text',
            'title'      => esc_html__('Banner Title', 'ecofine'),
            'default'    => esc_html('Team Details','ecofine'),
            'dependency' => array( 'ecofine_team_banner_enable', '==', 'true' ),
            'desc'       => esc_html__('Type team banner title here.', 'ecofine'),
        ),
        array(
            'id'         => 'ecofine_team_custom_slug',
            'type'       => 'text',
            'title'      => esc_html__('Custom Slug', 'ecofine'),
            'default'    => esc_html('ecofine-team','ecofine'),
        ),
    )
));