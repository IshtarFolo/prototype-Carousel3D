<?php

/**
 * Plugin Name: Carousel
 * Author: Xavier Arbour
 * Description: Affiche le carrousel associé à la galerie wordpress
 * Version: 1.0
 * Plugin URI: 
 * Author URI: httsp://referenced.ca.
 * 
 */

// Evalution des versions 
function enqueue_style_script()
{
    $version_css = filemtime(plugin_dir_path(__FILE__) . "css/carousel-style.css");
    $version_js = filemtime(plugin_dir_path(__FILE__) . "js/carousel.js");
	

    /*
        version http (link) de la feuille de style avec nouveau nom unique a chaque
        mod du fichier pcq date de creation change
    */
    wp_enqueue_style(
        'em_plugin_carrousel_css',
        plugin_dir_url(__FILE__) . "css/carousel-style.css",
        array(),
        $version_css
    );

    /*
        Meme chose ici avec carrousel.js, on s'assure aussi que script est ajoute
        a la fin de la page
    */
    wp_enqueue_script(
        'em_plugin_carousel_js',
        plugin_dir_url(__FILE__) . "js/carousel.js",
        array(),
        $version_js,
        true
    );
}

// Ajout des scripts js et css dans le header/ footer
add_action('wp_enqueue_scripts', 'enqueue_style_script');

// Genere le code html du carrousel
function genere_HTML()
{
    $html = '
        <!-- Prototype de Carousel -->
        <div class="carousel">
            <figure id="spinner">
                <!-- Carte 1 -->
                <div class="flip-card no1">
                    <div class="inner-flip">
                        <div class="front-flip">
                            <img src="https://via.placeholder.com/150" alt="Image 1" class="image">
                        </div>
                        <div class="flip-card-back">
                            <h1>Carte Ici!</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, ...</p>
                        </div>
                    </div>
                </div>
                <!-- Carte 2 -->
                <div class="flip-card no2">
                    <div class="inner-flip">
                        <div class="front-flip">
                            <img src="https://via.placeholder.com/150" alt="Image 2" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Carte Ici!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, ...</p>
                    </div>
                </div>
            </div>
            <!-- Carte 3 -->
            <div class="flip-card no3">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://via.placeholder.com/150" alt="Image 3" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Carte Ici!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, ...</p>
                    </div>
                </div>
            </div>

            <!-- Carte 4 -->
            <div class="flip-card no4">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://via.placeholder.com/150" alt="Image 4" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Carte Ici!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, ...</p>
                    </div>
                </div>
            </div>
            
            <!-- Carte 5 -->
            <div class="flip-card no5">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://via.placeholder.com/150" alt="Image 5" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Carte Ici!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, ...</p>
                    </div>
                </div>
            </div>

            <!-- Carte 6 -->
            <div class="flip-card no6">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://via.placeholder.com/150" alt="Image 6" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Carte Ici!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, ...</p>
                    </div>
                </div>
            </div>

            <!-- Carte 7 -->
            <div class="flip-card no7">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://via.placeholder.com/150" alt="Image 7" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Carte Ici!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, ...</p>
                    </div>
                </div>
            </div>

            <!-- Carte 8 -->
            <div class="flip-card no8">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://via.placeholder.com/150" alt="Image 8" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Carte Ici!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, ...</p>
                    </div>
                </div>
            </div>
            </figure>
        </div>

        <div id="boutons">
            <!-- Boutons -->
            <button class="prev">Prev</button>
            <button class="next">Next</button>
        </div>';
    return $html;
}

// Ajout a la page avec le bon string --> carrousel ici
add_shortcode('carousel', 'genere_HTML');

// Retire la marge en haut de la barre admin
// [carrousel] juste apres la galerie dans l'article
// Quand la fonction the_content() rencontre [carrousel] c'est a ce moment
// que le carrousel est initialise. 
add_theme_support('admin-bar', array('callback' => '__return_false'));
