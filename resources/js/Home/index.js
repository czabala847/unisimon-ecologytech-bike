const changeColorHeader = () => {
    const $home = document.querySelector("#Home") || null;

    if ($home) {
        const $header = $home.querySelector("#Header") || null;

        if ($header) {
            window.addEventListener("scroll", (e) => {
                if (document.documentElement.scrollTop > 0) {
                    $header.style.backgroundColor = "#000";
                    $header.style.padding = "1rem 0";
                } else {
                    $header.style.backgroundColor = "rgba(0, 0, 0, 0.1)";
                    $header.style.padding = "0";
                }
            });
        }
    }
};

const initHome = () => {
    window.addEventListener("DOMContentLoaded", changeColorHeader);
};

export { initHome };
