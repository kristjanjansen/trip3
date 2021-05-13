import { createApp, h, defineAsyncComponent } from "vue";
import { App, plugin } from "@inertiajs/inertia-vue3";
import route from "ziggy-js";
import "../css/app.css";
import { trans, __ } from "./utils";

export const components = import.meta.globEager("./components/**/*.vue");
const asyncComponents = import.meta.glob("./components_async/**/*.vue");

export const a = Object.fromEntries(
    Object.entries(components).map(([path, component]) => {
        const name = path.split("/").slice(-1)[0].replace(".vue", "");
        return [name, component.default];
    })
);

const el = document.getElementById("app");

const app = createApp({
    render: () =>
        h(App, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: async (name) => {
                const page = (await import(`./pages/${name}.vue`)).default;
                page.layout = (
                    await import(`./layouts/${page.layoutName || "Main"}.vue`)
                ).default;
                return page;
            },
        }),
});

Object.entries(components).forEach(([path, component]) => {
    const name = path.split("/").slice(-1)[0].replace(".vue", "");
    app.component(name, component.default);
});

Object.entries(asyncComponents).forEach(([path, component]) => {
    const name = path.split("/").slice(-1)[0].replace(".vue", "");
    app.component(name, defineAsyncComponent(component));
});

app.use(plugin);

app.config.globalProperties.route = route;
app.config.globalProperties.trans = trans;
app.config.globalProperties.__ = __;

app.mount(el);
