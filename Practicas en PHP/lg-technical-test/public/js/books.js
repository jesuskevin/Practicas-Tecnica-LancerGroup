const authors = {
    init() {
        this.initializeSelect();
    },

    initializeSelect() {
        $('#authors').select2({});
    },
}

export default authors;