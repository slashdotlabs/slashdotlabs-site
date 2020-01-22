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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/admin_users.js":
/*!*******************************************!*\
  !*** ./resources/js/pages/admin_users.js ***!
  \*******************************************/
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
  }); // Users datatable

  var suspendUserForm = $('#suspend-user-form');
  var restoreUserForm = $('#restore-user-form');
  var tbUsers = $('#tb-users');
  var dtUsers = tbUsers.DataTable({
    ajax: {
      url: "".concat(baseURL, "/admin/users"),
      method: 'GET',
      dataSrc: 'data'
    },
    columns: [{
      data: 'DT_RowIndex',
      name: 'DT_RowIndex'
    }, {
      data: 'first_name',
      name: 'first_name'
    }, {
      data: 'last_name',
      name: 'last_name'
    }, {
      data: 'email',
      name: 'email'
    }, {
      data: 'user_type',
      name: 'user_type'
    }, {
      data: 'suspended',
      name: 'suspended'
    }, {
      data: 'action',
      name: 'action'
    }],
    columnDefs: [{
      targets: [1, 2, 3, 4],
      "class": 'text-left'
    }, {
      targets: 0,
      "class": 'text-right'
    }, {
      targets: [5, 6],
      "class": 'text-center'
    }, {
      targets: 0,
      width: "10%"
    }, {
      targets: 6,
      orderable: false
    }, {
      targets: 5,
      render: function render(data, type, row) {
        return data == '1' ? "<span class=\"badge badge-warning\">Suspended</span>" : "<span class=\"badge badge-success\">Active</span>";
      }
    }]
  });
  var suspendUserModal = $('#modal-suspend-user'); // show suspend user modal

  tbUsers.on('click', '.suspend-user', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var rowData = dtUsers.row(_this.closest('tr')).data(); // Fill modal with data

    suspendUserForm.find('[name=user_id]').val(rowData['id']);
    suspendUserForm.find('#suspend-user-name').val(rowData['first_name']); // Show modal

    suspendUserModal.modal('show');
  });
  var restoreUserModal = $('#modal-restore-user'); // show restore user modal

  tbUsers.on('click', '.restore-user', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var rowData = dtUsers.row(_this.closest('tr')).data(); // Fill modal with data

    restoreUserForm.find('[name=user_id]').val(rowData['id']);
    restoreUserForm.find('#restore-user-name').val(rowData['first_name']); // Show modal

    restoreUserModal.modal('show');
  }); // Suspend the users account

  $('#btn-suspend-user').on('click', function (event) {
    return suspendUserForm.trigger('submit');
  });
  suspendUserForm.on('submit', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var userId = _this.find('input[name=user_id]').val();

    var targetURL = "".concat(baseURL, "/admin/users/suspend/").concat(userId);
    var user_info = {};

    _this.serializeArray().filter(function (field) {
      return !['user_id', '_method'].includes(field.name);
    }).forEach(function (field) {
      user_info[field.name] = field.value;
    });

    console.log(targetURL);
    $.ajax({
      url: targetURL,
      method: 'put',
      data: user_info,
      success: function success(Response) {
        dtUsers.ajax.reload();
        suspendUserModal.modal('hide');
      },
      error: function error(Response) {
        //var i, x = "";
        var errors = Response.responseJSON;
        console.log(errors);
      }
    });
  }); // Restore the users account

  $('#btn-restore-user').on('click', function (event) {
    return restoreUserForm.trigger('submit');
  });
  restoreUserForm.on('submit', function (event) {
    event.preventDefault();

    var _this = $(event.target);

    var userId = _this.find('input[name=user_id]').val();

    var targetURL = "".concat(baseURL, "/admin/users/restore/").concat(userId);
    var user_info = {};

    _this.serializeArray().filter(function (field) {
      return !['user_id', '_method'].includes(field.name);
    }).forEach(function (field) {
      user_info[field.name] = field.value;
    });

    console.log(targetURL);
    $.ajax({
      url: targetURL,
      method: 'put',
      data: user_info,
      success: function success(Response) {
        dtUsers.ajax.reload();
        suspendUserModal.modal('hide');
      },
      error: function error(Response) {
        var errors = Response.responseJSON;
        console.log(errors);
      }
    });
  });
});

/***/ }),

/***/ 4:
/*!*************************************************!*\
  !*** multi ./resources/js/pages/admin_users.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\slashdot-site\resources\js\pages\admin_users.js */"./resources/js/pages/admin_users.js");


/***/ })

/******/ });