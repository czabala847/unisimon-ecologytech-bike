/**
 * Función que hace peticiones AJAX a la URL que se ingresa en el parámetro
 * @param {String} urlFetch
 * @param {Object} data
 * @returns {Object}
 */
const getData = async (url, data) => {
    // debugger;
    let requireToken = false;
    let token = "";
    let urlLocation = "";

    if (window.location.hostname === "localhost") {
        urlLocation =
            window.location.origin + "/unisimon-ecologitech-bike/public/";

        requireToken = true;
        token = document
            .querySelector("meta[name='csrf-token']")
            .getAttribute("content");
    } else {
        urlLocation = window.location.origin + "/";
    }

    const urlFetch = urlLocation + url;
    let config;

    if (data) {
        config = {
            method: "POST",
            body: data,
        };
    }

    if (requireToken) {
        if (config) {
            config.headers = {
                "X-CSRF-TOKEN": token,
            };
        } else {
            config = {
                headers: {
                    "X-CSRF-TOKEN": token,
                },
            };
        }
    }

    try {
        const response = await fetch(urlFetch, config);
        const data = await response.json();

        return { data, ok: response.ok, status: response.status };
    } catch (error) {
        console.log(error);
    }
};

export { getData };
