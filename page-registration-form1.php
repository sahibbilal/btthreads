
<!-- Add this to the <head> section -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

<!-- Add this before </body> -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<?php
/* Template Name: User Form */
get_header();
global $wpdb;

$alert_script = '';
$show_full_form = false;
$extra_fields = ['embroidery_type', 'address', 'owner_name', 'owner_number', 'manager_name', 'manager_number'];
$form_data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize_text_field($_POST['first_name'] ?? '');
    $phone = sanitize_text_field($_POST['phone_number'] ?? '');

    if (!empty($name) && !empty($phone)) {
        // Search phone number in user_meta
        $meta_query = $wpdb->prepare("
            SELECT user_id FROM {$wpdb->prefix}usermeta
            WHERE meta_value = %s
        ", $phone);
        $user_id = $wpdb->get_var($meta_query);

        if ($user_id) {
            // Show success alert and redirect after 2 seconds
            $alert_script = "
        <script>
            window.onload = function() {
                alertify.success('✅ User already exists. Redirecting...');
                setTimeout(function() {
                    window.location.href = '" . site_url('/index.php/sample-page') . "';
                }, 2000);
            };
        </script>
    ";
        } else {
            if (!empty($_POST['form_stage']) && $_POST['form_stage'] === 'full') {
                foreach ($extra_fields as $field) {
                    $form_data[$field] = sanitize_text_field($_POST[$field] ?? '');
                }

                $random = rand(1000, 9999);
                $email = strtolower(str_replace(' ', '', $name)) . $random . '@example.com';
                $password = wp_generate_password();
                $login = strtolower(str_replace(' ', '', $name)) . $random;
                $nicename = strtolower(str_replace(' ', '', $name)) . $random;

                $new_user_id = wp_insert_user([
                    'user_login'    => $login,
                    'user_pass'     => $password,
                    'user_email'    => $email,
                    'display_name'  => $name,
                    'user_nicename' => $nicename,
                ]);

                if (!is_wp_error($new_user_id)) {
                    $meta_key = $email . '_' . $random;

                    update_user_meta($new_user_id, $meta_key, $form_data);
                    update_user_meta($new_user_id, $meta_key . '_phone', $phone);

                    $alert_script = "
        <script>
            window.onload = function() {
                alertify.success('✅ New user created and form submitted successfully.');
                setTimeout(function() {
                    window.location.href = '" . site_url('/index.php/sample-page') . "';
                }, 2000);
            };
        </script>
    ";
                } else {
                    $alert_script = "
        <script>
            window.onload = function() {
                alertify.error('❌ Error creating user: " . esc_js($new_user_id->get_error_message()) . "');
            };
        </script>
    ";
                }
            } else {
                $alert_script = "<script>window.onload = function() { alertify.warning('⚠️ User not found. Please fill the full form.'); }</script>";
                $show_full_form = true;
            }
        }
    }
}
?>

<div class="container" style="max-width: 600px; margin: auto; padding: 20px;">
    <h2>Custom Testing Form</h2>



    <form method="POST">
        <input type="hidden" name="form_stage" value="<?= $show_full_form ? 'full' : 'search' ?>">

        <div style="margin-bottom: 10px;">
            <label for="first_name">Name</label><br>
            <input type="text" name="first_name" id="first_name" required style="width: 100%; padding: 8px;" value="<?= esc_attr($_POST['first_name'] ?? '') ?>">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="phone_number">Phone Number</label><br>
            <input type="text" name="phone_number" id="phone_number" required style="width: 100%; padding: 8px;" value="<?= esc_attr($_POST['phone_number'] ?? '') ?>">
        </div>

        <?php if ($show_full_form): ?>
            <?php foreach ($extra_fields as $field): ?>
                <div style="margin-bottom: 10px;">
                    <label for="<?= $field ?>"><?= ucwords(str_replace('_', ' ', $field)) ?></label><br>
                    <input type="text" name="<?= $field ?>" id="<?= $field ?>" style="width: 100%; padding: 8px;">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <button type="submit" style="padding: 10px 20px; background: #0073aa; color: white; border: none;">Submit</button>
    </form>
    <?php echo $alert_script; ?>
</div>

<?php
get_footer();