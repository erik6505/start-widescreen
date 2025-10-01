<?php

function twentytwentyfive_child_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles' );



// *** SMOOTH SCROLL ***
function add_smooth_scroll() { ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
const duration = 900;
const offset = 80;
const ease = t => t < 0.5
? 4 * t * t * t
: 1 - Math.pow(-2 * t + 2, 3) / 2;
document.querySelectorAll('a[href^="#"]').forEach(a => {
a.addEventListener('click', e => {
const href = a.getAttribute('href');
if (!href || href === '#') return;
const target = document.querySelector(href);
if (!target) return;
e.preventDefault();
const start = window.pageYOffset;
      const end = target.getBoundingClientRect().top + start - offset;
const delta = end - start;
if (Math.abs(delta) < 5) return; // <-- DENNA RAD
const startTime = performance.now();
function step(now) {
const progress = Math.min((now - startTime) / duration, 1);
window.scrollTo(0, start + delta * ease(progress));
if (progress < 1) requestAnimationFrame(step);}
requestAnimationFrame(step);});
}); });
</script>
<?php }
add_action('wp_head', 'add_smooth_scroll');

// *** SKAPA EGNA BLOCK ***
add_action('enqueue_block_editor_assets', function() {
    wp_enqueue_script(
        'custom-block',
        get_stylesheet_directory_uri() . '/custom-block.js',
        [],
        '1.0.0',
        true
    );
});

// *** KORRIGERA EDIT/PAGE FÖR ADMIN ***
function widescreen_editor_scripts() {
wp_register_style('widescreen-editor', false);
wp_enqueue_style('widescreen-editor');
wp_add_inline_style(
'widescreen-editor',
'.wp-block{max-width:1050px}.block-library-html__edit .block-editor-plain-text{max-height:550px!important}'
); }
add_action('enqueue_block_editor_assets', 'widescreen_editor_scripts');



// *** EXTRA FÄLT I SETTINGS FÖR ADMIN *** /
function add_contact_fields() {
$fields = array(
'contact_email' => array('Kontakt-epost', 'email', 'sanitize_email'),
'contact_phone' => array('Kontakt-telefon', 'text', 'sanitize_text_field'),
'contact_map' => array('Hitta hit', 'textarea', 'wp_kses_post'),
'contact_address' => array('Adress', 'text', 'sanitize_text_field'),
'contact_postaddress '=> array('Postadress', 'text', 'sanitize_text_field'),
'contact_orgnr' => array('Org.nr', 'text', 'sanitize_text_field')
);
add_settings_section('contact_section', 'Kontakt', null, 'general');

foreach ($fields as $name => $data) {
add_settings_field($name, $data[0], function() use ($name, $data) {
$value = get_option($name, '');
 if ($data[1] === 'textarea') {
 echo '<textarea name="' . $name . '" rows="4" cols="50">' . esc_textarea($value) . '</textarea>';
} else {
echo '<input type="' . $data[1] . '" name="' . $name . '" value="' . esc_attr($value) . '" />';
}
}, 'general', 'contact_section');
register_setting('general', $name, $data[2]);
}}
add_action('admin_init', 'add_contact_fields');


// *** EGEN KNAPP-VARIATION I ADMIN *** /
function my_custom_button_variation() {register_block_style(
'core/button', array('name'=> 'dark-button','label' => 'Mörk knapp',)
);}
add_action('init', 'my_custom_button_variation');


// *** Tillåt SVG i Mediabiblioteket FÖR ADMIN *** /
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


// *** Tillåt SVG inne i wp-blocks *** /
function allow_svg_in_wp_editor() {
add_filter('wp_kses_allowed_html', function($allowed, $context) {
if ($context === 'post') {
$allowed['svg'] = array(
'stroke' => true,
'width' => true,
'xmlns' => true,
'viewbox' => true,
'stroke-linecap' => true,
'fill' => true,
'stroke-width' => true,);
$allowed['path'] = array(
'd' => true,
);
}
return $allowed;
}, 10, 2);
}
add_action('init', 'allow_svg_in_wp_editor');


