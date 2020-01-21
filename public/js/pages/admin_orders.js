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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/admin_orders.js":
/*!********************************************!*\
  !*** ./resources/js/pages/admin_orders.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // Override a few DataTable defaults
  jQuery.extend(jQuery.fn.dataTable.ext.classes, {
    sWrapper: "dataTables_wrapper dt-bootstrap4"
  }); // Orders datatable

  var tbOrders = $('#tb-orders');
  var dtOrders = tbOrders.DataTable({
    columnDefs: [{
      targets: [1],
      "class": 'text-left'
    }, {
      targets: [0, 2],
      "class": 'text-right'
    }, {
      targets: [4, 5],
      "class": 'text-center'
    }, {
      targets: 0,
      width: "11%"
    }, {
      targets: [4, 5],
      orderable: false
    }]
  }); // display order details

  var tbOrderDetails = $('#tb-order-items');
  var orderDetailsModal = $('#order-details-modal');
  var dtOrderDetails = tbOrderDetails.DataTable({
    paging: false,
    columns: [{
      data: function data(record) {
        return record['product']['product_name'] ? record['product']['product_name'] : record['product']['domain_name'];
      }
    }, {
      data: function data(record) {
        return record['product']['product_type'] ? record['product']['product_type'].toUpperCase() : 'domain'.toUpperCase();
      }
    }, {
      data: 'expiry_date'
    }, {
      data: function data(record) {
        switch (record['item_status']) {
          case 'active':
            return "<span class=\"badge badge-success\">Active</span>";

          case 'expiring_soon':
            return "<span class=\"badge badge-warning\">Expiring Soon</span>";

          case 'expired':
            return "<span class=\"badge badge-danger\">Expired</span>";
        }
      }
    }],
    columnDefs: [{
      targets: [1, 2],
      "class": 'text-left'
    }, {
      targets: [3],
      "class": 'text-center'
    }, {
      targets: [3],
      orderable: false
    }]
  });
  tbOrders.on('click', '.show-order-items', function (event) {
    var _this = $(event.target);

    var orderDetails = _this.data('order-items');

    var orderId = _this.data('order-id');

    orderDetailsModal.find('#order-id').text(orderId);
    dtOrderDetails.clear();
    dtOrderDetails.rows.add(orderDetails).draw();
    dtOrderDetails.columns.adjust().draw();
    orderDetailsModal.modal('show');
  });
});

/***/ }),

/***/ 3:
/*!**************************************************!*\
  !*** multi ./resources/js/pages/admin_orders.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\slashdot-site\resources\js\pages\admin_orders.js */"./resources/js/pages/admin_orders.js");


/***/ })

/******/ });