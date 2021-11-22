const $sectionUsers = document.querySelector(".Users") || null;
const $table = document.querySelector("#users_table") || null;

const initDataTable = () => {
    if ($table) {
        $("#users_table").DataTable({
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

const initUsers = () => {
    window.addEventListener("DOMContentLoaded", () => {
        if ($sectionUsers) {
            initDataTable();
        }
    });
};

export { initUsers };
