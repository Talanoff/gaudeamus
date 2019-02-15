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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 46);
/******/ })
/************************************************************************/
/******/ ({

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(47);
__webpack_require__(66);
module.exports = __webpack_require__(67);


/***/ }),

/***/ 47:
/***/ (function(module, __webpack_exports__) {

"use strict";
throw new Error("Module build failed: SyntaxError: D:/OSPanel/domains/gaudeamus.loc/resources/js/app/app.js: Unexpected token (3:0)\n\n\u001b[0m \u001b[90m 1 | \u001b[39m\u001b[36mimport\u001b[39m \u001b[33mVue\u001b[39m from \u001b[32m'vue'\u001b[39m\u001b[33m;\u001b[39m\n \u001b[90m 2 | \u001b[39m\n\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 3 | \u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\n \u001b[90m   | \u001b[39m\u001b[31m\u001b[1m^\u001b[22m\u001b[39m\n \u001b[90m 4 | \u001b[39m\n \u001b[90m 5 | \u001b[39m\n \u001b[90m 6 | \u001b[39m\u001b[36mnew\u001b[39m \u001b[33mVue\u001b[39m({\u001b[0m\n");

/***/ }),

/***/ 66:
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleBuildError: Module build failed: \r\n@import \"config/placeholder\";\r\n                            ^\r\n      Invalid CSS after '...g/placeholder\";': expected 1 selector or at-rule, was \"<<<<<<< HEAD\"\r\n      in D:\\OSPanel\\domains\\gaudeamus.loc\\resources\\sass\\app\\app.scss (line 2, column 30)\n    at runLoaders (D:\\OSPanel\\domains\\gaudeamus.loc\\node_modules\\webpack\\lib\\NormalModule.js:195:19)\n    at D:\\OSPanel\\domains\\gaudeamus.loc\\node_modules\\loader-runner\\lib\\LoaderRunner.js:364:11\n    at D:\\OSPanel\\domains\\gaudeamus.loc\\node_modules\\loader-runner\\lib\\LoaderRunner.js:230:18\n    at context.callback (D:\\OSPanel\\domains\\gaudeamus.loc\\node_modules\\loader-runner\\lib\\LoaderRunner.js:111:13)\n    at Object.asyncSassJobQueue.push [as callback] (D:\\OSPanel\\domains\\gaudeamus.loc\\node_modules\\sass-loader\\lib\\loader.js:55:13)\n    at Object.done [as callback] (D:\\OSPanel\\domains\\gaudeamus.loc\\node_modules\\neo-async\\async.js:8077:18)\n    at options.error (D:\\OSPanel\\domains\\gaudeamus.loc\\node_modules\\node-sass\\lib\\index.js:294:32)");

/***/ }),

/***/ 67:
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })

/******/ });