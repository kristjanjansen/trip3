import router from "ziggy-js";
import { trans, __, formatContent, formatDate, formatAgo } from "../utils";
import { InertiaLink } from "@inertiajs/inertia-vue3";

declare module "vue" {
    export interface ComponentCustomProperties {
        route: typeof router;
        trans: typeof trans;
        __: typeof __;
        formatContent: typeof formatContent;
        formatDate: typeof formatDate;
    }
    export interface GlobalComponents {
        InertiaLink: InertiaLink;
        BackgroundGrid: typeof import("../components/BackgroundGrid.vue").default;
        BlockTitle: typeof import("../components/BlockTitle.vue").default;
        Button: typeof import("../components/Button.vue").default;
        ButtonLink: typeof import("../components/ButtonLink.vue").default;
        Comment: typeof import("../components/Comment.vue").default;
        CommentCreateForm: typeof import("../components/CommentCreateForm.vue").default;
        CommentEditForm: typeof import("../components/CommentEditForm.vue").default;
        Comments: typeof import("../components/Comments.vue").default;
        FieldLayout: typeof import("../components/FieldLayout.vue").default;
        FlightCard: typeof import("../components/FlightCard.vue").default;
        Footer: typeof import("../components/Footer.vue").default;
        FormTextarea: typeof import("../components/FormTextarea.vue").default;
        FormTextfield: typeof import("../components/FormTextfield.vue").default;
        ForumHeader: typeof import("../components/ForumHeader.vue").default;
        ForumLayout: typeof import("../components/ForumLayout.vue").default;
        ForumPost: typeof import("../components/ForumPost.vue").default;
        ForumRow: typeof import("../components/ForumRow.vue").default;
        IconClose: typeof import("../components/IconClose.vue").default;
        IconMenu: typeof import("../components/IconMenu.vue").default;
        IconPin: typeof import("../components/IconPin.vue").default;
        IconRightarrow: typeof import("../components/IconRightarrow.vue").default;
        IconRss: typeof import("../components/IconRss.vue").default;
        IconSearch: typeof import("../components/IconSearch.vue").default;
        IconThumbsdown: typeof import("../components/IconThumbsdown.vue").default;
        IconThumbsup: typeof import("../components/IconThumbsup.vue").default;
        IconTwitter: typeof import("../components/IconTwitter.vue").default;
        IconUser: typeof import("../components/IconUser.vue").default;
        Image: typeof import("../components/Image.vue").default;
        Logo: typeof import("../components/Logo.vue").default;
        LogoPlain: typeof import("../components/LogoPlain.vue").default;
        Nav: typeof import("../components/Nav.vue").default;
        Tag: typeof import("../components/Tag.vue").default;
        TransitionFade: typeof import("../components/TransitionFade.vue").default;
        TransitionGroupFade: typeof import("../components/TransitionGroupFade.vue").default;

        FormRichtext: typeof import("../components_async/FormRichtext.vue").default;
    }
}

export type Comment = {
    id: number;
    user_id: number;
    content_id: number;
    body: string | null;
    status: boolean;
    created_at: string /* Date */ | null;
    updated_at: string /* Date */ | null;
    content?: Content | null;
    user?: User | null;
};

export type Content = {
    id: number;
    user_id: number;
    title: string | null;
    body: string | null;
    type: string;
    url: string | null;
    status: boolean;
    created_at: string /* Date */ | null;
    updated_at: string /* Date */ | null;
    start_at: string /* Date */ | null;
    end_at: string /* Date */ | null;
    duration: string | null;
    price: number | null;
    slug: string;
    user?: User | null;
    comments?: Comment[] | null;
    images?: Image[] | null;
};

export type Image = {
    id: number;
    filename: string;
    created_at: string /* Date */ | null;
    updated_at: string /* Date */ | null;
    content?: Content[] | null;
    user?: User[] | null;
};

export type User = {
    id: number;
    name: string;
    email: string;
    contact_facebook: string | null;
    contact_twitter: string | null;
    contact_instagram: string | null;
    contact_homepage: string | null;
    profile_color: string;
    real_name: string;
    real_name_show: boolean;
    gender: number | null;
    birthyear: number | null;
    description: string | null;
    notify_message: boolean;
    notify_follow: boolean;
    role: string;
    rank: number;
    verified: boolean;
    registration_token: string | null;
    remember_token: string | null;
    created_at: string /* Date */ | null;
    updated_at: string /* Date */ | null;
    active_at: string /* Date */ | null;
    company: boolean;
    contents?: Content[] | null;
    comments?: Comment[] | null;
    images?: Image[] | null;
};
