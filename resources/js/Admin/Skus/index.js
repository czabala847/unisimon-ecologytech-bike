const $sectionSkus = document.querySelector(".Skus") || null;
const $form = document.querySelector("#form") || null;
const $table = document.querySelector("#sku_table") || null;

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

const deleteSku = () => {
    if ($table) {
        $table.addEventListener("click", async (e) => {
            const btn = e.target.closest("button");
            const formParent = btn.parentElement;
            if (btn !== null && btn.dataset.action === "delete") {
                Swal.fire({
                    title: "Seguro que quieres eliminar el SKU?",
                    showCancelButton: true,
                    confirmButtonText: "Eliminar",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        formParent.submit();
                    }
                });
            }
        });
    }
};

const initSku = () => {
    window.addEventListener("DOMContentLoaded", () => {
        if ($sectionSkus) {
            validateCategories();
            deleteSku();
        }
    });
};

export { initSku };
