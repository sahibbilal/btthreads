<!-- Add to your <head> section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<style>
.form-control {
    border: 1px solid #dee2e6 !important;
    padding-left: 10px !important;
}

.phone-wrapper {
    position: relative;
}

.country-code {
    position: absolute;
    top: 50%;
    left: 12px;
    transform: translateY(-50%);
    color: #000;
    font-size: 20px;
    z-index: 2;
    pointer-events: none;
}

.phone-input {
    padding-left: 30px !important;
}
</style>

<?php
/* Template Name: User Form */
get_header();
global $wpdb;

$show_full_form = isset($_POST['form_stage']) && $_POST['form_stage'] === 'full';
$extra_fields = ['company_name', 'address', 'owner_name', 'owner_phone_number', 'manager_name', 'manager_phone_number', 'status'];
?>

<div class="container" style="max-width: 600px; margin: auto; padding: 20px;">
    <h2>User Form</h2>

    <form method="POST" id="ajaxUserCheckForm">
        <input type="hidden" name="form_stage" value="<?= $show_full_form ? 'full' : 'search' ?>">

        <div class="mb-3">
            <label for="first_name">Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required value="<?= esc_attr($_POST['first_name'] ?? '') ?>">
        </div>

        <div class="mb-3">
            <label for="phone_number">Phone Number</label>
            <div class="phone-wrapper">
                <span class="country-code">92</span>
                <input type="tel" name="phone_number" pattern="^[0-9]{10}$" title="Enter 10-digit Pakistani number without 92" id="phone_number" class="form-control phone-input" required maxlength="10" value="<?= esc_attr($_POST['phone_number'] ?? '') ?>">
            </div>
        </div>

        <div id="code-section" style="display: none; margin-top: 1rem;">
            <label for="verification_code">Enter Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" class="form-control" maxlength="6">
            <button type="button" id="verifyCodeBtn" class="btn text-white mt-2 p-2 w-25 border" style="background-color: #8d2929;">Verify</button>
        </div>

        <div id="full-form-section" style="<?= $show_full_form ? '' : 'display:none;' ?>">
            <?php foreach ($extra_fields as $field): ?>
                <?php if ($field === 'status'): ?>
                    <div class="mb-3">
                        <label>Status</label><br>
                        <label><input type="radio" name="status" value="current" required onchange="toggleDistributor(this.value)" <?= (($_POST['status'] ?? '') === 'current') ? 'checked' : '' ?>> Current</label>
                        <label style="margin-left: 15px;"><input type="radio" name="status" value="potential" onchange="togglepotential(this.value)" required <?= (($_POST['status'] ?? '') === 'potential') ? 'checked' : '' ?>> Potential</label>
                        <label style="margin-left: 15px;"><input type="radio" name="status" value="previous" required onchange="togglePrevious(this.value)" <?= (($_POST['status'] ?? '') === 'previous') ? 'checked' : '' ?>> Previous</label>
                    </div>

                    <div class="mb-3" id="distributorField" style="display: none;">
                        <?php if (have_rows('distributer_details', 'option')) : ?>
			    <div>
                            <label for="distributor_name">Choose Distributor:</label>
			    </div>
			    <div>	
                            <select name="distributor_name" id="distributer_name">
                                <option value="">Select Distributor</option>
                                <?php while (have_rows('distributer_details', 'option')) : the_row(); 
                                    $name = get_sub_field('distributer_name', 'option');
                                    if ($name): ?>
                                        <option value="<?= esc_attr($name); ?>"><?= esc_html($name); ?></option>
                                    <?php endif;
                                endwhile; ?>
                            </select>
			  </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3" id="previousField" style="display: none;">
                        <label for="previous_name">Why you left</label>
                        <textarea class="form-control" name="reason" placeholder="Add reason"></textarea>
                    </div>
                <?php else: ?>
                    <div class="mb-3">
                        <label for="<?= $field ?>"><?= ucwords(str_replace('_', ' ', $field)) ?></label>
                        <input type="text" name="<?= $field ?>" id="<?= $field ?>" class="form-control" value="<?= esc_attr($_POST[$field] ?? '') ?>">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <button type="button" id="checkPhoneBtn" class="btn text-white w-25" style="background-color: #8d2929;">Submit</button>
	<button type="button" id="finalSaveBtn" class="btn text-white w-25 mt-2" style="background-color: #8d2929; display:none;">Save</button>

    </form>
</div>

<script>
let generatedCode = null;

