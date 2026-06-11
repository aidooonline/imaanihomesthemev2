<?php
defined('ABSPATH') || exit;

/**
 * Native enquiry/waitlist form handler — zero plugins.
 * POSTs to admin-post.php?action=imaani_contact, mails the team,
 * redirects to /thank-you/. Honeypot + nonce for spam/CSRF.
 * A CF7 shortcode saved in `imaani_form_shortcode` page meta overrides
 * the native form entirely (see page-contact.php / page-project.php).
 */

function imaani_handle_contact(): void {
    $fail = function (string $reason) {
        wp_safe_redirect(add_query_arg('form', $reason, home_url('/contact/')));
        exit;
    };

    if (!isset($_POST['imaani_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['imaani_nonce'])), 'imaani_contact')) {
        $fail('expired');
    }
    // Honeypot — bots fill it, humans never see it
    if (!empty($_POST['company_website'])) {
        wp_safe_redirect(home_url('/thank-you/'));
        exit;
    }

    $first    = sanitize_text_field(wp_unslash($_POST['first_name'] ?? ''));
    $last     = sanitize_text_field(wp_unslash($_POST['last_name'] ?? ''));
    $phone    = sanitize_text_field(wp_unslash($_POST['phone'] ?? ''));
    $email    = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $interest = sanitize_text_field(wp_unslash($_POST['interest'] ?? 'General'));
    $message  = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));
    $context  = sanitize_text_field(wp_unslash($_POST['form_context'] ?? 'Consultation'));

    if ('' === $first || !is_email($email)) {
        $fail('invalid');
    }

    $to      = get_theme_mod('imaani_email', 'info@imaanihomes.com');
    $subject = sprintf('%s request — %s — %s %s', $context, $interest, $first, $last);
    $body    = "From: {$first} {$last}\nEmail: {$email}\nPhone: {$phone}\nInterested in: {$interest}\nForm: {$context}\n\nMessage:\n{$message}\n\n--\nSent from " . home_url('/');
    $headers = ['Reply-To: ' . $email];

    $sent = wp_mail($to, $subject, $body, $headers);

    $url = home_url('/thank-you/');
    if (!$sent) {
        $url = add_query_arg('mail', 'fail', $url);
    }
    wp_safe_redirect($url);
    exit;
}
add_action('admin_post_imaani_contact', 'imaani_handle_contact');
add_action('admin_post_nopriv_imaani_contact', 'imaani_handle_contact');

/** Renders the native form. $args: context (Consultation|Waitlist), interest_default, compact */
function imaani_native_form(array $args = []): void {
    $context  = $args['context'] ?? 'Consultation';
    $default  = $args['interest_default'] ?? '';
    $compact  = !empty($args['compact']);
    $notice   = sanitize_text_field(wp_unslash($_GET['form'] ?? ''));
    ?>
    <?php if ('expired' === $notice) : ?>
      <p class="form-error">That form session expired — please try again.</p>
    <?php elseif ('invalid' === $notice) : ?>
      <p class="form-error">Please provide at least your first name and a valid email.</p>
    <?php endif; ?>
    <form class="imaani-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="imaani_contact">
      <input type="hidden" name="form_context" value="<?php echo esc_attr($context); ?>">
      <?php wp_nonce_field('imaani_contact', 'imaani_nonce'); ?>
      <p class="hp-field" aria-hidden="true"><label>Company website<input type="text" name="company_website" tabindex="-1" autocomplete="off"></label></p>

      <div class="form-row form-row--2">
        <label>First name<input type="text" name="first_name" required autocomplete="given-name"></label>
        <label>Last name<input type="text" name="last_name" autocomplete="family-name"></label>
      </div>
      <div class="form-row form-row--2">
        <label>Phone<input type="tel" name="phone" autocomplete="tel"></label>
        <label>Email<input type="email" name="email" required autocomplete="email"></label>
      </div>
      <?php if ($default) : ?>
        <input type="hidden" name="interest" value="<?php echo esc_attr($default); ?>">
      <?php else : ?>
        <label>I'm interested in
          <select name="interest">
            <option>Regalia</option>
            <option>Alexis Residence</option>
            <option>General</option>
            <option>Investment</option>
          </select>
        </label>
      <?php endif; ?>
      <?php if (!$compact) : ?>
        <label>Your message<textarea name="message" rows="5"></textarea></label>
      <?php endif; ?>
      <button class="btn btn--primary" type="submit"><?php echo esc_html('Waitlist' === $context ? 'Join the Waitlist' : 'Reserve My Consultation'); ?></button>
      <p class="form-note">Our team responds within 24 hours.</p>
    </form>
    <?php
}
