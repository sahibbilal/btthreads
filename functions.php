<?php

// Exit if accessed directly

if ( !defined( 'ABSPATH' ) ) exit;



// BEGIN ENQUEUE PARENT ACTION

// AUTO GENERATED - Do not modify or remove comment markers above or below:



if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):

    function chld_thm_cfg_locale_css( $uri ){

        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )

            $uri = get_template_directory_uri() . '/rtl.css';

        return $uri;

    }

endif;

add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

         

if ( !function_exists( 'child_theme_configurator_css' ) ):

    function child_theme_configurator_css() {

        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'twentytwentyfive-style','twentytwentyfive-style' ) );

    }

endif;

add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );



// END ENQUEUE PARENT ACTION



// ome page style and scripts

function enqueue_home_front_assets() {

    $uri = get_stylesheet_directory_uri();



    // CSS with preload-style-onload behavior

    wp_enqueue_style('home-bootstrap', "$uri/assets/bootstrap.css", [], null);

    wp_enqueue_style('home-fontawesome', "$uri/assets/font-awesome.css", [], null);

    wp_enqueue_style('home-plugins', "$uri/assets/plugins.css", [], null);

    wp_enqueue_style('home-popup', "$uri/assets/magnific-popup.css", [], null);

    wp_enqueue_style('home-carousel', "$uri/assets/owl.carousel.min.css", [], null);

    wp_enqueue_style('home-style', "$uri/assets/style.css", [], null);

    wp_enqueue_style('home-media', "$uri/assets/media.css", [], null);



    // Modernizr (loads in head)

    wp_enqueue_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', [], null, false);


    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', // Use a modern version
        [],
        '6.5.0'
    );

    // Optional: preload custom fonts

    add_filter('style_loader_tag', 'add_font_preload_links', 10, 4);

}

add_action('wp_enqueue_scripts', 'enqueue_home_front_assets');



function add_font_preload_links($html, $handle, $href, $media) {

    if ($handle === 'home-style') {

        $html .= "\n<link rel=\"preload\" as=\"font\" href=\"https://btthreads.com/wp-content/themes/twentytwentyfive-child/assets/averta-bold-webfont.woff2\" type=\"font/woff2\" crossorigin>";

        $html .= "\n<link rel=\"preload\" as=\"font\" href=\"https://btthreads.com/wp-content/themes/twentytwentyfive-child/assets/sourcesanspro-regular-webfont.woff2\" type=\"font/woff2\" crossorigin>";

    }

    return $html;

}