jQuery(document).ready(function($) {
    $('#checkPhoneBtn').on('click', function() {
        var phone = $('#phone_number').val().trim();
        
	var phonePattern = /^3[0-9]{9}$/;
   	if (!phonePattern.test(phone)) {
        	Swal.fire({
           	 icon: 'error',
            	title: 'Invalid Phone Number',
            	text: 'Please enter a valid 10-digit Pakistani mobile number starting with 3 (e.g. 3001234567).'
        	});
      	  return;
    	}
	var fullPhone = '92' + phone;
        Swal.fire({
            title: 'Checking...',
            text: 'Please wait while we check the number...',
            didOpen: () => Swal.showLoading(),
            allowOutsideClick: false
        });

        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            dataType: 'json',
            data: { action: 'check_user_phone', phone: fullPhone },
            success: function(response) {
                Swal.close();

                if (response.success && response.data.exists) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Already Registered',
                        text: response.data.message,
                        timer: 500,
                        showConfirmButton: false
                    }).then(() => window.location.href = '/');
                } else if (response.success) {
                    generatedCode = Math.floor(100000 + Math.random() * 900000);
			$.ajax({
    url: '<?php echo admin_url('admin-ajax.php'); ?>', // wp_localize_script provides this
    type: 'POST',
    data: {
      action: 'send_verification_sms',
      phone: fullPhone,
      code: generatedCode
    },
    success: function(res) {
      console.log(res);
    }
  });

  Swal.fire({
    icon: 'success',
    title: 'Verification',
    html: `Verification code sent to your mobile number<br>Enter this code below to continue.`
  }).then(() => {
    $('#code-section').slideDown();
    $('#checkPhoneBtn').hide();
  });                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.data.message || 'Unexpected response.'
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'AJAX Error',
                    text: xhr.responseText || 'Something went wrong.'
                });
            }
        });
    });

    $('#verifyCodeBtn').on('click', function() {
        const userCode = $('#verification_code').val().trim();

        if (userCode.length !== 6) {
            Swal.fire({ icon: 'warning', title: 'Invalid Code', text: 'Please enter a 6-digit code.' });
            return;
        }

        if (userCode == generatedCode) {
            Swal.fire({
                icon: 'success',
                title: 'Code Verified!',
                text: 'You may now continue with the form.',
                timer: 1500,
                showConfirmButton: false
            });
	    document.getElementById('first_name').readOnly = true;
 	    document.getElementById('phone_number').readOnly = true;
            $('#full-form-section').slideDown();             // Show full form
            $('input[name="form_stage"]').val('full');       // Update form stage
            $('#code-section').slideUp();                    // Hide code input
            $('#checkPhoneBtn').hide();                      // Show submit button again
		$('#finalSaveBtn').show(); 
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Incorrect Code',
                text: 'The code you entered is incorrect. Please try again.'
            });
        }
    });

    // Restore visibility of dependent fields after reload
    const selectedStatus = document.querySelector('input[name="status"]:checked');
    if (selectedStatus) toggleDistributor(selectedStatus.value);
     $('#finalSaveBtn').on('click', function (e) {
        e.preventDefault();

        let formData = {
            action: 'save_verified_user'
        };

        // Collect all form fields dynamically
        $('#ajaxUserCheckForm').find('input, select, textarea').each(function () {
    	const name = $(this).attr('name');
    	const value = $(this).val();
    	if (name) {
        if ($(this).is(':radio')) {
            if ($(this).is(':checked')) {
                formData[name] = value;
            }
        } else {
            formData[name] = value;
        }
    	}
	});
	console.log('Sending data:', formData);

        $.post('<?php echo admin_url("admin-ajax.php"); ?>', formData, function (response) {
            if (response.success) {
                Swal.fire('Success', response.data.message, 'success');
                $('#ajaxUserCheckForm')[0].reset();
                $('#finalSaveBtn').hide();
                $('#full-form-section').hide();
 		setTimeout(function () {
     		   window.location.href = 'https://btthreads.com/';
   		 }, 1500);
            } else {
                Swal.fire('Error', response.data.message, 'error');
            }
        });
    });
});
function toggleDistributor(value) {
    const distField = document.getElementById('distributorField');
    const distField2 = document.getElementById('previousField');
    if (value === 'current') {
        distField.style.display = 'block';
        distField2.style.display = 'none';
    } else {
        distField.style.display = 'none';

    }
}

function togglePrevious(value) {
    const distField2 = document.getElementById('previousField');
    const distField = document.getElementById('distributorField');
    if (value === 'previous') {
        distField2.style.display = 'block';
        distField.style.display = 'none';
    } else {
        distField2.style.display = 'none';
        distField.style.display = 'none';

    }
}

function togglepotential(value) {
    document.getElementById('previousField').style.display = 'none';
    document.getElementById('distributorField').style.display = 'none';
}
</script>

<?php get_footer(); ?>
