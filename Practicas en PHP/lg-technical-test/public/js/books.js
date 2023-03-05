const books = {
    init() {
        this.datatable();
    },

    datatable() {
        $('#booksTable').DataTable({
            responsive: true,
        });
    },
}

export default books;