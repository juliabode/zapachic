<?php
class Post_Type {
  protected $_name, $_slug, $_fields, $_js = array(), $_specialFields = array(), $_checkBoxFields = array();

  function __construct($slug, $options) {
    $this->_slug           = $slug;
    $this->_name           = $options['name'];
    $this->_fields         = $options['fields'];
    $this->_checkBoxFields = $options['checkbox_fields'] ?: array();

    $this->register($options['type_options']);
    $this->onUpdate();
    $this->toHtml();

  }

  public function __get($name) {
    if (in_array($name, array('_slug', '_name', '_fields', '_checkBoxFields')))
      return $this->$name;
    user_error("Invalid property: " . __CLASS__ . "->$name");
  }

  protected function setNormalFields() {
    $this->_normalFields  = array_diff(array_keys($this->_fields), array_merge($this->_specialFields, $this->_checkBoxFields));
  }

  protected function register($options = array()) {
    register_post_type($this->_slug,
      ($options ?: array()) + array(
        'labels' => is_array($options['label_opt']) ? $options['label_opt'] : array() + array(
          'name'               => $this->_name.'s',
          'singular_name'      => $this->_name,
          'add_new_item'       => 'Add New '.$this->_name,
          'edit_item'          => 'Edit '.$this->_name,
          'new_item'           => 'New '.$this->_name,
          'search_items'       => 'Search '.$this->_name.'s',
          'not_found'          => 'No '.$this->_name.'s found',
          'not_found_in_trash' => 'No '.$this->_name.'s found in trash',
        ),
        'public' => true,
      )
    );
  }

  protected function onUpdate() {
    $postType = $this;
    add_action('save_post', function($postId) use($postType) {
      global $post;

      if ((!wp_verify_nonce($_POST['autosave_fix'], basename(__FILE__))) || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)) return $post->ID;

      $postType->updateFields($post);
      if ($postType->_checkBoxFields) $postType->updateCheckBoxFields($post);
    });
  }

  public function updateFields($post) {
    foreach (array_keys($this->_fields) as $field)
      update_post_meta($post->ID, $field, $_POST[$field]);
  }

  protected function updateSpecialFields($post, $specialFields) {
    foreach ($specialFields as $specialField) {
      $i = 1;
      $fieldData = array();
      while ($_POST["${specialField['name']}_${specialField['required']}_$i"]) {
        $tmpData = array();

        foreach ($specialField['field_keys'] as $key) {
          $tmpData[$key] = $_POST["${specialField['name']}_${key}_$i"];
        }
        $fieldData[] = $tmpData;
        $i++;
      }
      update_post_meta($post->ID, $specialField['name'], json_encode($fieldData));
    }
  }

  public function updateCheckBoxFields($post) {
    foreach ($this->_checkBoxFields as $fieldSlug => $value) {
      update_post_meta($post->ID, $fieldSlug, $_POST[$fieldSlug]);
    }
  }

  protected function toHtml() {
    $postType = $this;
    add_action( 'admin_enqueue_scripts', function() use($postType) {
      if (count($postType->_js)) foreach ($postType->_js as $js_name => $js_source) wp_enqueue_script($js_name, get_bloginfo('template_url') . DS . $js_source);
    } ); // changed to eliminate js errors on user page

    add_action('admin_init', function() use($postType) {
      add_meta_box(
        $postType->_slug . '-data',
        $postType->_name . ' Data',
        function() use($postType) {
          $postType->fieldsHtml();
          echo '<input type="hidden" name="autosave_fix" value="', wp_create_nonce(basename(__FILE__)), '" />';
        }, $postType->_slug
      );
    });
  }

  public function fieldsHtml() {
    $customFields               = Dealies::view();
    $customFields->fields       = $this->_fields;
    $customFields->normalFields = $this->_normalFields;
    $customFields->checkBoxes   = $this->_checkBoxFields;
    echo $customFields->render('backend/custom_fields.phtml');
  }
}
