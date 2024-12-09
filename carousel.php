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
	// Debugging statement
    error_log('genere_HTML function called');
	
    $html = '
        <!-- Prototype de Carousel -->
        <div class="carousel">
            <figure id="spinner">
                <!-- Carte 1 -->
                <div class="flip-card no1">
                    <div class="inner-flip">
                        <div class="front-flip">
                            <img src="https://gftnth00.mywhc.ca/tim17/wp-content/uploads/2024/11/NeedTwoSurviveImg1.png" alt="NeedTwoSurvive" class="image">
                        </div>
                        <div class="flip-card-back">
                            <h1>NeedTwoSurvive!</h1>
                            <p>Need Two Survive est un jeu d&#39;horreur créé avec Unity 3D, conçu en équipe dans le cadre du cours de &quot;Création de jeu en équipe&quot;. Le jeu mélange habilement horreur et humour, créant un contraste où la tension est parfois relâchée avant d’être brutalement augmentée par des scènes de gore choquantes. Ce jeu coopératif à ...<a href="https://gftnth00.mywhc.ca/tim17/need-two-survive/" class="read-more">Lire la suite</a></p>
                        </div>
                    </div>
                </div>
                <!-- Carte 2 -->
                <div class="flip-card no2">
                    <div class="inner-flip">
                        <div class="front-flip">
                            <img src="https://gftnth00.mywhc.ca/tim17/wp-content/uploads/2024/11/TriptyqueImg1.png" alt="Triptyque" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Triptyque</h1>
                        <p>Triptyque est un projet réalisé dans le cadre du cours d&#39;animation 3D, axé sur la création de personnages optimisés pour un jeu vidéo, à l&#39;aide du logiciel Autodesk Maya. L&#39;objectif était de modéliser des personnages en respectant des contraintes de résolutions et de polygones, afin d&#39;obtenir la plus haute fidélité graphique tout en garantissant des performances ... <a href="https://gftnth00.mywhc.ca/tim17/triptyque/" class="read-more">Lire la suite</a></p>
                    </div>
                </div>
            </div>
            <!-- Carte 3 -->
            <div class="flip-card no3">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://gftnth00.mywhc.ca/tim17/wp-content/uploads/2024/11/GraviteImg1.png" alt="Gravite" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Gravité</h1>
                        <p>Le projet est un jeu 2D développé dans le cadre du cours &quot;Création de jeu 2D&quot;, inspiré du célèbre jeu Portal. L&#39;objectif principal est de résoudre divers puzzles en contrôlant la direction de la gravité, ce qui permet de manipuler l&#39;environnement et d&#39;interagir avec les objets de manière unique pour progresser...<a href="https://gftnth00.mywhc.ca/tim17/gravite/" class="read-more">Lire la suite</a></p>
                    </div>
                </div>
            </div>

            <!-- Carte 4 -->
            <div class="flip-card no4">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://gftnth00.mywhc.ca/tim17/wp-content/uploads/2024/11/SousLesFeuillesImg1.png" alt="Sous les feuilles" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Sous les feuilles</h1>
                        <p>Sous les feuilles est une courte animation réalisée dans le cadre du cours d&#39;effets spéciaux et animation. Dans cette œuvre, un champignon est le personnage principal, qui s&#39;adonne à la pêche dans un environnement naturel. L&#39;outil Marionnette d&#39;After Effects a été utilisé pour animer le champignon de manière fluide et expressive...<a href="https://gftnth00.mywhc.ca/tim17/sous-les-feuilles/" class="read-more">Lire la suite</a></p>
                    </div>
                </div>
            </div>
            
            <!-- Carte 5 -->
            <div class="flip-card no5">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://gftnth00.mywhc.ca/tim17/wp-content/uploads/2024/11/AnacroniqueImg1.png" alt="Anachronique" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Anachronique</h1>
                        <p>Anacronique est un projet d&#39;imagerie 3D réalisé dans le cadre du cours de modélisation, où l&#39;objectif était de concevoir deux véhicules pour des personnages dans un univers fictif. Ce projet, réalisé avec Autodesk Maya, se concentre sur l&#39;apprentissage de la modélisation 3D, où chaque modèle créé doit raconter...<a href="https://gftnth00.mywhc.ca/tim17/anachronique/" class="read-more">Lire la suite</a></p>
                    </div>
                </div>
            </div>

            <!-- Carte 6 -->
            <div class="flip-card no6">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://gftnth00.mywhc.ca/tim17/wp-content/uploads/2024/11/KamisaiImg1.png" alt="Kamisaï" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Kamisaï</h1>
                        <p>Kamisaï est un jeu d&#39;aventure créé en équipe pour le cours de &quot;Création de jeu en équipe&quot;. Le style visuel du jeu s&#39;inspire de la peinture à l&#39;eau et des couleurs pastelles, offrant une ambiance douce et poétique. Le but du jeu est de retrouver le frère du personnage principal... <a href="https://gftnth00.mywhc.ca/tim17/kamisai/" class="read-more">Lire la suite</a></p>
                    </div>
                </div>
            </div>

            <!-- Carte 7 -->
            <div class="flip-card no7">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://gftnth00.mywhc.ca/tim17/wp-content/uploads/2024/11/GuinodeImg1.png" alt="Guinode" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Guinode</h1>
                        <p>Le projet est un jeu de puzzle en 2D développé avec Unity dans le cadre du cours de &quot;Création de jeu 2D&quot;. Le joueur doit déplacer des cristaux, qui servent de source d&#39;énergie, pour activer des téléporteurs permettant de se déplacer à travers les niveaux. L&#39;objectif final est d&#39;alimenter un portail qui permet de passer ...<a href="https://gftnth00.mywhc.ca/tim17/guinode/" class="read-more">Lire la suite</a></p>
                    </div>
                </div>
            </div>

            <!-- Carte 8 -->
            <div class="flip-card no8">
                <div class="inner-flip">
                    <div class="front-flip">
                        <img src="https://gftnth00.mywhc.ca/tim17/wp-content/uploads/2024/11/LeMalfaisantARouletteImg1.png" alt="Le malfaisant à roulettes" class="image">
                    </div>
                    <div class="flip-card-back">
                        <h1>Le malfaisant à roulettes</h1>
                        <p>Malfaiteur à Roulette est un jeu 2D développé en JavaScript, qui sert d&#39;excellent exemple des compétences acquises au cours de la première session de TIM. Dans ce jeu, le joueur incarne un malfaiteur en fuite, poursuivi par la police sur une autoroute. L&#39;objectif est...<a href="https://gftnth00.mywhc.ca/tim17/le-malfaiteur-a-roulette/" class="read-more">Lire la suite</a></p>
                    </div>
                </div>
            </div>
            </figure>
        </div>

        <div id="boutons">
            <!-- Boutons -->
            <button class="prev1"><p>&lt;</p></button>
            <button class="next1"><p>&gt;</p></button>
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
