import router from "ziggy-js";
import { __ } from "../utils";

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

declare module "@vue/runtime-core" {
    export interface ComponentCustomProperties {
        route: typeof router;
        __: typeof __;
    }
}
