const overrides = () => {
    // ?Default validator options
    $.validator.setDefaults({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        focusCleanup: true,
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

    // ?Custom validator method
    jQuery.validator.addMethod(
        'notEqualToGroup',
        function (value, element, options) {
            // get all the elements passed here with the same class
            const group = $(element)
                .parents('form')
                .find(options[0])
                .not(element);
            if (group.length === 0) return true;

            return !group.toArray().some(element => $(element).val() === value) || this.optional(element);
        },
        'Duplicate IP address'
    );

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
            {targets: [4], class: 'text-center'},
            {targets: [0], class: 'text-right'},
            {targets: [1, 2, 3], class: 'text-left'},
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
            {targets: [3], class: 'text-center'},
            {targets: [0], class: 'text-right'},
            {targets: [1, 2], class: 'text-left'},
            {targets: 0, width: "15%"},
            {targets: [3], orderable: false}
        ]
    });
};

const customerDomainsSection = () => {
    // ?Customer domain datatable
    const tbCustomerDomains = $("#tb-customer-domains");
    const dtCustomerDomains = tbCustomerDomains.DataTable({
        scrollX: true,
        autoWidth: true,
        columnDefs: [
            {targets: [3, 4], class: 'text-center'},
            {targets: [0], class: 'text-right'},
            {targets: [1, 2], class: 'text-left'},
            {targets: 0, width: "15%"},
            {targets: [3, 4], orderable: false}
        ]
    });

    // ?Domain nameserver editing
    const nameserverEditModal = $('#update-nameservers-modal');
    const nameserverForm = $('#update-nameservers-form');
    const fieldsWrapper = $('#nameserver-fields-wrapper');

    // ?Validation
    const nameserverFormValidator = nameserverForm.validate({
        errorPlacement: (error, e) => {
            jQuery(e).parents('.form-group').append(error);
        }
    });

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
                        <input type="text" class="w-75 form-control form-control distinct-ip" id="nameserver${index}" name="nameserver${index}" data-nameserver-id="${nameserver['id']}" value="${nameserver['ip_address']}" placeholder="e.g. 172.192.34.44" autocomplete="off" required>
                        <a href="javascript.void(0);" class="ml-2 flex-grow-1 btn btn-alt-danger remove-nameserver-row" tabindex="-1">
                            <i class="si si-close"></i> Delete
                        </a>
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
            required: true,
            notEqualToGroup: ['.distinct-ip']
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
        _this.closest('.item-wrapper').remove();

        // if empty show indicator
        if (fieldsWrapper.children().length === 0 && nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
            nameserverForm.find('.empty-nameservers').removeClass('d-none');
        }
    });

    // ?Global state for nameservers of current domain
    let domainNameservers = {};

    // ?Form submission
    $("#btn-update-nameservers").on('click', () => nameserverForm.trigger('submit'));
    nameserverForm.on('submit', event => {
        event.preventDefault();
        if (!nameserverForm.valid() || fieldsWrapper.children().length === 0) return false;
        const _this = $(event.target);
        const formData = _this.serializeArray();
        const formNameservers = formData.filter(item => {
            return item['name'].includes('nameserver');
        }).map(item => item['value']);
        const data = {
            domain_id: _this.find('[name=domain_id]').val(),
            domainNameservers, formNameservers
        };

        Codebase.blocks('#nameserver-form-block', 'state_loading');

        axios.post(_this.attr('action'), data)
            .then(res => {
                // update nameservers record
                tbCustomerDomains.find(`.edit-nameserver[data-domain-id=${res.data.domain_id}]`)
                    .data('nameservers', res.data['nameservers']);
                Codebase.helpers('notify', {
                    align: 'right',
                    from: 'top',
                    type: 'success',
                    icon: 'fa fa-info mr-5',
                    message: 'You have successfully updated your nameservers'
                });
                nameserverEditModal.modal('hide');
            })
            .catch(error => {
                if (error.response.status === 422) {
                    const errors = error.response.data.errors;
                    const errorData = {};
                    Object.keys(errors).forEach(entry => {
                        const [_, index] = entry.split('.');
                        errorData[`nameserver${index}`] = errors[entry];
                    });
                    nameserverFormValidator.showErrors(errorData)
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
        domainNameservers = _this.data('nameservers');
        const domainId = _this.data('domain-id');

        nameserverForm.find('input[name=domain_id]').val(domainId);

        if (domainNameservers.length === 0 && nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
            nameserverForm.find('.empty-nameservers').removeClass('d-none');
        } else {
            nameserverForm.find('.empty-nameservers').addClass('d-none');
        }

        domainNameservers.forEach(nameserver => {
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
