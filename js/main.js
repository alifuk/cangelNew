document.write('<script src="./js/imagesloaded.min.js"><\/script>');


;
var Cangel = Cangel || {}
Cangel.core = Cangel.core || {
    url: null,
    defaultPage: "slider",
    $container: $("#container"),
    $intro: $("#intro"),
    rotationTime: 500,
    putContentInWaitTime: 100,
    containerRotating: false,
    init: function () {
        console.log("Initialising the awesome");
        var _this = this;

        this.parseUrl();
        this.parseHash();

        _this.resize();
        $(window).resize(function () {
            _this.resize();
        });

        window.addEventListener("popstate", function (e) {
            _this.parseHash(false);
        });
    },
    resize: function () {
        this.$container.height($(window).height() - 80 + "px");
    },
    parseUrl: function () {
        var url = location.href;
        var hashIndex = url.indexOf("#");
        if (hashIndex !== -1) {
            url = url.substring(0, hashIndex);
        }
        this.url = url;
    },
    parseHash: function (pushState) {
        var hash = window.location.hash;
        console.log("Loaded hash: " + hash);
        hash = hash.replace("#", "");
        var page = "";
        var parameter = "";
        if (hash === "") { // If there is no hash, load default page
            page = this.defaultPage;
        } else {
            var slashIndex = hash.indexOf("/");
            if (slashIndex === -1) {
                page = hash;
            } else {
                page = hash.substring(0, slashIndex);
                parameter = hash.substring(slashIndex + 1, hash.length);
            }
        }

        console.log("Page: " + page + " Parameter: " + parameter);
        this.setPage(page, parameter, pushState);
    },
    /**
     * Tries to get page from cache, otherwise loads it by AJAH
     * @param {type} url
     * @param {type} parameter
     * @returns {unresolved}
     */
    setPage: function (url, parameter, pushState) {
        var _this = this;
        if (!this.$container.hasClass("rotate")) {
            this.$container.addClass("rotate");
            _this.containerRotating = true;
            setTimeout(function () {
                _this.containerRotating = false;
            }, this.rotationTime);
        }

        if (typeof parameter === "undefined") {
            parameter = "";
        }

        if (pushState !== false) {
            history.pushState(null, "The Studio - " + url + parameter, this.url + "#" + url +"/"+ parameter);
        }

        if (sessionStorage.getItem(url + parameter) !== null) {
            console.log("Page " + url + parameter + " was found in cache");
            this.putContentIn(sessionStorage.getItem(url + parameter));
        } else {
            console.log("Page not found in cahce, calling AJAH");
            this.loadByAJAH(url, parameter);
        }
    },
    savePageToCache: function (url, parameter, data) {
        //sessionStorage.setItem(url + parameter, data)
    },
    loadByAJAH: function (url, parameter) {
        var _this = this;
        $.post(this.url + url + ".php", {
            parameter: parameter,
        })
                .done(function (data) {
                    console.log("AJAH recieved data ");
                    _this.savePageToCache(url, parameter, data);
                    _this.putContentIn(data);
                })
                .fail(function () {
                    console.log("AJAH error");
                })
                .always(function () {
                });
    },
    putContentIn: function (html) {
        var _this = this;
        if (this.containerRotating) { //container is still rotating
            console.log("Container still rotating");
            setTimeout(function () {
                _this.putContentIn(html)
            }, this.putContentInWaitTime)
        } else { //container is ready to be filled with data
            console.log("Filling container");

            this.$container.html(html);

            imagesLoaded(this.$container, function () {
                console.log("Content fully loaded");
                if (!_this.$intro.hasClass("hidden")) {
                    _this.$intro.fadeOut(1000);
                    _this.$intro.addClass("hidden");
                }
                _this.$container.removeClass("rotate");
            });
        }
    }
}

$(function () {
    Cangel.core.init();
});