function enqueue_home_front_scripts() {

    $uri = get_stylesheet_directory_uri();



    // Enqueue local scripts (in footer)

    wp_enqueue_script('jquery-legacy', "$uri/assets/jquery-1.12.1.min.js", [], null, true);

    wp_enqueue_script('popper', "$uri/assets/popper.min.js", ['jquery-legacy'], null, true);

    wp_enqueue_script('bootstrap', "$uri/assets/bootstrap.js", ['jquery-legacy'], null, true);

    wp_enqueue_script('plugins', "$uri/assets/plugins.js", ['jquery-legacy'], null, true);

    wp_enqueue_script('tweenmax', "$uri/assets/TweenMax.min.js", [], null, true);

    wp_enqueue_script('scrollmagic', "$uri/assets/ScrollMagic.js", [], null, true);

    wp_enqueue_script('gsap-animation', "$uri/assets/animation.gsap.js", [], null, true);

    wp_enqueue_script('plyr', "$uri/assets/plyr.js", [], null, true);

    wp_enqueue_script('magnific', "$uri/assets/jquery.magnific-popup.min.js", ['jquery-legacy'], null, true);

    wp_enqueue_script('tabs', "$uri/assets/easyResponsiveTabs.js", ['jquery-legacy'], null, true);

    wp_enqueue_script('carousel', "$uri/assets/owl.carousel.min.js", ['jquery-legacy'], null, true);

    wp_enqueue_script('main-js', "$uri/assets/main.js", ['jquery-legacy'], null, true);
    wp_enqueue_script('custom-main-js', "$uri/assets/custom-main.js", ['jquery-legacy'], null, true);


    // External GSAP scripts

    wp_enqueue_script('gsap-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js', [], null, true);

    wp_enqueue_script('gsap-scrollto', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/plugins/ScrollToPlugin.min.js', ['gsap-cdn'], null, true);



    // Add inline script for tabs

    $inline_script = <<<JS

        document.addEventListener("DOMContentLoaded", function () {

        window.onload = init;

        var firstTabLink = document.querySelector('.tab_links li:first-child a');

        if (firstTabLink) {

            firstTabLink.classList.add('active');

        }

        var tabConts = document.querySelectorAll('.tab_cont');

        tabConts.forEach(function (el, index) {

            el.style.display = index === 0 ? 'block' : 'none';

        });

        });

    JS;



    wp_add_inline_script('main-js', $inline_script);

}

add_action('wp_enqueue_scripts', 'enqueue_home_front_scripts');





// home page style and scripts

add_action( 'after_setup_theme', function() {
    // Remove FSE theme support
    remove_theme_support( 'block-templates' );

    // Add classic features
    add_theme_support( 'menus' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'widgets' );
    add_theme_support( 'post-thumbnails' );
} );

// Register navigation menus
register_nav_menus( [
    'main_menu' => 'Main Menu',
    'primary' => __('Primary Menu', 'btthreads'),
    'footer'  => __('Footer Menu', 'btthreads'),
] );


// Shortcode to render the OTP form

function textbelt_otp_form_shortcode() {

    ob_start(); ?>

    

    <div style="max-width:400px">

        <input type="text" id="otp_phone" value="+923008295210" readonly />

        <button onclick="sendOtpTextbelt()">Send OTP</button>



        <input type="text" id="otp_code" placeholder="Enter OTP">

        <button onclick="verifyOtpTextbelt()">Verify OTP</button>

    </div>



    <div id="otp_result"></div>



    <script>

    function sendOtpTextbelt() {

        const phone = document.getElementById('otp_phone').value;

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {

            method: 'POST',

            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },

            body: `action=textbelt_send_otp&phone=${encodeURIComponent(phone)}`

        })

        .then(res => res.json())

        .then(data => {

            document.getElementById('otp_result').innerText = data.success ? "OTP sent!" : "Failed: " + data.message;

        });

    }



    function verifyOtpTextbelt() {

        const enteredOtp = document.getElementById('otp_code').value;

        const phone = document.getElementById('otp_phone').value;

        fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=textbelt_verify_otp&otp=' + enteredOtp + '&phone=' + encodeURIComponent(phone))

        .then(res => res.json())

        .then(data => {

            document.getElementById('otp_result').innerText = data.verified ? "✅ OTP Verified!" : "❌ Invalid OTP.";

        });

    }

    </script>



    <?php return ob_get_clean();

}

add_shortcode('phone_verification', 'textbelt_otp_form_shortcode');



// Send OTP with Textbelt

add_action('wp_ajax_textbelt_send_otp', 'textbelt_send_otp');

add_action('wp_ajax_nopriv_textbelt_send_otp', 'textbelt_send_otp');



function textbelt_send_otp() {

    $phone = sanitize_text_field($_POST['phone']);

    $otp = rand(100000, 999999);



    // Save OTP for later verification

    set_transient('otp_' . md5($phone), $otp, 10 * MINUTE_IN_SECONDS);



    $response = wp_remote_post('https://textbelt.com/text', [

        'body' => [

            'phone' => $phone,

            'message' => "Your verification code is: $otp",

            'key' => 'textbelt' // Change to your paid key for production

        ]

    ]);



    $body = wp_remote_retrieve_body($response);

    wp_send_json(json_decode($body, true));

}



// Verify OTP entered by user

add_action('wp_ajax_textbelt_verify_otp', 'textbelt_verify_otp');

add_action('wp_ajax_nopriv_textbelt_verify_otp', 'textbelt_verify_otp');



