<?php
class Taxonomy {
  private $_name, $_slug, $_postTypes;

  public function __get($name) {
    if (in_array($name, array('_slug', '_name', '_postTypes')))
      return $this->$name;
    user_error('Invalid property: ' . __CLASS__ . '->$name');
  }

  function __construct($slug, $options) {
    $this->_slug      = $slug;
    $this->_name      = $options['name'];
    $this->_postTypes = $options['post_types'];
    $this->register($options);
  }

  protected function register($options) {
    $taxonomy = $this;

    add_action('init', function() use($taxonomy, $options) {
      register_taxonomy(
        $taxonomy->_slug,
        $taxonomy->_postTypes,
        (is_array($options) ? $options : array()) + array(
          'hierarchical' => true,
          'labels'       => (is_array($options['label_opt']) ? $options['label_opt'] : array()) + array(
            'name'              => $taxonomy->_name . 's',
            'singular_name'     => $taxonomy->_name,
            'search_items'      => 'Search ' . $taxonomy->_name . 's',
            'all_items'         => 'All ' . $taxonomy->_name . 's',
            'parent_item'       => 'Parent ' . $taxonomy->_name,
            'parent_item_colon' => 'Parent ' . $taxonomy->_name . ' colon',
            'edit_item'         => 'Edit ' . $taxonomy->_name,
            'update_item'       => 'Update ' . $taxonomy->_name,
            'add_new_item'      => 'Add new ' . $taxonomy->_name,
            'new_item_name'     => 'New ' . $taxonomy->_name . ' Name',
            'menu_name'         => $taxonomy->_name
          ),
          'query_var' => true,
        )
      );
    });
  }
}
