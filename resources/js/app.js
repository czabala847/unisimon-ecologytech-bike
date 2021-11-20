require("./bootstrap");

import { initHome } from "./Home/index.js";
import { initCategories } from "./Admin/Categories/index.js";
import { initSku } from "./Admin/Skus/index.js";
import { initPrices } from "./Admin/Rentals/prices.js";

initHome();
initCategories();
initSku();
initPrices();
