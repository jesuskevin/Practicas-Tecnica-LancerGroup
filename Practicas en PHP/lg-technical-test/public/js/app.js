import authors from "./authors.js";
import books from "./books.js";

const app = {

    init() {
        if (this.urlContains('autores')) {
            authors.init();
        } else if (this.urlContains('libros')) {
            books.init();
        }
    },

    urlContains(text) {
        return window.location.href.indexOf(text) != -1;
    },
}

$(() => {
    app.init();
});