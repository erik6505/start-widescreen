<?php
/**
 * Title: Footer
 * Slug: Start-Widescreen/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer columns with logo, title, tagline and links.
 */
?>
<!-- wp:group {"metadata":{"name":"Allt footer-innehåll"},"align":"full","className":"footer-content animated fadeInUp","style":{"spacing":{"padding":{"top":"var:preset|spacing|space-md","bottom":"var:preset|spacing|space-md"},"margin":{"top":"var:preset|spacing|space-lg","bottom":"var:preset|spacing|space-lg"}},"elements":{"link":{"color":{"text":"var:preset|color|dark-1"}}}},"backgroundColor":"light-1","textColor":"dark-1","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->

<div class="wp-block-group alignfull footer-content animated fadeInUp has-dark-1-color has-light-1-background-color has-text-color has-background has-link-color" style="margin-top:var(--wp--preset--spacing--space-lg);margin-bottom:var(--wp--preset--spacing--space-lg);padding-top:var(--wp--preset--spacing--space-md);padding-bottom:var(--wp--preset--spacing--space-md)"><!-- wp:group {"metadata":{"name":"Adress"},"align":"full","className":"adressraden","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group alignfull adressraden"><!-- wp:site-logo {"width":86,"isLink":false} /-->

<?php 
$address = get_option('contact_address');
$postaddress = get_option('contact_postaddress');
$orgnr = get_option('contact_orgnr');

if (!empty($address) || !empty($postaddress) || !empty($orgnr)) { ?>
<!-- wp:site-title {"level":0,"isLink":false} /-->
<!-- wp:paragraph {"className":"has-tiny-font-size","fontSize":"small"} -->
<p class="has-tiny-font-size has-small-font-size">
<?php if (!empty($address)) {
echo esc_html($address);}

if (!empty($postaddress)) {
if (!empty($address)) echo '<br>';
echo esc_html($postaddress); }

if (!empty($orgnr)) {
if (!empty($address) || !empty($postaddress)) echo '<br>';
echo 'Org.nummer: ' . esc_html($orgnr);} ?>
</p>
<!-- /wp:paragraph -->
<?php } ?>
</div>
<!-- /wp:group -->


<?php if (get_option('contact_email') || get_option('contact_phone') || get_option('contact_map')) : ?>
<!-- wp:group {"metadata":{"name":"Kontaktknapparna"},"align":"full","className":"kontaktraden","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignfull kontaktraden">
<?php if (get_option('contact_email')) : ?>
<!-- wp:paragraph {"className":"has-tiny-font-size","fontSize":"small"} -->
<a class="liten-knapp" href="mailto:<?php echo get_option('contact_email'); ?>">
<svg stroke="currentcolor" width="70px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 69 47" stroke-linecap="round" fill="none" stroke-width="3">
<path d="m63 1.5a4 4 0 0 1 4 4v36a4 4 0 0 1 -4 4h-57.5a4 4 0 0 1 -3.9-4v-36a4 4 0 0 1 4-4z"/>
<path d="m59 7-25 24.2-25-24.3m16.5 16.9-16.1 15.7m33.1-15.7 16.7 15.7"/>
</svg>
<br>
<?php echo get_option('contact_email'); ?>
</a>
<!-- /wp:paragraph -->
<?php endif; ?>



<?php if (get_option('contact_phone')) : ?>
<!-- wp:paragraph {"className":"has-tiny-font-size","fontSize":"small"} -->
<a class="liten-knapp" href="tel:<?php echo get_option('contact_phone'); ?>">
<svg xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 70 70"><path d="m62.8 53.2a4 4 0 0 1 -.5 5.6l-7.6 6.2a6 6 0 0 1 -6.3.8 70.4 70.4 0 0 1 -40.6-48.7 6 6 0 0 1 2-6l7.6-6.4a4 4 0 0 1 5.6.6l7.4 8.8a4 4 0 0 1 -.6 5.7c-1.6 1.3-3.5 3-4.9 4a3 3 0 0 0 -.9 3.3c2.9 8 9.3 16.1 17.1 21.1a3 3 0 0 0 3.5-.3c1.4-1 3.4-2.8 5.1-4.2a4 4 0 0 1 5.6.5z" fill="none" stroke="currentcolor" stroke-width="3"/></svg><br>
<?php echo get_option('contact_phone'); ?></a>
<!-- /wp:paragraph -->
<?php endif; ?>

<?php if (get_option('contact_map')) : ?>
<!-- wp:paragraph {"className":"has-tiny-font-size","fontSize":"small"} -->
<a class="liten-knapp" href="<?php echo get_option('contact_map'); ?>" target="_blank" rel="noopener">
<svg xmlns="http://www.w3.org/2000/svg" clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 70 70"><g fill="none" stroke="currentcolor" stroke-width="3"><path d="m35 2.2a23 23 0 0 1 23 23c0 12.7-23 42.4-23 42.4s-23-29.7-23-42.4a23 23 0 0 1 23-23z"/><circle cx="35" cy="23.1" r="7.2"/></g></svg><br>
Hitta hit</a>
<!-- /wp:paragraph -->
<?php endif; ?>
</div>
<!-- /wp:group -->
<?php endif; ?>


<!-- wp:group {"metadata":{"name":"Widescreen cred"},"align":"full","className":"credraden","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignfull credraden">
<!-- wp:paragraph {"className":"has-tiny-font-size","fontSize":"small"} -->
<p class="has-tiny-font-size has-small-font-size">Webb av <a href="https://widescreen.media" target="_blank" rel="noopener">Widescreen Media</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->