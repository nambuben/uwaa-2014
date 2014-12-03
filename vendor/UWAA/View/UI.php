<?php namespace UWAA\View;

class UI
{

    //TODO  Make this not horrible.  An actual interface?  
    function __construct() 
    {
        $this->initShortcodes();
    }

    //TODO abstract this we only sends data for Isotope to chew on and render, as opposed to building HTML here. 

    public function buildSortingToolbar($taxonomyName){
        
        echo '<p><input type="text" id="quicksearch" placeholder="Search Tours" /></p>';

        echo '<div id="filters" class="button-group">';



        //This builds a clear-filters button  (passes a blank filter to Isotope)
        echo '<button class="button btn filter-button" data-filter="">Clear Filters</button>';
        $terms = get_terms("$taxonomyName");
        if ( !empty( $terms ) && !is_wp_error( $terms ) ) :
            foreach ( $terms as $term ) {
                echo sprintf('<button class="button btn filter-button" data-filter=".%s">%s</button>', strtolower($term->slug), $term->name);
        }
        echo '</div>';
        echo '<button class="button btn list-button">List View</button>';
        echo '<button class="button btn tile-button">Tile View</button>';
        
        
        endif;
    }

    private function initShortcodes(){
        new Shortcodes\Button();
    }

    public function getPostFeaturedImageURL($id, $size)
    {
        
        $url = wp_get_attachment_image_src($id, $size);
        echo($url[0]);
    }

      public function returnPostFeaturedImageURL($id, $size)
    {
        
        $url = wp_get_attachment_image_src($id, $size);
        return($url[0]);
    }

    // public function renderPullQuote($id)
    // {
    //     $stuff = "placeholder";
    //     $template = get_template_part( 'partials/pull-quote.php' );
    //     echo $template;

    // }




} 