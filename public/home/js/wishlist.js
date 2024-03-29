! function (t) {
    "use strict";
    var i = function (t) {
            window.showAlert("alert-success", t)
        },
        n = function (t) {
            return window.trans = window.trans || {}, "undefined" !== window.trans[t] && window.trans[t] ? window.trans[t] : t
        };
    window.showAlert = function (i, n) {
        if (i && "" !== n) {
            var a = Math.floor(1e3 * Math.random()),
                e = '<div class="alert '.concat(i, ' alert-dismissible" id="').concat(a, '">\n                            <span class="close far fa-times" data-dismiss="alert" aria-label="close"></span>\n                            <i class="far fa-') + ("alert-success" === i ? "check" : "times") + ' message-icon"></i>\n                            '.concat(n, "\n                        </div>");
            t("#alert-container").append(e).ready((function () {
                window.setTimeout((function () {
                    t("#alert-container #".concat(a)).remove()
                }), 6e3)
            }))
        }
    }, t(document).ready((function () {
        function a() {
            var i = window.currentLanguage + "_wishlist",
                n = decodeURIComponent(s(i));
            if (null != n && null != n && n) {
                var a = JSON.parse(n),
                    e = a.length;
                t(".wishlist-count").text(e), e > 0 && (t(".add-to-wishlist").removeClass("far fa-heart"), t.each(a, (function (i, n) {
                    null != n && t(document).find(".add-to-wishlist[data-id=".concat(n.id, "] i")).addClass("fas fa-heart")
                })))
            }
        }

        function e(t, i, n) {
            var a = new Date,
                e = new URL(window.siteUrl);
            a.setTime(a.getTime() + 24 * n * 60 * 60 * 1e3);
            var s = "expires=" + a.toUTCString();
            document.cookie = t + "=" + i + "; " + s + "; path=/; domain=" + e.hostname
        }

        function s(t) {
            for (var i = t + "=", n = document.cookie.split(";"), a = 0; a < n.length; a++) {
                for (var e = n[a];
                    " " == e.charAt(0);) e = e.substring(1);
                if (0 == e.indexOf(i)) return e.substring(i.length, e.length)
            }
            return ""
        }

        function o(t) {
            var i = new URL(window.siteUrl);
            document.cookie = t + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/; domain=" + i.hostname
        }
        a(), t(document).on("click", ".add-to-wishlist", (function (r) {
            r.preventDefault();
            var d = window.currentLanguage + "_wishlist",
                l = t(this).data("id"),
                c = decodeURIComponent(s(d)),
                u = [];
            if (null != l && 0 != l && null != l)
                if (null == c || null == c || "" == c) {
                    var f = {
                        id: l
                    };
                    u.push(f), t(".add-to-wishlist[data-id=".concat(l, "] i")).removeClass("far fa-heart").addClass("fas fa-heart"), i(n("Added to wishlist successfully!")), e(d, JSON.stringify(u), 60)
                } else {
                    var w = {
                            id: l
                        },
                        h = (u = JSON.parse(c)).map((function (t) {
                            return t.id
                        })).indexOf(w.id); - 1 === h ? (u.push(w), o(d), e(d, JSON.stringify(u), 60), t(".add-to-wishlist[data-id=".concat(l, "] i")).removeClass("far fa-heart").addClass("fas fa-heart"), i(n("Added to wishlist successfully!"))) : (u.splice(h, 1), o(d), e(d, JSON.stringify(u), 60), t(".add-to-wishlist[data-id=".concat(l, "] i")).removeClass("fas fa-heart").addClass("far fa-heart"), i(n("Removed from wishlist successfully!")))
                } var m = JSON.parse(s(d)).length;
            t(".wishlist-count").text(m), a()
        })), t(document).on("click", ".remove-from-wishlist", (function (r) {
            r.preventDefault();
            var d = window.currentLanguage + "_wishlist",
                l = t(this).data("id"),
                c = decodeURIComponent(s(d)),
                u = [];
            if (null != l && 0 != l && null != l) {
                var f = {
                        id: l
                    },
                    w = (u = JSON.parse(c)).map((function (t) {
                        return t.id
                    })).indexOf(f.id); - 1 != w && (u.splice(w, 1), o(d), e(d, JSON.stringify(u), 60), i(n("Removed from wishlist successfully!")), t(".wishlist-page .item[data-id=".concat(l, "]")).closest("div").remove())
            }
            var h = JSON.parse(s(d)).length;
            t(".wishlist-count").text(h), a()
        })), window.wishlishInElement = function (i) {
            var n = JSON.parse(s(window.currentLanguage + "_wishlist") || "{}");
            n && n.length && i.find(".add-to-wishlist").map((function () {
                var i = t(this).data("id");
                n.some((function (t) {
                    return t.id === i
                })) && t(this).find("i").addClass("fas")
            }))
        }
    }))
}(jQuery);
