<script>
    !function (p) {
        "use strict";

        function t() {
        }

        t.prototype.send = function (t, i, o, e, n, a, s, r) {
            var c = {
                heading: t,
                text: i,
                position: o,
                loaderBg: e,
                icon: n,
                hideAfter: a = a || 3e3,
                stack: s = s || 1
            };
            r && (c.showHideTransition = r), console.log(c), p.toast().reset("all"), p.toast(c)
        }, p.NotificationApp = new t, p.NotificationApp.Constructor = t
    }(window.jQuery), function (i) {
        "use strict";
        @if(Session::has('message'))
        let type = "{{ Session::get('alert-type' , 'info') }}"

        switch(type) {
            case 'info':
                i.NotificationApp.send("Heads up!", "{{ Session::get('message') }}", "top-right", "#3b98b5", "info");
                break;
            case  'warning' :
                i.NotificationApp.send("Heads up!", "{{ Session::get('message') }}", "top-center", "#da8609", "warning");
                break;
            case 'success':
                i.NotificationApp.send("Well Done!", "{{ Session::get('message') }}", "top-right", "#5ba035", "success")
                break;
            case 'danger':
                i.NotificationApp.send("Oh snap!", "{{ Session::get('message') }}", "top-right", "#bf441d", "danger")
                break;
        }
        @endif
    }(window.jQuery);
</script>
