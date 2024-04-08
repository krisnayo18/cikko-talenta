"use strict";

// Class definition
var KTModalPerawatAdd = function () {
    var submitButton;
    var cancelButton;
	var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    'nama': {
						validators: {
							notEmpty: {
								message: 'Nama perawat tidak boleh kosong'
							}
						}
					},
                    'jenis-kelamin': {
						validators: {
							notEmpty: {
								message: 'Gender is required'
							}
						}
					},
                    'email': {
						validators: {
							notEmpty: {
								message: 'Nurse email is required'
							}
						}
					},
					'nomor-hp': {
						validators: {
							notEmpty: {
								message: 'Phone Number is required'
							}
						}
					},
					'tanggal-lahir': {
						validators: {
							notEmpty: {
								message: 'Tanggal lahir tidak boleh kosong'
							}
						}
					},
					'tanggal-gabung': {
						validators: {
							notEmpty: {
								message: 'Tanggal gabung tidak boleh kosong'
							}
						}
					},
					'bagian': {
						validators: {
							notEmpty: {
								message: 'Silahkan isi bagian'
							}
						}
					},
					'alamat': {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Revalidate select field. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="bagian"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('bagian');
        });
        $(form.querySelector('[name="jenis-kelamin"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('jenis-kelamin');
        });

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();
			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					// console.log('validated!');

					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable submit button whilst loading
						submitButton.disabled = true;
						// console.log(submitButton.closest('form').getAttribute('action'));
						// console.log(form);
						
						// Check axios library docs: https://axios-http.com/docs/intro
						axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form)).then(function (response) {
							if (response) {
								// form.reset();
								console.log(response);
								
								if(!response.error){
									// $data = json_decode($response);
									// console.log($data);
								// Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
									Swal.fire({
										text: "Form has been successfully submitted!",
										icon: "success",
										buttonsStyling: false,
										confirmButtonText: "Ok, got it!",
										customClass: {
											confirmButton: "btn btn-primary"
										}
									}).then((result) => {
										if (result.isConfirmed) {
											window.location = form.getAttribute("data-kt-redirect");
										  }
									});
								}
								else if(response.errors) {
									var values = '';
									jQuery.each(data.errors, function (key, value) {
										 values += value
									});
							
									Swal.fire({
										text: "Sorry, please try again.",
										icon: "error",
										buttonsStyling: false,
										confirmButtonText: "Ok, got it!",
										customClass: {
											confirmButton: "btn btn-primary"
										}
									});
								}
							}
							else {
								// Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
								Swal.fire({
									text: "Sorry, please try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								});
							}
						}).catch(function (error) {
							Swal.fire({
								text: "Sorry, looks like there are some errors detected, please try again.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok, got it!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							});
						}).then(() => {
								form.reset();
								modal.hide();
								submitButton.removeAttribute('data-kt-indicator');
								// Enable submit button after loading
								submitButton.disabled = false;
						});				
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form	
                    modal.hide(); // Hide modal				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

		closeButton.addEventListener('click', function(e){
			e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form	
                    modal.hide(); // Hide modal				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
		})
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_perawat'));


            form = document.querySelector('#kt_modal_add_perawat_form');
            submitButton = form.querySelector('#kt_modal_add_perawat_submit');
            cancelButton = form.querySelector('#kt_modal_add_perawat_cancel');
			closeButton = form.querySelector('#kt_modal_add_perawat_close');

			$(form.querySelector('[name="tanggal_lahir"]')).flatpickr({
                // enableTime: !0,
                enableTime: false,
				allowInput : true,
				altInput: !0,
                dateFormat: "Y-m-d",
				altFormat: "d, M Y",
				minDate: "01, Jan 1950",
				maxDate: "01, Jan 2010",
				defaultDate: "01, Jan 1998",
            }),
			$(form.querySelector('[name="tanggal_gabung"]')).flatpickr({
                enableTime: false,
				allowInput : true,
				altInput: !0,
                dateFormat: "Y-m-d",
				altFormat: "d, M Y",
				minDate: "01, Jan 2000",
				maxDate: "today",
				defaultDate: "today"
            }),

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalPerawatAdd.init();
});