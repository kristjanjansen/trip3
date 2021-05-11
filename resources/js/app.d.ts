import router from "ziggy-js";
import { trans, __ } from "./utils";
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { PageProps as InertiaPageProps } from "@inertiajs/inertia";

export type Shared = {
    links: any;
    translations_php: any;
    translations_json: any;
};

declare module "vue" {
    // @TODO Add async components
    // https://github.com/vuejs/vue-next/pull/3399
    // https://github.com/johnsoncodehk/volar#using
    export interface GlobalComponents {
        InertiaLink: InertiaLink;
    }
    export interface ComponentCustomProperties {
        route: typeof router;
        trans: typeof trans;
        __: typeof __;
    }
}

export interface PageProps extends InertiaPageProps {
    errors?: object;
}
