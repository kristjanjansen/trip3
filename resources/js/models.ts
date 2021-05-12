import router from "ziggy-js";
import { trans, __ } from "./utils";
import { InertiaLink } from "@inertiajs/inertia-vue3";

declare module "vue" {
    export interface ComponentCustomProperties {
        route: typeof router;
        trans: typeof trans;
        __: typeof __;
    }
    export interface GlobalComponents {
        InertiaLink: InertiaLink;
        BackgroundGrid: typeof import("./components/BackgroundGrid.vue").default;
        BlockTitle: typeof import("./components/BlockTitle.vue").default;
        Button: typeof import("./components/Button.vue").default;
        ButtonLink: typeof import("./components/ButtonLink.vue").default;
        Comment: typeof import("./components/Comment.vue").default;
        CommentCreateForm: typeof import("./components/CommentCreateForm.vue").default;
        CommentEditForm: typeof import("./components/CommentEditForm.vue").default;
        Comments: typeof import("./components/Comments.vue").default;
        FieldLayout: typeof import("./components/FieldLayout.vue").default;
        Footer: typeof import("./components/Footer.vue").default;
        FormTextarea: typeof import("./components/FormTextarea.vue").default;
        FormTextfield: typeof import("./components/FormTextfield.vue").default;
        ForumHeader: typeof import("./components/ForumHeader.vue").default;
        ForumLayout: typeof import("./components/ForumLayout.vue").default;
        ForumPost: typeof import("./components/ForumPost.vue").default;
        ForumRow: typeof import("./components/ForumRow.vue").default;
        IconClose: typeof import("./components/IconClose.vue").default;
        IconMenu: typeof import("./components/IconMenu.vue").default;
        IconPin: typeof import("./components/IconPin.vue").default;
        IconRightarrow: typeof import("./components/IconRightarrow.vue").default;
        IconRss: typeof import("./components/IconRss.vue").default;
        IconSearch: typeof import("./components/IconSearch.vue").default;
        IconThumbsdown: typeof import("./components/IconThumbsdown.vue").default;
        IconThumbsup: typeof import("./components/IconThumbsup.vue").default;
        IconTwitter: typeof import("./components/IconTwitter.vue").default;
        IconUser: typeof import("./components/IconUser.vue").default;
        Logo: typeof import("./components/Logo.vue").default;
        LogoPlain: typeof import("./components/LogoPlain.vue").default;
        Nav: typeof import("./components/Nav.vue").default;
        Tag: typeof import("./components/Tag.vue").default;
        TransitionFade: typeof import("./components/TransitionFade.vue").default;
        TransitionGroupFade: typeof import("./components/TransitionGroupFade.vue").default;
    }
}

export type Comment = {
    id: number;
    user_id: number;
    content_id: number;
    body: string | null;
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
    created_at: string /* Date */ | null;
    updated_at: string /* Date */ | null;
    user?: User | null;
    comments?: Comment | null;
};

export type User = {
    id: number;
    name: string;
    email: string;
    email_verified_at: string /* Date */;
    created_at: string /* Date */ | null;
    updated_at: string /* Date */ | null;
    contents?: Content | null;
    comments?: Comment | null;
};
