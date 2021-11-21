import { getData } from "../utils/FetchData";

const $sectionPrices = document.querySelector("#ViewPrices") || null;
const $selectPrices = document.querySelector("#category_id") || null;
const $card = document.querySelector("#card-info") || null;
const $spanPrince = document.querySelector("#spanPrince") || null;
const $selectSku = document.querySelector("#sku_id") || null;
const $tdColor = document.querySelector("#tdColor") || null;
const $tdFreno = document.querySelector("#tdFreno") || null;
const $tdRin = document.querySelector("#tdRin") || null;
const $tdVelocidad = document.querySelector("#tdVelocidad") || null;
const $containerImage = document.querySelector("#containerImage") || null;

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

const getSkus = async (idCategory) => {
    const url = `admin/skusCategory/${idCategory}`;

    try {
        const response = await getData(url);
        if (response.ok === true && response.status === 200) {
            return response.data.data;
        }
    } catch (error) {
        console.log(error);
    }
};

const getAttributes = async (idSku) => {
    const url = `admin/attributes/${idSku}`;

    try {
        const response = await getData(url);
        if (response.ok === true && response.status === 200) {
            return response.data.data;
        }
    } catch (error) {
        console.log(error);
    }
};

const handleChangeReference = async (idReference) => {
    const attributes = await getAttributes(parseInt(idReference));

    $tdColor.textContent = "";
    $tdFreno.textContent = "";
    $tdRin.textContent = "";
    $tdVelocidad.textContent = "";

    attributes.map((attribute) => {
        const $attr = attribute.attribute.toLowerCase();

        switch ($attr) {
            case "color":
                $tdColor.textContent = attribute.value;
                break;
            case "brake":
                $tdFreno.textContent = attribute.value;
                break;
            case "rin":
                $tdRin.textContent = attribute.value;
                break;
            case "speed":
                $tdVelocidad.textContent = attribute.value + " KM/H";
                break;
        }
    });

    $containerImage.innerHTML = "";

    if (attributes.length > 0) {
        const img = document.createElement("img");
        img.classList.add("img-fluid");
        const url =
            window.location.origin +
            "/images/upload/" +
            attributes[0].sku.image;

        img.src = url;

        $containerImage.append(img);
    }
};

const handleChange = async (idPrice) => {
    const price = await getPrice(idPrice);

    $card.querySelector(".card-header").textContent =
        "Bicicleta - " + price.category.name;

    const references = await getSkus(price.category.id);

    const arrayOption = [];

    $selectSku.innerHTML = "";

    references.map((reference) => {
        const option = document.createElement("option");
        option.value = reference.id;
        option.textContent = reference = `${reference.id} - ${reference.name}`;
        arrayOption.push(option);
    });

    $selectSku.append(...arrayOption);

    handleChangeReference(parseInt($selectSku.value));

    $selectSku.addEventListener("change", (e) => {
        e.preventDefault();
        handleChangeReference(parseInt(e.target.value));
    });

    $spanPrince.textContent = formatPrice(price.price);
};

const changeSelect = () => {
    if ($selectPrices) {
        $selectPrices.addEventListener("change", (e) => {
            e.preventDefault();

            handleChange(parseInt(e.target.value));
        });
    }
};

const formatPrice = (price) => {
    const newPrice = new window.Intl.NumberFormat("en-EN", {
        style: "currency",
        currency: "USD",
    }).format(price);

    return newPrice;
};

const initViewPrices = () => {
    window.addEventListener("DOMContentLoaded", async () => {
        if ($sectionPrices) {
            changeSelect();

            await handleChange(parseInt($selectPrices.value));
            // await handleChangeReference(parseInt($selectSku.value));
        }
    });
};

export { initViewPrices };
