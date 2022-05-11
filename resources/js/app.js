import { createApp } from "vue";
import InstantSearch from "vue-instantsearch/vue3/es";
import search from "./components/search.vue";

const app = createApp({}).use(InstantSearch);
app.component("VueInstantSearch", InstantSearch);
app.component("search", require("./components/search.vue").default);
const mountedApp = app.mount("#app");

require("./bootstrap");
