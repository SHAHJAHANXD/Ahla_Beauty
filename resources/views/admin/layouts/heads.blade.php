<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/../../../code.ionicframework.com/ionicons/2.0.1/css/.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/jqvmap/jqvmap.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min2167.css?v=3.2.0">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">
<script nonce="7668cbeb-c235-492f-aa07-6abde2e2e15b">
    (function(w, d) {
        ! function(Z, _, ba, bb) {
            Z.zarazData = Z.zarazData || {};
            Z.zarazData.executed = [];
            Z.zaraz = {
                deferred: []
                , listeners: []
            };
            Z.zaraz.q = [];
            Z.zaraz._f = function(bc) {
                return function() {
                    var bd = Array.prototype.slice.call(arguments);
                    Z.zaraz.q.push({
                        m: bc
                        , a: bd
                    })
                }
            };
            for (const be of ["track", "set", "debug"]) Z.zaraz[be] = Z.zaraz._f(be);
            Z.zaraz.init = () => {
                var bf = _.getElementsByTagName(bb)[0]
                    , bg = _.createElement(bb)
                    , bh = _.getElementsByTagName("title")[0];
                bh && (Z.zarazData.t = _.getElementsByTagName("title")[0].text);
                Z.zarazData.x = Math.random();
                Z.zarazData.w = Z.screen.width;
                Z.zarazData.h = Z.screen.height;
                Z.zarazData.j = Z.innerHeight;
                Z.zarazData.e = Z.innerWidth;
                Z.zarazData.l = Z.location.href;
                Z.zarazData.r = _.referrer;
                Z.zarazData.k = Z.screen.colorDepth;
                Z.zarazData.n = _.characterSet;
                Z.zarazData.o = (new Date).getTimezoneOffset();
                Z.zarazData.q = [];
                for (; Z.zaraz.q.length;) {
                    const bl = Z.zaraz.q.shift();
                    Z.zarazData.q.push(bl)
                }
                bg.defer = !0;
                for (const bm of [localStorage, sessionStorage]) Object.keys(bm || {}).filter((bo => bo.startsWith("_zaraz_"))).forEach((bn => {
                    try {
                        Z.zarazData["z_" + bn.slice(7)] = JSON.parse(bm.getItem(bn))
                    } catch {
                        Z.zarazData["z_" + bn.slice(7)] = bm.getItem(bn)
                    }
                }));
                bg.referrerPolicy = "origin";
                bg.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(Z.zarazData)));
                bf.parentNode.insertBefore(bg, bf)
            };
            ["complete", "interactive"].includes(_.readyState) ? zaraz.init() : Z.addEventListener("DOMContentLoaded", zaraz.init)
        }(w, d, 0, "script");
    })(window, document);

</script>
