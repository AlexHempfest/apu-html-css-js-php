const CACHE_NAME = 'demo-cache-v1';
const urlsToCache = [
    '/',
    'image3.jpg',
    'internet-down.html',
    '/index.html',
    // Add other assets (like CSS, JS, images) here if needed
];

// Install event: cache assets
self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open(CACHE_NAME)
        .then(function(cache) {
            console.log('Opened cache');
            return cache.addAll(urlsToCache);
        })
    );
});

// Fetch event: serve assets from cache or fetch from network
self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
        .then(function(response) {
            console.log("Fetch request was triggered")
   
    //return "Message";
             if (response) {
                return fetch(event.request);
                //return response; // Serve from cache
            }
            return fetch(event.request); // Fetch from network
        })
    );
});

// Activate event: clean up old caches
self.addEventListener('activate', function(event) {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName); // Delete old caches
                    }
                })
            );
        })
    );
});