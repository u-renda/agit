var Layout = function() {
    //var o = "layouts/layout5/img/",
    //    n = "layouts/layout5/css/",
    var o = "images/",
        n = "css/theme/",
        e = App.getResponsiveBreakpoint("md"),
        a = function() {
            $(window).scrollTop() > 60 ? $("body").addClass("page-on-scroll") : $("body").removeClass("page-on-scroll")
        },
        t = function() {
            var o = function() {
                var o = $(window).scrollTop();
                o > 100 ? $(".go2top").show() : $(".go2top").hide()
            };
            o(), navigator.userAgent.match(/iPhone|iPad|iPod/i) ? $(window).bind("touchend touchcancel touchleave", function(n) {
                o()
            }) : $(window).scroll(function() {
                o()
            }), $(".go2top").click(function(o) {
                o.preventDefault(), $("html, body").animate({
                    scrollTop: 0
                }, 600)
            })
        },
        i = function() {
            $(".page-header .navbar-nav > .dropdown-fw, .page-header .navbar-nav > .more-dropdown, .page-header .navbar-nav > .dropdown > .dropdown-menu  > .dropdown").click(function(o) {
                if (App.getViewPort().width > e) {
                    if ($(this).hasClass("more-dropdown") || $(this).hasClass("more-dropdown-sub")) return;
                    o.stopPropagation()
                } else o.stopPropagation();
                var n = $(this).parent().find("> .dropdown");
                if (App.getViewPort().width < e) $(this).hasClass("open") ? n.removeClass("open") : (n.removeClass("open"), $(this).addClass("open"), App.scrollTo($(this)));
                else {
                    if ($(this).hasClass("more-dropdown")) return;
                    n.removeClass("open"), $(this).addClass("open"), App.scrollTo($(this))
                }
            }), $(".page-header .navbar-nav .more-dropdown-sub .dropdown-menu, .page-header .navbar-nav .dropdown-sub .dropdown-menu").click(function() {})
        },
        r = function() {
            var o = App.getViewPort().width,
                n = $(".page-header .navbar-nav");
            o >= e && "desktop" !== n.data("breakpoint") ? (n.data("breakpoint", "desktop"), $('[data-hover="extended-dropdown"]', n).not(".hover-initialized").each(function() {
                $(this).dropdownHover(), $(this).addClass("hover-initialized")
            })) : e > o && "mobile" !== n.data("breakpoint") && (n.data("breakpoint", "mobile"), $('[data-hover="extended-dropdown"].hover-initialized', n).each(function() {
                $(this).unbind("hover"), $(this).parent().unbind("hover").find(".dropdown-submenu").each(function() {
                    $(this).unbind("hover")
                }), $(this).removeClass("hover-initialized")
            }))
        };
    return {
        init: function() {
            t(), a(), i(), r(), App.addResizeHandler(r), $(window).scroll(function() {
                a()
            })
        },
        getLayoutImgPath: function() {
            return App.getAssetsPath() + o
        },
        getLayoutCssPath: function() {
            return App.getAssetsPath() + n
        }
    }
}();
jQuery(document).ready(function() {
    Layout.init()
});