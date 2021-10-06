class HttpRequest {
    http = new XMLHttpRequest();

    post(url, data, callback) {
        this.http.open("POST", url, true);
        this.http.onload = function () {
            if (this.status === 200) {
                callback(null, this.responseText);
            } else {
                callback(this.responseText);
            }
        };
        this.http.send(data);
    }

    get(url, token, callback) {
        this.http.open("GET", url, true);
        this.http.onload = function () {
            if (this.status === 200) {
                callback(null, JSON.parse(this.response));
            } else {
                callback(this.responseText);
            }
        };
        this.http.send();
    }

    put(url, data, callback) {
        this.http.open("PUT", url, true);
        this.http.onload = function () {
            if (this.status === 200) {
                callback(null, JSON.parse(this.response));
            } else {
                callback(this.responseText);
            }
        };
        this.http.send(data);
    }

    delete(url, data, callback) {
        this.http.open("DELETE", url, true);
        this.http.onload = function () {
            if (this.status === 200) {
                callback(null, JSON.parse(this.response));
            } else {
                callback(this.responseText);
            }
        };
        this.http.send(data);
    }
}
