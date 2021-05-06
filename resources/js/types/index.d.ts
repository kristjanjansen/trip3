import router from "ziggy-js";

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
};

declare module "@vue/runtime-core" {
    export interface ComponentCustomProperties {
        route: typeof router;
    }
}
