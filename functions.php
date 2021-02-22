<?php
    add_action( 'customize_register' , 'my_theme_options' );

    function my_theme_options( $wp_customize ) {
        // Panel Encabezado
        $wp_customize->add_section( 
        'mytheme_header_options', 
            array(
                'title'       => __( 'Encabezado', 'mytheme' ),
                'priority'    => 100,
                'capability'  => 'edit_theme_options',
                'description' => __('Cambia las opciones del encabezado desde aquí.', 'mytheme'), 
            ) 
        );
    
        // logo
        $wp_customize->add_setting( 'image',
	        array(
	        )
        );
        
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'logo',
                array(
                    'label'      => __( 'Añade un logo' ),
                    'section'    => 'mytheme_header_options',
                    'settings'   => 'image',
                    'context'    => 'mytheme_header_options'
                )
            )
        );

        // Background color
        $wp_customize->add_setting( 'header_bg_color',
	        array(
		        'default' => 'f1f1f1'
	        )
        );
        
        $wp_customize->add_control( new WP_Customize_Color_Control( 
            $wp_customize, 
            'header_bg_color_control',
            array(
                'label'    => __( 'Color de fondo del encabezado', 'mytheme' ), 
                'section'  => 'mytheme_header_options',
                'settings' => 'header_bg_color',
                'priority' => 10,
            ) 
        ));
        
        // Options branding
        $wp_customize->add_setting('brand', array(
            'default'    => 'nombre'
        ));
        
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'mytheme_header_options',
                array(
                    'label'          => __( 'Brand en la barra de navegación', 'mytheme' ),
                    'section'        => 'mytheme_header_options',
                    'settings'       => 'brand',
                    'type'           => 'radio',
                    'choices'        => array(
                        'logo'   => __( 'Logo' ),
                        'nombre'  => __( 'Nombre' ),
                        'nada'  => __( 'Nada' )
                    )
                )
            )
        );

    }
    
?>