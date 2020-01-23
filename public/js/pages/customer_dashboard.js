/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/customer_dashboard.js":
/*!**************************************************!*\
  !*** ./resources/js/pages/customer_dashboard.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

var overrides = function overrides() {
  // ?Default validator options
  $.validator.setDefaults({
    ignore: [],
    errorClass: 'invalid-feedback animated fadeInDown',
    errorElement: 'div',
    focusCleanup: true,
    errorPlacement: function errorPlacement(error, e) {
      jQuery(e).parents('.form-group > div').append(error);
    },
    highlight: function highlight(e) {
      jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
    },
    success: function success(e) {
      jQuery(e).closest('.form-group').removeClass('is-invalid');
      jQuery(e).remove();
    }
  }); // ?Custom validator method

  jQuery.validator.addMethod('notEqualToGroup', function (value, element, options) {
    // get all the elements passed here with the same class
    var group = $(element).parents('form').find(options[0]).not(element);
    if (group.length === 0) return true;
    return !group.toArray().some(function (element) {
      return $(element).val() === value;
    }) || this.optional(element);
  }, 'Duplicate IP address'); // ?Override a few DataTable defaults

  jQuery.extend(jQuery.fn.dataTable.ext.classes, {
    sWrapper: "dataTables_wrapper dt-bootstrap4"
  });
};

var hostingPackagesSection = function hostingPackagesSection() {
  // ?Hosting packages datatable
  var tbHostingPackages = $('#tb-hosting-packages');
  var dtHostingPackages = tbHostingPackages.DataTable({
    columnDefs: [{
      targets: [4],
      "class": 'text-center'
    }, {
      targets: [0],
      "class": 'text-right'
    }, {
      targets: [1, 2, 3],
      "class": 'text-left'
    }, {
      targets: 0,
      width: "15%"
    }, {
      targets: [4],
      orderable: false
    }]
  });
};

var sslCertificatesSection = function sslCertificatesSection() {
  // ?SSL certificates datatable
  var tbSslCertificates = $('#tb-ssl-certificates');
  var dtSslCertificates = tbSslCertificates.DataTable({
    columnDefs: [{
      targets: [3],
      "class": 'text-center'
    }, {
      targets: [0],
      "class": 'text-right'
    }, {
      targets: [1, 2],
      "class": 'text-left'
    }, {
      targets: 0,
      width: "15%"
    }, {
      targets: [3],
      orderable: false
    }]
  });
};

var customerDomainsSection = function customerDomainsSection() {
  // ?Customer domain datatable
  var tbCustomerDomains = $("#tb-customer-domains");
  var dtCustomerDomains = tbCustomerDomains.DataTable({
    scrollX: true,
    autoWidth: true,
    columnDefs: [{
      targets: [3, 4],
      "class": 'text-center'
    }, {
      targets: [0],
      "class": 'text-right'
    }, {
      targets: [1, 2],
      "class": 'text-left'
    }, {
      targets: 0,
      width: "15%"
    }, {
      targets: [3, 4],
      orderable: false
    }]
  }); // ?Domain nameserver editing

  var nameserverEditModal = $('#update-nameservers-modal');
  var nameserverForm = $('#update-nameservers-form');
  var fieldsWrapper = $('#nameserver-fields-wrapper'); // ?Validation

  var nameserverFormValidator = nameserverForm.validate({
    errorPlacement: function errorPlacement(error, e) {
      jQuery(e).parents('.form-group').append(error);
    }
  }); // ?Html content for nameserver fields for dynamic adding add deletion

  var nameserverField = function nameserverField(index) {
    var nameserver = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

    if ($.isEmptyObject(nameserver)) {
      nameserver = {
        ip_address: ''
      };
    }

    return "<div class=\"item-wrapper form-group\">\n                    <label for=\"nameserver".concat(index, "\">Name Server IP Address</label>\n                    <div class=\"d-flex\">\n                        <input type=\"text\" class=\"w-75 form-control form-control distinct-ip\" id=\"nameserver").concat(index, "\" name=\"nameserver").concat(index, "\" data-nameserver-id=\"").concat(nameserver['id'], "\" value=\"").concat(nameserver['ip_address'], "\" placeholder=\"e.g. 172.192.34.44\" autocomplete=\"off\" required>\n                        <a href=\"javascript.void(0);\" class=\"ml-2 flex-grow-1 btn btn-alt-danger remove-nameserver-row\" tabindex=\"-1\">\n                            <i class=\"si si-close\"></i> Delete\n                        </a>\n                    </div>\n                </div>");
  }; // ?Add row interactivity


  $('.add-nameserver-row').on('click', function (event) {
    var nameserver = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
    event.preventDefault();
    var rowsPresent = fieldsWrapper.children().length;

    if ($.isEmptyObject(nameserver)) {
      fieldsWrapper.append(nameserverField(rowsPresent));
    } else {
      fieldsWrapper.append(nameserverField(rowsPresent, nameserver));
    } // Add validation rule


    $("input#nameserver".concat(rowsPresent)).rules('add', {
      required: true,
      notEqualToGroup: ['.distinct-ip']
    }); // Remove empty indicator

    if (!nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
      nameserverForm.find('.empty-nameservers').addClass('d-none');
    }
  }); // ?Remove row interactivity

  nameserverForm.on('click', '.remove-nameserver-row', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    _this.closest('.item-wrapper').remove(); // if empty show indicator


    if (fieldsWrapper.children().length === 0 && nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
      nameserverForm.find('.empty-nameservers').removeClass('d-none');
    }
  }); // ?Global state for nameservers of current domain

  var domainNameservers = {}; // ?Form submission

  $("#btn-update-nameservers").on('click', function () {
    return nameserverForm.trigger('submit');
  });
  nameserverForm.on('submit', function (event) {
    event.preventDefault();
    if (!nameserverForm.valid() || fieldsWrapper.children().length === 0 && domainNameservers.length === 0) return false;

    var _this = $(event.target);

    var formData = _this.serializeArray();

    var formNameservers = formData.filter(function (item) {
      return item['name'].includes('nameserver');
    }).map(function (item) {
      return item['value'];
    });
    var data = {
      domain_id: _this.find('[name=domain_id]').val(),
      domainNameservers: domainNameservers,
      formNameservers: formNameservers
    };
    Codebase.blocks('#nameserver-form-block', 'state_loading');
    axios.post(_this.attr('action'), data).then(function (res) {
      // update nameservers record
      tbCustomerDomains.find(".edit-nameserver[data-domain-id=".concat(res.data.domain_id, "]")).data('nameservers', res.data['nameservers']);
      Codebase.helpers('notify', {
        align: 'right',
        from: 'top',
        type: 'success',
        icon: 'fa fa-info mr-5',
        message: 'You have successfully updated your nameservers'
      });
      nameserverEditModal.modal('hide');
    })["catch"](function (error) {
      if (error.response.status === 422) {
        var errors = error.response.data.errors;
        var errorData = {};
        Object.keys(errors).forEach(function (entry) {
          var _entry$split = entry.split('.'),
              _entry$split2 = _slicedToArray(_entry$split, 2),
              _ = _entry$split2[0],
              index = _entry$split2[1];

          errorData["nameserver".concat(index)] = errors[entry];
        });
        nameserverFormValidator.showErrors(errorData);
      }
    })["finally"](function () {
      Codebase.blocks('#nameserver-form-block', 'state_normal');
    });
  }); // ?Populate existing nameservers before modal show

  tbCustomerDomains.find('.edit-nameserver').on('click', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    domainNameservers = _this.data('nameservers');

    var domainId = _this.data('domain-id');

    nameserverForm.find('input[name=domain_id]').val(domainId);

    if (domainNameservers.length === 0 && nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
      nameserverForm.find('.empty-nameservers').removeClass('d-none');
    } else if (domainNameservers.length !== 0 && !nameserverForm.find('.empty-nameservers').hasClass('d-none')) {
      nameserverForm.find('.empty-nameservers').addClass('d-none');
    }

    domainNameservers.forEach(function (nameserver) {
      $('.add-nameserver-row').trigger('click', nameserver);
    }); // ?Show modal

    nameserverEditModal.modal('show');
  }); // ?On modal hide, reset form

  nameserverEditModal.on('hidden.bs.modal', function (event) {
    nameserverFormValidator.resetForm();
    nameserverForm[0].reset();
    fieldsWrapper.empty();
  });
}; // ?Main, runs when page loads


$(function () {
  overrides();
  hostingPackagesSection();
  sslCertificatesSection();
  customerDomainsSection();
});

/***/ }),

/***/ 6:
/*!********************************************************!*\
  !*** multi ./resources/js/pages/customer_dashboard.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\SLASHDOT_Labs\resources\js\pages\customer_dashboard.js */"./resources/js/pages/customer_dashboard.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\slashdot-site\resources\js\pages\customer_dashboard.js */"./resources/js/pages/customer_dashboard.js");
/***/ })

/******/ });