console.log("sw.js is running");

importScripts('/cache-polyfill.js');

self.addEventListener('install', function(e) {
e.waitUntil(
caches.open('Sergeantmax').then(function(cache) {
return cache.addAll([
'/cards/app/index.html',
'/cards/app/style.css',
'/cards/app/shadow.css',
'/cards/app/script.js',
'/cards/app/twitter.png',
'/cards/app/facebook.png'
]);
})
);
});

self.addEventListener('fetch', function(event) {
console.log(event.request.url);
event.respondWith(
caches.match(event.request).then(function(response) {
return response || fetch(event.request);
})
);
});
