/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);

/**
 * Inspector Controls and react hook with all the necessary props.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */




/**
 * Renders the `epico/dynamic-year-block` block on the editor.
 *
 * @param {Object} props                   React props.
 * @param {Object} props.setAttributes     Callback for updating block attributes.
 * @param {Object} props.attributes        Block attributes.
 * @param {string} props.attributes.format Format of the year.
 *
 * @return {JSX.Element} React element.
 */
function Edit({
  attributes: {
    format,
    beforeElement,
    afterElement,
    alignment,
    displaySiteName
  },
  // The default value is saved on block.json.
  setAttributes
}) {
  // Define the two-digit year for the help text.
  const year = wp.date.dateI18n('y');

  // Block properties.
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps)();

  // Define the inspector controls.
  const inspectorControls = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Settings', 'dynamic-year-block')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RadioControl, {
    className: 'dynamic-year-block',
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Year format:', 'dynamic-year-block'),
    selected: format,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Four digits', 'dynamic-year-block'),
      value: 'Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Two digits', 'dynamic-year-block'),
      value: 'y'
    }],
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.sprintf)( /* translators: %1s and %2s are the two-digit current year. See http://php.net/date. */
    (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('The two-digit abbreviation is often used after an apostrophe (e.g., ’%1$s) or in a date range (e.g., 2021-%2$s).', 'dynamic-year-block'), year, year),
    onChange: newFormat => setAttributes({
      format: newFormat
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Text Before Date', 'dynamic-year-block'),
    checked: beforeElement !== '',
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Enable to prepend any custom text. Default: “© Copyright”. Toggling resets to default.', 'dynamic-year-block'),
    onChange: newBeforeElement => setAttributes({
      beforeElement: newBeforeElement ? beforeElement || (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('© Copyright' + '\u00A0', 'dynamic-year-block') : ''
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Site Name After Date', 'dynamic-year-block'),
    checked: displaySiteName,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Display the site name after the current year, linked to the homepage.', 'dynamic-year-block'),
    onChange: newDisplaySiteName => setAttributes({
      displaySiteName: newDisplaySiteName
    })
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Text After Date', 'dynamic-year-block'),
    checked: afterElement !== '',
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Enable to append custom text. Default: “All rights reserved”. Toggling resets to default.', 'dynamic-year-block'),
    onChange: newAfterElement => setAttributes({
      afterElement: newAfterElement ? afterElement || (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('\u00A0' + 'All rights reserved', 'dynamic-year-block') : ''
    })
  })));

  // Get the current year.
  const currentYear = wp.date.dateI18n(format);

  // Add a small margin to the help text.
  const editorInlineStyle = `
		.dynamic-year-block > [id*="help"] {
			margin-top: 15px !important;
		}
	`;

  // Return the controls and the block markup for the editor.
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, inspectorControls, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, editorInlineStyle), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...blockProps
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.BlockControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.AlignmentToolbar, {
    value: alignment,
    onChange: newAlignment => setAttributes({
      alignment: newAlignment === undefined ? 'none' : newAlignment
    })
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: 'dynamic-year-' + currentYear,
    style: {
      textAlign: alignment
    }
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.RichText, {
    tagName: "span",
    className: "dynamic-year-before",
    allowedFormats: ['core/bold', 'core/italic', 'core/link'],
    placeholder: beforeElement !== '' ? (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Enter text', 'dynamic-year-block') : '',
    value: beforeElement,
    onChange: newBeforeElement => setAttributes({
      beforeElement: newBeforeElement
    })
  }), currentYear, displaySiteName ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, ' ', (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    onClick: event => {
      event.preventDefault(); // Prevent the default link behavior
    },

    target: "_self",
    rel: "home",
    href: dynamicYearBlockData.siteUrl
  }, dynamicYearBlockData.siteTitle)) : null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.RichText, {
    tagName: "span",
    className: "dynamic-year-after",
    allowedFormats: ['core/bold', 'core/italic', 'core/link'],
    placeholder: afterElement !== '' ? (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Enter text', 'dynamic-year-block') : '',
    value: afterElement,
    onChange: newAfterElement => setAttributes({
      afterElement: newAfterElement
    })
  }))));
}

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/block.json":
/*!************************!*\
  !*** ./src/block.json ***!
  \************************/
/***/ ((module) => {

module.exports = JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"epico/dynamic-year-block","version":"0.6.1","title":"Dynamic Year","category":"text","icon":"calendar","keywords":["year","dynamic","date","block","footer","copyright"],"description":"A block that always displays the current year.","textdomain":"dynamic-year-block","attributes":{"format":{"type":"string","default":"Y"},"beforeElement":{"type":"string","default":""},"afterElement":{"type":"string","default":""},"alignment":{"type":"string","default":"none"},"displaySiteName":{"type":"boolean","default":false}},"usesContext":["backgroundColor","foregroundColor"],"supports":{"anchor":true,"html":false,"className":true,"__experimentalBorder":{"color":true,"radius":true,"style":true,"width":true},"spacing":{"padding":true,"margin":true},"dimensions":{"minHeight":true},"color":{"gradients":true,"link":true,"__experimentalDefaultControls":{"background":true,"text":true,"link":true}},"typography":{"fontSize":true,"lineHeight":true,"__experimentalFontFamily":true,"__experimentalFontWeight":true,"__experimentalFontStyle":true,"__experimentalTextTransform":true,"__experimentalTextDecoration":true,"__experimentalLetterSpacing":true,"__experimentalDefaultControls":{"fontSize":true}}},"editorScript":"file:./index.js"}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./block.json */ "./src/block.json");

/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */


/**
 * Internal dependencies
 */



/**
 * Register a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_3__.name, {
  // Block preview.
  example: {
    viewportWidth: 100
  },
  icon: {
    src: (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "24",
      height: "24",
      viewBox: "0 0 24 24",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M3.097,11.731l-0.006,-0l0,0.269c0,4.917 3.992,8.909 8.909,8.909c2.755,-0 5.221,-1.254 6.855,-3.221l1.129,1.129c-1.926,2.253 -4.789,3.683 -7.984,3.683c-5.795,0 -10.5,-4.705 -10.5,-10.5c0,-1.613 0.364,-3.141 1.016,-4.508c-0,0 2.795,2.796 3.845,3.846l-3.244,0l-0.02,0.393Zm8.711,-1.043l0.19,0.191l3.637,-3.637c-0,0 1.143,1.144 1.143,1.144c0,-0 -3.971,3.971 -3.971,3.971l-0,5.028c-0,-0 -1.618,-0 -1.618,-0c0,-0 0,-5.028 0,-5.028l-3.967,-3.967c-0,-0 1.143,-1.144 1.143,-1.144c0,0 3.443,3.442 3.443,3.442Zm9.095,1.581l0.006,0l-0,-0.269c-0,-4.917 -3.992,-8.909 -8.909,-8.909c-2.755,0 -5.221,1.254 -6.855,3.221c0,0 -1.129,-1.129 -1.129,-1.129c1.926,-2.253 4.789,-3.683 7.984,-3.683c5.795,-0 10.5,4.705 10.5,10.5c0,1.613 -0.364,3.141 -1.016,4.508l-3.845,-3.846l3.244,-0c0.009,-0.131 0.016,-0.262 0.02,-0.393Z"
    }))
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  save() {
    return null;
  }
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map