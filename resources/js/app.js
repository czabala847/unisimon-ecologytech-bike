require("./bootstrap");

import { initHome } from "./Home/index.js";
import { initCategories } from "./Admin/Categories/index.js";
import { initSku } from "./Admin/Skus/index.js";
import { initPrices } from "./Admin/Rentals/prices.js";
import { initViewPrices } from "./Prices/index.js";
import { initBikes } from "./Admin/Bikes/index.js";

initHome();
initCategories();
initSku();
initPrices();
initViewPrices();
initBikes();
