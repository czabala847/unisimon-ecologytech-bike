import { getData } from "../../utils/FetchData";

const $table = document.querySelector("#prices_table") || null;
const $sectionPrices = document.querySelector(".Prices") || null;
const $modal = document.querySelector("#modalPrices") || null;
const $btnModalNew = document.querySelector("#btnNewPrice") || null;
const $modalLabel = $modal ? $modal.querySelector("#modalPricesLabel") : null;
const $form = $modal ? $modal.querySelector("#form-prices") : null;

const initDataTable = () => {
    if ($table) {
        $("#prices_table").DataTable({
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

const blockFields = (form) => {
    [...form].forEach((item) => {
        if (item.type !== "hidden") {
            item.disabled = true;
        }
    });
};

const validateCategories = () => {
    if ($form) {
        const $inputCategories = $form.querySelector("#category_id");

        if ([...$inputCategories.options].length == 0) {
            blockFields($form);
        }
    }
};

const deletePrice = () => {
    if ($table) {
        $table.addEventListener("click", async (e) => {
            const btn = e.target.closest("button");
            // const formParent = btn.parentElement;
            if (btn !== null && btn.dataset.action === "delete") {
                Swal.fire({
                    title: "Seguro que quieres eliminar la categoría?",
                    showCancelButton: true,
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        btn.parentElement.submit();
                    }
                });
            }
        });
    }
};

const showModalNew = () => {
    if ($btnModalNew) {
        $btnModalNew.addEventListener("click", (e) => {
            $modalLabel.textContent = "Nuevo Tarifa";

            $form.querySelector("#price").value = "";
            $form.querySelector("#description").value = "";
            $form.action = $form.dataset.url;
            $form.querySelector("input[name='_method']").value = "POST";
            $("#modalPrices").modal("show");
        });
    }
};

const getPrice = async (idPrice) => {
    const url = `admin/precios/${idPrice}`;

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
                $modalLabel.textContent = "Editar Tarifa";

                const idTarifa = btn.dataset.id;
                const price = await getPrice(idTarifa);

                // debugger;
                $form.querySelector("#category_id").value = price.category_id;
                $form.querySelector("#price").value = price.price;
                $form.querySelector("#description").value = price.description;

                $form.action = $form.dataset.url + "/" + idTarifa;
                $form.querySelector("input[name='_method']").value = "PUT";

                $("#modalPrices").modal("show");
            }
        });
    }
};

const initPrices = () => {
    window.addEventListener("DOMContentLoaded", () => {
        if ($sectionPrices) {
            initDataTable();
            showModalNew();
            validateCategories();
            deletePrice();
            showModalEdit();
        }
    });
};

export { initPrices };
