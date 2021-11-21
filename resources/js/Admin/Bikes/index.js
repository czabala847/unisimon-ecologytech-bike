import { getData } from "../../utils/FetchData";

const $sectionCategories = document.querySelector(".Bikes");
const $table = document.querySelector("#bike_table") || null;
const $modal = document.querySelector("#modalBike") || null;
const $btnModalNew = document.querySelector("#btnNewBike") || null;
const $modalLabel = $modal ? $modal.querySelector("#modalBikeLabel") : null;
const $form = $modal ? $modal.querySelector("#form-bike") : null;

const initDataTable = () => {
    if ($table) {
        $("#bike_table").DataTable({
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

const getBike = async (idBike) => {
    const url = `admin/bicicletas/${idBike}`;

    try {
        const response = await getData(url);
        if (response.ok === true && response.status === 200) {
            return response.data.data;
        }
    } catch (error) {
        console.log(error);
    }
};

const deleteBike = () => {
    if ($table) {
        $table.addEventListener("click", async (e) => {
            const btn = e.target.closest("button");

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

const showModalEdit = () => {
    if ($table) {
        $table.addEventListener("click", async (e) => {
            const btn = e.target.closest("button");

            if (btn !== null && btn.dataset.action === "edit") {
                $modalLabel.textContent = "Editar Bicicleta";

                const idBike = btn.dataset.id;
                const bike = await getBike(idBike);
                debugger;

                $form.querySelector("#sku_id").value = bike.sku_id;
                $form.querySelector("#code").value = bike.code;
                $form.querySelector("#code").disabled = true;

                $form.action = $form.dataset.url + "/" + idBike;
                $form.querySelector("input[name='_method']").value = "PUT";

                $("#modalBike").modal("show");
            }
        });
    }
};

const showModalNew = () => {
    if ($btnModalNew) {
        $btnModalNew.addEventListener("click", (e) => {
            $modalLabel.textContent = "Nueva Bicicleta";

            $form.querySelector("#code").value = "";
            $form.querySelector("#code").disabled = false;
            $form.action = $form.dataset.url;
            $form.querySelector("input[name='_method']").value = "POST";
            $("#modalBike").modal("show");
        });
    }
};

const initBikes = () => {
    window.addEventListener("DOMContentLoaded", () => {
        if ($sectionCategories) {
            showModalNew();
            initDataTable();
            deleteBike();
            showModalEdit();
        }
    });
};

export { initBikes };
