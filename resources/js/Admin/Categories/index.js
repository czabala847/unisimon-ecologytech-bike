import { getData } from "../../utils/FetchData";

const $sectionCategories = document.querySelector(".Categories") || null;
const $table = document.querySelector("#category_table") || null;
const $modal = document.querySelector("#modalCategory") || null;
const $btnModalNew = document.querySelector("#btnNewCategory") || null;
const $modalLabel = $modal ? $modal.querySelector("#modalCategoryLabel") : null;
const $form = $modal ? $modal.querySelector("#form-category") : null;

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

const showModalNew = () => {
    if ($btnModalNew) {
        $btnModalNew.addEventListener("click", (e) => {
            $modalLabel.textContent = "Nueva Categoría";

            $form.querySelector("#name").value = "";
            $form.querySelector("#description").value = "";
            $form.action = $form.dataset.url;
            $form.querySelector("input[name='_method']").value = "POST";
            $("#modalCategory").modal("show");
        });
    }
};

const showModalEdit = () => {
    if ($table) {
        $table.addEventListener("click", async (e) => {
            const btn = e.target.closest("button");

            if (btn !== null && btn.dataset.action === "edit") {
                $modalLabel.textContent = "Editar Categoría";

                const idCategory = btn.dataset.id;
                const category = await getCategory(idCategory);

                $form.querySelector("#name").value = category.name;
                $form.querySelector("#description").value =
                    category.description;

                $form.action = $form.dataset.url + "/" + idCategory;
                $form.querySelector("input[name='_method']").value = "PUT";

                $("#modalCategory").modal("show");
            }
        });
    }
};

const deleteCategory = () => {
    const $formDelete = document.querySelector("#formDelete");

    if ($formDelete) {
        $formDelete.addEventListener("submit", (e) => {
            e.preventDefault();

            Swal.fire({
                title: "Seguro que quieres eliminar la categoría?",
                showCancelButton: true,
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $formDelete.submit();
                }
            });
        });
    }
};

const initCategories = () => {
    window.addEventListener("DOMContentLoaded", () => {
        if ($sectionCategories) {
            initDataTable();
            showModalEdit();
            showModalNew();
            deleteCategory();
        }
    });
};

export { initCategories };
