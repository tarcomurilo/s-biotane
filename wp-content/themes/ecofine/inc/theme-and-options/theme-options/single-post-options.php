<?php
//Single Post
CSF::createSection($EcofineThemeOption, array(
    'parent' => 'ecofine_page_options',
    'title'  => esc_html__('Single Post / Post Details', 'ecofine'),
    'icon'   => 'fa fa-pencil',
    'fields' => array(
        array(
            'id'       => 'ecofine_single_post_author',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Author Name', 'ecofine'),
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide or show author name on post details page.', 'ecofine'),
            'default'  => true
        ),
        array(
            'id'       => 'ecofine_single_post_date',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Date', 'ecofine'),
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide or show date on post details page.', 'ecofine'),
            'default'  => true
        ),

        array(
            'id'       => 'ecofine_single_post_cmnt',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Comments Number', 'ecofine'),
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide or show comments number on post details page.', 'ecofine'),
            'default'  => true
        ),

        array(
            'id'       => 'ecofine_single_post_cat',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Categories', 'ecofine'),
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide or show categories on post details page.', 'ecofine'),
            'default'  => true
        ),

        array(
            'id'       => 'ecofine_single_post_tag',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Tags', 'ecofine'),
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide or show tags on post details page.', 'ecofine'),
            'default'  => true
        ),
        array(
            'id'       => 'ecofine_post_top_share',
            'type'     => 'switcher',
            'title'    => esc_html__('Top Social Share icons', 'ecofine'),
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide or show social share icons on post details page.', 'ecofine'),
            'default'  => false
        ),
        array(
            'id'       => 'ecofine_post_share',
            'type'     => 'switcher',
            'title'    => esc_html__('Social Share icons', 'ecofine'),
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide or show social share icons on post details page.', 'ecofine'),
            'default'  => false
        ),
       
    ),
));