<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5fc3b4d2482e9',
        'title' => 'Team TreeHouse Portfolio',
        'fields' => array(
            array(
                'key' => 'field_5fc3b4e0240e5',
                'label' => 'What s the name linked to your TreeHouse URL?',
                'name' => 'what_is_your_treehouse_name',
                'type' => 'text',
                'instructions' => 'https://teamtreehouse.com/nameToGrab',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'nameToGrab',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5fc3b59c1ab59',
                'label' => 'Show Badges?',
                'name' => 'show_badges',
                'type' => 'button_group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_5fc3b5d11ab5a',
                'label' => 'Show Profile Name?',
                'name' => 'show_profile_name',
                'type' => 'button_group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ),
                'allow_null' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
                'return_format' => 'value',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/acf-block-treehouse-portfolio-',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;
?>