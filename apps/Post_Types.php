<?php
require 'Post_Type.php';
class Post_Types {
  public static $brands, $shops;
  public static function init() {
    self::$brands = new Post_Type(
      'brands',
      array(
        'name' => 'Brand',
        'type_options' => array(
          'supports' => array('title', 'editor', 'comments'),
          'rewrite' => array('slug' => 'marcas'),
        ),
      )
    );

    self::$shops = new Post_Type(
      'shops',
      array(
        'name' => 'Shops',
        'type_options' => array(
          'supports' => array('title', 'editor', 'comments'),
          'rewrite' => array('slug' => 'tiendas'),
        ),
      )
    );

  }
}

Post_Types::init();
