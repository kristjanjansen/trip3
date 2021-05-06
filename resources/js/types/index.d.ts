import type { Page, PageProps as InertiaPageProps } from "@inertiajs/inertia";

export type User = {
    name: string;
};

export type Comment = {
    title: string;
    user: User;
    date: string;
    body: string;
};

export type Content = {
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
