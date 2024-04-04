"use strict";

// Class definition
var KTModalDoctorsAdd = function () {
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
								message: 'Nama dokter dibutuhkan'
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
								message: 'Doctor email is required'
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
								message: 'Phone Number is required'
							}
						}
					},
					'tanggal-gabung': {
						validators: {
							notEmpty: {
								message: 'Phone Number is required'
							}
						}
					},
					'spesialis': {
						validators: {
							notEmpty: {
								message: 'Silahkan isi Spesialis'
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
        $(form.querySelector('[name="spesialis"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('spesialis');
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

								if(response.request['status'] == 200){
									// $('#kt_dokter_table').DataTable().ajax.reload();
								// Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
									Swal.fire({
										text: "Form has been successfully submitted!",
										icon: "success",
										buttonsStyling: false,
										confirmButtonText: "Ok, got it!",
										customClass: {
											confirmButton: "btn btn-primary"
										}
									});
								}

								// console.log(response);
	
								// const redirectUrl = form.getAttribute('data-kt-redirect-url');
	
								// if (redirectUrl) {
								// 	location.href = redirectUrl;
								// }
							} else {
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

								// Redirect to customers list page
								// window.location = form.getAttribute("data-kt-redirect");
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
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_dokter'));

            form = document.querySelector('#kt_modal_add_dokter_form');
            submitButton = form.querySelector('#kt_modal_add_dokter_submit');
            cancelButton = form.querySelector('#kt_modal_add_dokter_cancel');
			closeButton = form.querySelector('#kt_modal_add_dokter_close');

			$(form.querySelector('[name="tanggal_lahir"]')).flatpickr({
                // enableTime: !0,
                enableTime: false,
				allowInput : true,
                dateFormat: "d, M Y",
				// dateFormat: "YYYY-MM-DD",
				minDate: "01, Jan 1950",
				maxDate: "01, Jan 2010",
				defaultDate: "01, Jan 1998",
            }),
			$(form.querySelector('[name="tanggal_gabung"]')).flatpickr({
                enableTime: false,
				allowInput : true,
                dateFormat: "d, M Y",
				// dateFormat: "YYYY-MM-DD",
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
	KTModalDoctorsAdd.init();
});