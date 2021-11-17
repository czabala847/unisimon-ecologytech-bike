const $table = document.querySelector("#category_table") || null;

const initDataTable = () => {
    if ($table) {
        $("#category_table").DataTable({
            // dom: "Bfrtip",
            // buttons: ["copy", "csv", "excel", "pdf", "print"],
            aProcessing: true,
            aServerSide: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
            },
            pageLength: 25,
            responsive: "true",
            bDestroy: true,
            order: [[0, "asc"]],
        });
    }
};

const editCategory = () => {
    if ($table) {
        $table.addEventListener("click", (e) => {
            debugger;
        });
    }
};

const initCategories = () => {
    window.addEventListener("DOMContentLoaded", () => {
        initDataTable();
        editCategory();
    });
};

export { initCategories };
