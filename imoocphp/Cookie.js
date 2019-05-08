var cookie = {
    set: function (key, val, expriseDays) {
        if (expriseDays) {
            var data = new Date();
            data.setTime(data.getTime() + expriseDays * 24 * 3600 * 1000);
            var expriseStr = "expirse=" + data.toGMTString() + ";";
        } else {
            var expriseStr = '';
        }
        document.cookie = key + "=" + escape(val) + ";" + expriseStr;
    },
    get: function (key) {
        var getCookie = document.cookie.replace(/[ ]/g, '');
        var cookiesArr = getCookie.split(";");
        var result;
        for (var i = 0, len = cookiesArr.length; i < len; i++) {
            var arr = cookiesArr[i].split("=");
            if (arr[0] == key) {
                result = arr[1];
                break;
            }
        }
        return unescape(result);
    }
};