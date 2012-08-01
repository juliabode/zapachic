<?php
require_once 'Taxonomy.php';
class Taxonomies {
  public static $club, $campaignTag, $shop_category, $city, $merchantCategory, $dealCategory, $merchant, $brand, $vendorCategory, $airline, $fare_category, $articleCategory, $voucherCategory, $vendorTaxonomy;
  public static function init() {
    static::$club = new Taxonomy(
      'club',
      array(
        'name' => 'Shoppingclub',
        'post_types' => array('campaign'),
      )
    );

    static::$campaignTag = new Taxonomy(
      'campaign_tag',
      array(
        'name' => 'Tag',
        'post_types' => array('campaign'),
      )
    );

    static::$shop_category = new Taxonomy(
      'shopcategory',
      array(
        'name' => 'Shop Category',
        'post_types' => array('shoppingclub'),
      )
    );

    static::$city = new Taxonomy(
      'city',
      array(
        'name'         => 'City',
        'post_types'   => array('site', 'deal'),
        'hierarchical' => true,
      )
    );

    static::$merchantCategory = new Taxonomy(
      'merchantcategory',
      array(
        'name'       => 'Category',
        'post_types' => array('site'),
      )
    );

    static::$dealCategory = new Taxonomy(
      'dealcategory',
      array(
        'name'       => 'Category',
        'post_types' => array('deal'),
      )
    );

    static::$merchant = new Taxonomy(
      'merchant',
      array(
        'name'       => 'Merchant',
        'post_types' => array('deal'),
      )
    );

    static::$brand = new Taxonomy(
      'brand',
      array(
        'name'       => 'Brand',
        'post_types' => array('vendor'),
      )
    );

    static::$vendorCategory = new Taxonomy(
      'vendor_category',
      array(
        'name'       => 'Vendor Category',
        'post_types' => array('vendor', 'page'),
        'rewrite'    => array(
          'slug' => Dealies::config('vendor_category_slug') ?: 'vendors',
        ),
      )
    );

    static::$vendorCategory = new Taxonomy(
      'page_tag',
      array(
        'name'       => 'Tag',
        'post_types' => array('page'),
        'rewrite'    => array(
          'slug' => 'page-tag',
        ),
      )
    );

    static::$airline = new Taxonomy(
      'airline',
      array(
        'name' => 'Airline',
        'post_types' => array('promo_fare'),
      )
    );

    static::$fare_category = new Taxonomy(
      'fare_category',
      array(
        'name' => 'Category',
        'post_types' => array('promo_fare'),
      )
    );

    static::$articleCategory = new Taxonomy(
      'article_category',
      array(
        'name'       => 'Category',
        'post_types' => array('article'),
      )
    );

    static::$voucherCategory = new Taxonomy(
      'voucher_category',
      array(
        'name'       => 'Category',
        'post_types' => array('voucher'),
        'hierarchical' => true,
      )
    );

    static::$vendorTaxonomy = new Taxonomy(
      'vendor_taxonomy',
      array(
        'name'       => 'Vendor',
        'post_types' => array('vendor', 'voucher'),
        'rewrite'    => array(
          'slug' => Dealies::config('vendor_taxonomy_slug') ?: 'vouchers',
        ),
      )
    );
  }
}

Taxonomies::init();
