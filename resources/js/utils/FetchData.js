/**
 * Función que hace peticiones AJAX a la URL que se ingresa en el parámetro
 * @param {String} urlFetch
 * @param {Object} data
 * @returns {Object}
 */
const getData = async (url, data) => {
    const urlFetch = "http://127.0.0.1:8000/" + url;
    let config;

    if (data) {
        config = {
            method: "POST",
            body: data,
        };
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
