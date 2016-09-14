/*
 * Disclaimer, 9 September 2016
 *
 * All the code in this file was taken from a script tag in the index.html file
 * produced by running the `polymer init starter-kit` command. It was written by
 * those who work on the Polymer project and as such belongs to Polymer, and in
 * no way belongs to the author of this website, nor does the author of this website
 * claim ownership of this code in any way. The author of this website separated
 * the code in this file from the index.html file for convenience and consistency
 * in how the site is set up, but no other alterations were made by the author
 * of this website, nor is it intended to be used outside of the Polymer environment
 * upon which this website is built. The text of the license in the file from which
 * this code was taken is as follows:
 * Copyright (c) 2016 The Polymer Project Authors. All rights reserved.
 * This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
 * The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
 * The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
 * Code distributed by Google as part of the polymer project is also
 * subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
 */

 // Setup Polymer options
 window.Polymer = {
   dom: 'shadow',
   lazyRegister: true
 };

// Load webcomponentsjs polyfill if browser does not support native Web Components
(function() {
  'use strict';

  var onload = function() {
    // For native Imports, manually fire WebComponentsReady so user code
    // can use the same code path for native and polyfill'd imports.
    if (!window.HTMLImports) {
      document.dispatchEvent(
        new CustomEvent('WebComponentsReady', {bubbles: true})
      );
    }
  };

  var webComponentsSupported = (
    'registerElement' in document
    && 'import' in document.createElement('link')
    && 'content' in document.createElement('template')
  );

  if (!webComponentsSupported) {
    var script = document.createElement('script');
    script.async = true;
    script.src = '/bower_components/webcomponentsjs/webcomponents-lite.min.js';
    script.onload = onload;
    document.head.appendChild(script);
  } else {
    onload();
  }
})();

// Load pre-caching Service Worker
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/service-worker.js');
  });
}
