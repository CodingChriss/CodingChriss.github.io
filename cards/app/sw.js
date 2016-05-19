console.log("sw.js is running");

importScripts('/cache-polyfill.js');

self.addEventListener('install', function(e) {
e.waitUntil(
caches.open('Sergeantmax').then(function(cache) {
return cache.addAll([
'/cards/app/',
'/index.html',
'/style.css',
'/shadow.css',
'/script.js',
'/twitter.png',
'/facebook.png'
]);
})
);
});