function textbelt_verify_otp() {

    $phone = sanitize_text_field($_GET['phone']);

    $otp = sanitize_text_field($_GET['otp']);

    $stored_otp = get_transient('otp_' . md5($phone));



    wp_send_json([

        'verified' => $stored_otp === $otp

    ]);

}
add_action('wp_ajax_check_user_phone', 'check_user_phone_callback');
add_action('wp_ajax_nopriv_check_user_phone', 'check_user_phone_callback');

	function check_user_phone_callback() {
    $phone_number = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';

    // Normalize number (replace leading 0 with 92 if needed)
    if (strpos($phone_number, '0') === 0) {
        $phone_number = '92' . substr($phone_number, 1);
    }

    global $wpdb;

    // Match only by meta_value
    $user_exists = $wpdb->get_var($wpdb->prepare(
        "SELECT user_id FROM $wpdb->usermeta WHERE meta_value = %s",
        $phone_number
    ));

    if ($user_exists) {
 	$user_info = get_userdata($user_exists);
    	$user_name = $user_info ? $user_info->display_name : 'Unknown User';

    // Send email to admin
    $admin_email = get_option('admin_email');
    $subject = 'Existing User Checked by Phone Number';
    $message = "An existing user has attempted to verify via phone.\n\n";
    $message .= "Name: $user_name\n";
    $message .= "Phone Number: $phone_number\n";
    $message .= "User ID: $user_exists";

    $headers = ['Content-Type: text/plain; charset=UTF-8'];
    wp_mail($admin_email, $subject, $message, $headers);
        wp_send_json_success([
            'exists' => true,
            'code' => null,
            'message' => 'Phone number found.'
        ]);
    } else {
        $code = rand(1000, 9999);
        $_SESSION['verification_code'] = $code;
        $_SESSION['phone_number'] = $phone_number;

        wp_send_json_success([
            'exists' => false,
            'code' => $code,
            'message' => 'Phone number not found. Proceeding with verification.'
        ]);
    }

    wp_die();
}
add_action('wp_ajax_send_verification_sms', 'send_verification_sms');
add_action('wp_ajax_nopriv_send_verification_sms', 'send_verification_sms');

function send_verification_sms() {
    $api_key = "923009664743-d9d4ac81-7358-4a9f-9289-3fd4ada8715d";
    $sender  = "BTThreads"; // Must match approved sender ID
    $template_id = "10114"; // Your fixed SMS template ID

    $mobile = sanitize_text_field($_POST['phone']);
    $code   = sanitize_text_field($_POST['code']);

    // Build message using key values required by the template
    $message_payload = [
        "otp" => $code // "otp" must match the template variable name
    ];

    // Build full request payload
    $data = [
        "api_key"     => $api_key,
        "sender"      => $sender,
        "mobile"      => $mobile,
        "template_id" => $template_id,
        "message"     => json_encode($message_payload)
    ];

    // Make cURL request
    $ch = curl_init("https://sendpk.com/api/sms.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // use URL encoding
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
    wp_die();
}
add_action('wp_ajax_save_verified_user', 'save_verified_user');
add_action('wp_ajax_nopriv_save_verified_user', 'save_verified_user');

function save_verified_user() {
    $first_name = sanitize_text_field($_POST['first_name']);
    $phone = sanitize_text_field($_POST['phone_number']);
    if (strpos($phone, '92') !== 0) {
        $phone = '92' . ltrim($phone, '0');
    }

    // Generate username and email
    $username = sanitize_user($first_name . '_' . time());
    $email = sanitize_email(strtolower($first_name) . '_' . time() . '@example.com');
    $password = wp_generate_password();

    // Create user
    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        $error_msg = $user_id->get_error_message();
    	wp_send_json_error(['message' => 'User creation failed: ' . $error_msg]);
    }

    // Set display name
    wp_update_user([
        'ID' => $user_id,
        'display_name' => $first_name,
    ]);

    // Save phone number separately (optional)
    update_user_meta($user_id, 'phone_number', $phone);

    // Save all remaining fields as array
    $allowed_keys = [
        'address', 'company_name', 'distributor_name', 'form_stage', 'manager_name', 'manager_phone_number',
        'owner_name', 'owner_phone_number', 'reason', 'status'
    ];

    $meta_array = [];
    foreach ($allowed_keys as $key) {
        if (isset($_POST[$key])) {
            $meta_array[$key] = sanitize_text_field($_POST[$key]);
        }
    }

    update_user_meta($user_id, 'user_profile_data', $meta_array);
    $admin_email = get_option('admin_email');
    $subject = 'New Verified User Registered';
    $message = "A new verified user has been created:\n\n";
    $message .= "Name: $first_name\n";
    $message .= "Username: $username\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $headers = ['Content-Type: text/plain; charset=UTF-8'];
    wp_mail($admin_email, $subject, $message, $headers);
    wp_send_json_success([
        'message' => 'User created and data saved successfully',
        'user_id' => $user_id,
        'username' => $username,
        'email' => $email,
        'password' => $password // optional: for display
    ]);
	
}
function custom_show_phone_number_field($user) {
    $user_profile_data = get_user_meta($user->ID, 'user_profile_data', true);
    if (empty($user_profile_data) || !is_array($user_profile_data)) {
        return;
    }

    ?>
    <h3>User Profile Data</h3>
    <table class="form-table">
        <?php
        foreach ($user_profile_data as $key => $value):
            if (!empty($value)): ?>
                <tr>
                    <th><label><?php echo esc_html(ucwords(str_replace('_', ' ', $key))); ?></label></th>
                    <td>
                        <input type="text" class="regular-text" value="<?php echo esc_attr($value); ?>" readonly />
                    </td>
                </tr>
            <?php endif;
        endforeach; ?>
        <tr>
            <th><label for="phone_number">Phone Number</label></th>
            <td>
                <input type="text" name="phone_number" id="phone_number" value="<?php echo esc_attr(get_user_meta($user->ID, 'phone_number', true)); ?>" class="regular-text" readonly /><br />
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'custom_show_phone_number_field'); // For "Your Profile"
add_action('edit_user_profile', 'custom_show_phone_number_field'); // For other users

