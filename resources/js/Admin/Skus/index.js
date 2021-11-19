const $sectionSkus = document.querySelector(".Skus") || null;
const $form = document.querySelector("#form");

const blockFields = (form) => {
    [...form].forEach((item) => {
        if (item.type !== "hidden") {
            item.disabled = true;
        }
    });
};

const validateCategories = () => {
    if ($form) {
        const $inputCategories = $form.querySelector("#category");

        if ([...$inputCategories.options].length == 0) {
            blockFields($form);
        }
    }
};

const initSku = () => {
    window.addEventListener("DOMContentLoaded", () => {
        if ($sectionSkus) {
            validateCategories();
        }
    });
};

export { initSku };
