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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/admin_products.js":
/*!**********************************************!*\
  !*** ./resources/js/pages/admin_products.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); // Override a few DataTable defaults

  jQuery.extend(jQuery.fn.dataTable.ext.classes, {
    sWrapper: "dataTables_wrapper dt-bootstrap4"
  }); // Products datatable

  var updateProductsForm = $('#update-product-form');
  var tbProducts = $('#tb-products');
  var dtProducts = tbProducts.DataTable({
    ajax: {
      url: "".concat(baseURL, "/admin/products"),
      method: 'GET',
      dataSrc: 'data'
    },
    columns: [{
      data: 'DT_RowIndex',
      name: 'DT_RowIndex'
    }, {
      data: 'product_name',
      name: 'product_name'
    }, {
      data: 'product_type',
      name: 'product_type'
    }, {
      data: 'product_description',
      name: 'product_description'
    }, {
      data: 'price',
      name: 'price'
    }, {
      data: 'suspended',
      name: 'suspended'
    }, {
      data: 'action',
      name: 'action'
    }],
    columnDefs: [{
      targets: [1, 2, 3],
      "class": 'text-left'
    }, {
      targets: [0, 4],
      "class": 'text-right'
    }, {
      targets: [5, 6],
      "class": 'text-center'
    }, {
      targets: 6,
      orderable: false
    }, {
      targets: 5,
      render: function render(data, type, row) {
        return data == '1' ? "<span class=\"badge badge-warning\">Suspended</span>" : "<span class=\"badge badge-success\">Active</span>";
      } //TODO: render buttons based on suspended value edit/suspend and edit/restore - remove from controller

    }]
  }); //Show Add Product Modal

  $('#createNewProduct').click(function () {
    $('#btn-add-product').val("create-product");
    $('#product_id').val('');
    $('#add-product-form').trigger("reset");
    $('#modal-add-product').modal('show');
  }); //Add Product

  $('#btn-add-product').click(function (e) {
    e.preventDefault();
    var storeUrl = "".concat(baseURL, "/admin/products/");
    $.ajax({
      data: $('#add-product-form').serialize(),
      url: storeUrl,
      type: "POST",
      dataType: 'json',
      success: function success(response) {
        $('#productForm').trigger("reset");
        $('#modal-add-product').modal('hide');
        dtProducts.ajax.reload();

        if (response.success) {
          $('#success-msg').append('<div class="alert alert-success" role="alert">' + response.success + '</div>');
        }

        setTimeout(function () {
          $('#success-msg').html('');
        }, 5000);
      },
      error: function error(response) {
        var i,
            x = "";
        var errors = response.responseJSON;
        console.log(errors);

        for (i in errors) {
          x = errors[i];
          $('#add-error-msg').append("<div class=\"alert alert-danger\" role=\"alert\">".concat(x, "</div>"));
        }

        setTimeout(function () {
          $('#add-error-msg').html('');
        }, 5000);
      }
    });
  });
  var editProductsModal = $('#modal-edit-product'); // Show edit modal with details

  tbProducts.on('click', '.edit-product', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var rowData = dtProducts.row(_this.closest('tr')).data(); // Fill modal with data

    updateProductsForm.find('[name=product_id]').val(rowData['id']);
    updateProductsForm.find('#edit-product-name').val(rowData['product_name']);
    updateProductsForm.find('#edit-product-description').val(rowData['product_description']);
    updateProductsForm.find('#edit-product-type').val(rowData['product_type']);
    updateProductsForm.find('#edit-product-price').val(rowData['price']); // Show modal

    editProductsModal.modal('show');
  }); // Update product form submission

  $('#btn-update-product').on('click', function (event) {
    return updateProductsForm.trigger('submit');
  });
  updateProductsForm.on('submit', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var productId = _this.find('input[name=product_id]').val();

    var targetURL = "".concat(baseURL, "/admin/products/").concat(productId);
    var product_details = {};

    _this.serializeArray().filter(function (field) {
      return !['product_id', '_method'].includes(field.name);
    }).forEach(function (field) {
      product_details[field.name] = field.value;
    });

    $.ajax({
      url: targetURL,
      method: 'put',
      data: product_details,
      success: function success(Response) {
        dtProducts.ajax.reload();
        editProductsModal.modal('hide');
        $('#success-msg').append('<div class="alert alert-success" role="alert">Product updated successfully.</div>');
        setTimeout(function () {
          $('#success-msg').html('');
        }, 5000);
      },
      error: function error(Response) {
        var i,
            x = "";
        var errors = Response.responseJSON;
        console.log(errors);

        for (i in errors) {
          x = errors[i];
          $('#update-error-msg').append("<div class=\"alert alert-danger\" role=\"alert\">".concat(x, "</div>"));
        }

        setTimeout(function () {
          $('#update-error-msg').html('');
        }, 5000);
      } // response to ajax function without error handling
      // }).then(res => {
      //     console.log(res);
      //     dtProducts.ajax.reload();
      //     // remove modal
      //     editProductsModal.modal('hide');

    });
  }); //Fetch product to suspend modal.

  var suspendProductModal = $('#modal-suspend-product');
  var suspendProductForm = $('#suspend-product-form');
  tbProducts.on('click', '.suspend-product', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var rowData = dtProducts.row(_this.closest('tr')).data();
    suspendProductForm.find('[name=product_id]').val(rowData['id']);
    suspendProductForm.find('#suspend-product-name').val(rowData['product_name']);
    suspendProductModal.modal('show');
  }); //Suspend Product

  $('#btn-suspend-product').on('click', function (event) {
    return suspendProductForm.trigger('submit');
  });
  suspendProductForm.on('submit', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var productId = _this.find('input[name=product_id]').val();

    var targetURL = "".concat(baseURL, "/admin/products/suspend/").concat(productId);
    var product_info = {};

    _this.serializeArray().filter(function (field) {
      return !['product_id', '_method'].includes(field.name);
    }).forEach(function (field) {
      product_info[field.name] = field.value;
    });

    $.ajax({
      url: targetURL,
      method: 'put',
      data: product_info,
      success: function success(resp) {
        dtProducts.ajax.reload();
        suspendProductModal.modal('hide');
        $('#success-msg').append('<div class="alert alert-success" role="alert">Product has been suspended.</div>');
        setTimeout(function () {
          $('#success-msg').html('');
        }, 5000);
      },
      error: function error(resp) {
        $('#suspend-error-msg').append("<div class=\"alert alert-danger\" role=\"alert\">An error occurred. Please try again</div>");
        setTimeout(function () {
          $('#suspend-error-msg').html('');
        }, 5000);
      }
    });
  }); //Fetch product to restore modal.

  var restoreProductModal = $('#modal-restore-product');
  var restoreProductForm = $('#restore-product-form');
  tbProducts.on('click', '.restore-product', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var rowData = dtProducts.row(_this.closest('tr')).data();
    restoreProductForm.find('[name=product_id]').val(rowData['id']);
    restoreProductForm.find('#restore-product-name').val(rowData['product_name']);
    restoreProductModal.modal('show');
  }); //Restore Product

  $('#btn-restore-product').on('click', function (event) {
    return restoreProductForm.trigger('submit');
  });
  restoreProductForm.on('submit', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var productId = _this.find('input[name=product_id]').val();

    var targetURL = "".concat(baseURL, "/admin/products/restore/").concat(productId);
    var product_record = {};

    _this.serializeArray().filter(function (field) {
      return !['product_id', '_method'].includes(field.name);
    }).forEach(function (field) {
      product_record[field.name] = field.value;
    });

    $.ajax({
      url: targetURL,
      method: 'put',
      data: product_record,
      success: function success(resp) {
        dtProducts.ajax.reload();
        restoreProductModal.modal('hide');
        $('#success-msg').append('<div class="alert alert-success" role="alert">Product has been restored successfully.</div>');
        setTimeout(function () {
          $('#success-msg').html('');
        }, 5000);
      },
      error: function error(resp) {
        $('#restore-error-msg').append("<div class=\"alert alert-danger\" role=\"alert\">An error occurred. Please try again</div>");
        setTimeout(function () {
          $('#restore-error-msg').html('');
        }, 5000);
      }
    });
  });
});

/***/ }),

/***/ 2:
/*!****************************************************!*\
  !*** multi ./resources/js/pages/admin_products.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/steekam/public_html/slashdot_dashboard/resources/js/pages/admin_products.js */"./resources/js/pages/admin_products.js");


/***/ })

/******/ });