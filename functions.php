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

        // título
        $wp_customize->add_setting( 'titulo', array(
            'capability' => 'edit_theme_options',
            'default' => 'Título',
            'sanitize_callback' => 'sanitize_text_field',
          ) );
          
        $wp_customize->add_control( 'titulo', array(
            'type' => 'text',
            'section' => 'mytheme_header_options', // Add a default or your own section
            'label' => __( 'Título de la web' ),
            'description' => __( 'Aquí se pone el título de la web.' ),
          ) );

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

        $font_choices = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);

        $wp_customize->add_setting( 'selector_fuente',
            array(
                'default'    => 'default',
                'type'       => 'theme_mod',
                'capability' => 'edit_theme_options',
            ) 
            );

            $wp_customize->add_control( new WP_Customize_Control(
                $wp_customize,
                'mytheme',
                array(
                   'label'      => __( 'Select Theme Name', 'mytheme' ),
                   'description' => __( 'Using this option you can change the theme colors' ),
                   'settings'   => 'selector_fuente',
                   'priority'   => 10,
                   'section'    => 'mytheme_header_options',
                   'type'    => 'select',
                   'choices' => $font_choices
               )
               ) );


        

    }
    
?>