add_action( 'admin_menu', function() {
    if ( current_user_can( 'edit_theme_options' ) ) {
        add_theme_page(
            __( 'Customize', 'btthreads' ), // Page title
            __( 'Customize', 'btthreads' ), // Menu title
            'edit_theme_options',             // Capability
            'customize.php'                   // Menu slug
        );
    }
});


add_action('restrict_manage_users', function () {
    if (current_user_can('list_users')) {
        $export_url = add_query_arg(['action' => 'export_custom_users'], admin_url('users.php'));
        echo '<a href="' . esc_url($export_url) . '" class="button" style="margin-left:10px;">Export Users CSV</a>';
    }
});

// Handle CSV export
add_action('admin_init', function () {
    if (isset($_GET['action']) && $_GET['action'] === 'export_custom_users' && current_user_can('list_users')) {

        // Keys we want from user_profile_data
        $allowed_keys = [
            'address', 'company_name', 'distributor_name', 'form_stage', 'manager_name', 'manager_phone_number',
            'owner_name', 'owner_phone_number', 'reason', 'status'
        ];

        // CSV header
        $csv_header = ['S.No', 'Name', 'Email', 'Registered', 'Phone Number'];
        foreach ($allowed_keys as $key) {
            $csv_header[] = ucwords(str_replace('_', ' ', $key));
        }

        // Output headers for download
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=user-details.' . time() . '.csv');

        $output = fopen('php://output', 'w');
        fputcsv($output, $csv_header);

        // Get all users
        $users = get_users(['fields' => 'all']);
        $serial = 1;

        foreach ($users as $user) {
            $row = [];

            // Serial number
            $row[] = $serial++;

            // Name
            $first = get_user_meta($user->ID, 'first_name', true);
            $last = get_user_meta($user->ID, 'last_name', true);
            $name = trim($first . ' ' . $last);
            if (empty($name)) {
                $name = $user->display_name;
            }
            $row[] = $name;

            // Email & registration date
            $row[] = $user->user_email;
            $row[] = $user->user_registered;

            // Phone Number
            $row[] = get_user_meta($user->ID, 'phone_number', true);

            // User profile data (stored as array)
            $profile_data = get_user_meta($user->ID, 'user_profile_data', true);
            if (!is_array($profile_data)) {
                $profile_data = [];
            }

            foreach ($allowed_keys as $key) {
                $row[] = isset($profile_data[$key]) ? $profile_data[$key] : '';
            }

            fputcsv($output, $row);
        }

        fclose($output);
        exit;
    }
});