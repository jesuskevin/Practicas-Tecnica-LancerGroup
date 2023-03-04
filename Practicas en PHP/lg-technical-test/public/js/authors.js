const authors = {
    init() {
        this.datatable();
    },

    datatable() {
        $('#authorsTable').DataTable({
            responsive: true,
        });
    },
}

export default authors;