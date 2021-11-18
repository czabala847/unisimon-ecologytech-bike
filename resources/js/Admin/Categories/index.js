import { getData } from "../../utils/FetchData";

const $table = document.querySelector("#category_table") || null;
const $modal = document.querySelector("#modalCategory") || null;

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

const getCategory = async (idCategory) => {
    const url = `admin/categorias/${idCategory}`;

    try {
        const response = await getData(url);
        if (response.ok === true && response.status === 200) {
            return response.data.data;
        }
    } catch (error) {
        console.log(error);
    }
};

const showModalEdit = () => {
    if ($table) {
        $table.addEventListener("click", async (e) => {
            const btn = e.target.closest("button");

            if (btn !== null && btn.dataset.action === "edit") {
                $modal.querySelector("#modalCategoryLabel").textContent =
                    "Editar Categoria";

                const idCategory = btn.dataset.id;
                const category = await getCategory(idCategory);

                const $form = $modal.querySelector("#form-category");

                $form.querySelector("#name").value = category.name;
                $form.querySelector("#description").value =
                    category.description;

                $("#modalCategory").modal("show");
            }
        });
    }
};

const initCategories = () => {
    window.addEventListener("DOMContentLoaded", () => {
        initDataTable();
        showModalEdit();
    });
};

export { initCategories };
