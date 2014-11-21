<?php namespace UWAA;


class Images {

    /** @var [array] [description] */
    private $imageDetails = [];
    private $postThumbnailSize = [];

    function __construct()
    {
        $this->addUWAAImageSizes();
        add_action('after_setup_theme', array($this, 'register_UWAA_image_sizes'));        

    }

    private function addUWAAImageSizes() {

        $this->imageDetails = array (

            'postExcerptRowOfFive' => array (
                'name'  => 'Row Of Five Excerpt',
                'width'  => 215,
                'height'  => 155,
                'crop'  => array (
                    'x_crop_position' => 'center',
                    'y_crop_position' => 'center'
                    ),
                'show'  => false
                ),
            'gridViewNoSidebar' => array (
                'name'  => 'Grid Thumbnail - No Sidebar',
                'width'  => 275,
                'height'  => 190,
                'crop'  => array (
                    'x_crop_position' => 'center',
                    'y_crop_position' => 'center'
                    ),
                'show'  => false
                ),
            'gridViewWithSidebar' => array (
                'name'  => 'Grid Thumbnail - With Sidebar',
                'width'  => 186,
                'height'  => 130,
                'crop'  => array (
                    'x_crop_position' => 'center',
                    'y_crop_position' => 'center'
                    ),
                'show'  => false
                ),
            'communitiesProfileHeadshot' => array (
                'name'  => 'Communities Section Headshot',
                'width'  => 186,
                'height'  => 212,
                'crop'  => array (
                    'x_crop_position' => 'center',
                    'y_crop_position' => 'center'
                    ),
                'show'  => false
                )
        );
        
        //This is the Featured Image crop that for the sidebar.
        $this->postThumbnailSize = array (
            'height' => '302',
            'width' => '190',
            'crop' => 'false'  //boolean.  True to hard crop, false to soft (proportional).

            );

    }

     public function register_UWAA_image_sizes()
    {
      
      foreach ($this->imageDetails as $imageDetail=>$image )
      {
        add_image_size(
        $imageDetail,
        $image['width'],
        $image['height'],
        array($image['crop']['x_crop_position'], $image['crop']['x_crop_position'])
        );
      } 

      set_post_thumbnail_size($this->postThumbnailSize);
    }







}