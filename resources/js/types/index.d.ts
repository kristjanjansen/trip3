import router from "ziggy-js";
import { __ } from "../utils";
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { PageProps as InertiaPageProps } from "@inertiajs/inertia";

export type User = {
    id: number;
    name: string;
};

export type Comment = {
    id: number;
    title: string;
    user: User;
    date: string;
    body: string;
};

export type Content = {
    id: number;
    title: string;
    user: User;
    date: string;
    body: string;
    tags?: string[];
    comments?: Comment[];
};

export type Shared = {
    links: any;
    translations: any;
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
        __: typeof __;
    }
}

export interface PageProps extends InertiaPageProps {
    errors?: object;
}
