
var CACHE_NAME = 'static-v1';

self.addEventListener('install', function (event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function (cache) {
      return cache.addAll([
        '/',
        '/assets/bootstrap-5.1.3/css/bootstrap.min.css',
        '/assets/bootstrap-5.1.3/js/bootstrap.bundle.min.js',
        '/assets/js/jquery-1.11.0.js',
      ]);
    })
  )
});

self.addEventListener('activate', function activator(event) {
  event.waitUntil(
    caches.keys().then(function (keys) {
      return Promise.all(keys
        .filter(function (key) {
          return key.indexOf(CACHE_NAME) !== 0;
        })
        .map(function (key) {
          return caches.delete(key);
        })
      );
    })
  );
});

self.addEventListener('fetch', function (event) {
  event.respondWith(
    caches.match(event.request).then(function (cachedResponse) {
      return cachedResponse || fetch(event.request);
    })
  );
});

let deferredPrompt; // Allows to show the install prompt
let setupButton;
window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;
    console.log("beforeinstallprompt fired");
    if (setupButton == undefined) {
        setupButton = document.getElementById("setup_button");
    }
    // Show the setup button
    setupButton.style.display = "inline";
    setupButton.disabled = false;
});

window.addEventListener('appinstalled', (evt) => {
  console.log("appinstalled fired", evt);
});