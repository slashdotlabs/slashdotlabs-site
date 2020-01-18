const overrides = () => {
    // ?Default validator options
    $.validator.setDefaults({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: (error, e) => {
            jQuery(e).parents('.form-group > div').append(error);
        },
        highlight: e => {
            jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: e => {
            jQuery(e).closest('.form-group').removeClass('is-invalid');
            jQuery(e).remove();
        },
    });

    // ?Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });
};

const hostingPackagesSection = () => {
    // ?Hosting packages datatable
    const tbHostingPackages = $('#tb-hosting-packages');
    const dtHostingPackages = tbHostingPackages.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-center'},
            {targets: 0, width: "15%"},
            {targets: [4], orderable: false}
        ]
    });
};

const sslCertificatesSection = () => {
    // ?SSL certificates datatable
    const tbSslCertificates = $('#tb-ssl-certificates');
    const dtSslCertificates = tbSslCertificates.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-center'},
            {targets: 0, width: "15%"},
            {targets: [3], orderable: false}
        ]
    });
};

const customerDomainsSection = () => {
    // ?Customer domain datatable
    const tbCustomerDomains = $("#tb-customer-domains");
    const dtCustomerDomains = tbCustomerDomains.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-center'},
            {targets: 0, width: "15%"},
            {targets: [3, 4], orderable: false}
        ]
    });

    // ?Domain nameserver editing
    const nameserverEditModal = $('#update-nameservers-modal');
    const nameserverForm = $('#update-nameservers-form');
    const fieldsWrapper = $('#nameserver-fields-wrapper');

    // ?Html content for nameserver fields for dynamic adding add deletion
    const nameserverField = (index, nameserver = {}) => {
        if ($.isEmptyObject(nameserver)) {
            nameserver = {
                ip_address: ''
            }
        }
        return `<div class="item-wrapper form-group">
                    <label for="nameserver${index}">Name Server IP Address</label>
                    <div class="d-flex">
                        <input type="text" class="w-75 form-control form-control" id="nameserver${index}" name="nameservers[]" data-nameserver-id="${nameserver['id']}" value="${nameserver['ip_address']}" placeholder="e.g. 172.192.34.44" autocomplete="off" required>
                        <button class="ml-2 flex-grow-1 btn btn-alt-danger remove-nameserver-row">
                            <i class="si si-close"></i> Delete
                        </button>
                    </div>
                </div>`;
    };

    // ?Add row interactivity
    $('.add-nameserver-row').on('click', (event, nameserver = {}) => {
        event.preventDefault();
        const rowsPresent = fieldsWrapper.children().length;
        if ($.isEmptyObject(nameserver)) {
            fieldsWrapper.append(nameserverField(rowsPresent));
        } else {
            fieldsWrapper.append(nameserverField(rowsPresent, nameserver));
        }

        // Add validation rule
        $(`input#nameserver${rowsPresent}`).rules('add', {
            required: true
        });

        // Remove empty indicator
        if (!nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
            nameserverForm.find('.empty-nameservers').addClass('d-none');
        }
    });

    // ?Remove row interactivity
    nameserverForm.on('click', '.remove-nameserver-row', event => {
        event.preventDefault();
        const _this = $(event.target);
        const row = _this.closest('.item-wrapper');
        row.remove();

        // if empty show indicator
        if (fieldsWrapper.children().length === 0 && nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
            nameserverForm.find('.empty-nameservers').removeClass('d-none');
        }
    });

    // ?Validation
    const nameserverFormValidator = nameserverForm.validate({
        errorPlacement: (error, e) => {
            jQuery(e).parents('.form-group').append(error);
        }
    });

    // ?Form submission
    $("#btn-update-nameservers").on('click', () => nameserverForm.trigger('submit'));
    nameserverForm.on('submit', event => {
        event.preventDefault();
        const _this = $(event.target);
        const data = _this.serializeArray();
        console.log(data);
        // return;
        if (!nameserverFormValidator.valid() || fieldsWrapper.children().length === 0) return false;

        Codebase.blocks('#nameserver-form-block', 'state_loading');

        axios.post(_this.attr('action'), data)
            .then(res => {
                console.log(res);
            })
            .catch(error => {
                if (error.response.status === 422) {
                    const errors = error.response.data.errors;
                    console.log(errors);
                }
            })
            .finally(() => {
                Codebase.blocks('#nameserver-form-block', 'state_normal');
            });
    });

    // ?Populate existing nameservers before modal show
    tbCustomerDomains.find('.edit-nameserver').on('click', event => {
        event.preventDefault();
        const _this = $(event.target);
        const nameservers = _this.data('nameservers');
        const domainId = _this.data('domain-id');

        nameserverForm.find('input[name=domain_id]').val(domainId);

        if (nameservers.length === 0 && nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
            nameserverForm.find('.empty-nameservers').removeClass('d-none');
        } else {
            nameserverForm.find('.empty-nameservers').addClass('d-none');
        }

        nameservers.forEach(nameserver => {
            $('.add-nameserver-row').trigger('click', nameserver);
        });

        // ?Show modal
        nameserverEditModal.modal('show');
    });

    // ?On modal hide, reset form
    nameserverEditModal.on('hidden.bs.modal', event => {
        nameserverFormValidator.resetForm();
        nameserverForm[0].reset();
        fieldsWrapper.empty();
    });
};

// ?Main, runs when page loads
$(() => {
    overrides();
    hostingPackagesSection();
    sslCertificatesSection();
    customerDomainsSection();
});
