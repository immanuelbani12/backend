"use strict";

// Class definition
var KTUsersAddUser = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_add_user');
    const form = element.querySelector('#kt_modal_add_user_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initAddUser = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'nama': {
                        validators: {
                            notEmpty: {
                                message: 'Nama institusi wajib di isi'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Alamat email wajib di isi'
                            },
                            emailAddress: {
								message: 'Alamat email tidak valid'
							}
                        }
                    },
                    'no_telp': {
                        validators: {
                            notEmpty: {
                                message: 'Nomor telepon wajib di isi'
                            },
                            numeric: {
                                message: 'Nomor telepon berupa angka',
                            },
                        }
                    },
                    // 'password': {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Password wajib di isi'
                    //         }
                    //     }
                    // },
                    'alamat': {
                        validators: {
                            notEmpty: {
                                message: 'Alamat institusi wajib di isi'
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

        // Submit button handler
        const submitButton = element.querySelector('[data-kt-users-modal-action="submit"]');
        submitButton.addEventListener('click', e => {
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click 
                        submitButton.disabled = true;

                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            form.submit(); // Submit form
                        }, 2000);
                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Maaf, sepertinya ada terjadi error, mohon coba kembali.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Baik, mengerti!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-users-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Anda yakin ingin membatalkan?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Ya, batalkan!",
                cancelButtonText: "Tidak, kembali",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form			
                    modal.hide();	
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Formulir data anda tidak di batalkan!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Baik, mengerti!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        // Close button handler
        const closeButton = element.querySelector('[data-kt-users-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Anda yakin ingin membatalkan?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Ya, batalkan!",
                cancelButtonText: "Tidak, kembali",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form			
                    modal.hide();	
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Formulir data anda tidak di batalkan!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Baik, mengerti!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });
    }

    return {
        // Public functions
        init: function () {
            initAddUser();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddUser.init();
});