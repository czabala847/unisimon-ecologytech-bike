require("./bootstrap");

import { initHome } from "./Home/index.js";
import { initCategories } from "./Admin/Categories/index.js";
import { initSku } from "./Admin/Skus/index.js";

initHome();
initCategories();
initSku();
