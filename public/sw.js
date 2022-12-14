const preLoad = function () {
    return caches.open("offline").then(function (cache) {
        // caching index and important routes
        return cache.addAll(filesToCache);
    });
};

self.addEventListener("install", function (event) {
    event.waitUntil(preLoad());
});

const filesToCache = [
    '/',
    '/offline.php',
    '/offline/categoriesm.php',
    '/offline/settingsm.php',
    '/offline/settings/about.php',
    '/offline/settings/help.php',
    '/offline/settings/language.php',
    '/offline/settings/theme.php',
    '/offline/settings/footer/av.php',
    '/offline/settings/footer/tyc.php',
    '/js/iconify.min.js',
    '/js/app.js',
    '/css/app.css',
    '/css/style.css',
    '/css/dark-mode.css',
    '/img/mk2otln.png',
    '/img/oflnconblue.png',
    '/js/offline.min.js',
    '/css/offline-language-spanish.css',
    '/css/offline-theme-slide.css',
];

const checkResponse = function (request) {
    return new Promise(function (fulfill, reject) {
        fetch(request).then(function (response) {
            if (response.status !== 404) {
                fulfill(response);
            } else {
                reject();
            }
        }, reject);
    });
};

const addToCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return fetch(request).then(function (response) {
            return cache.put(request, response);
        });
    });
};

const returnFromCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return cache.match(request).then(function (matching) {
            if (!matching || matching.status === 404) {
                return cache.match('offline.php');
            } else {
                return matching;
            }
        });
    });
};

self.addEventListener("fetch", function (event) {
    event.respondWith(checkResponse(event.request).catch(function () {
        return returnFromCache(event.request);
    }));
    if (!event.request.url.startsWith('http')) {
        event.waitUntil(addToCache(event.request));
    }
});
