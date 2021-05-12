import router from "ziggy-js";
import { trans, __ } from "./utils";
import { InertiaLink } from "@inertiajs/inertia-vue3";

export type Shared = {
    links: any;
    translations_php: any;
    translations_json: any;
};

declare module "vue" {
    // See:
    // https://github.com/vuejs/vue-next/pull/3399
    // https://github.com/johnsoncodehk/volar#using
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
        Nav: typeof import("./components/Nav.vue").default;
        Tag: typeof import("./components/Tag.vue").default;

        FormRichtext: typeof import("./components_async/FormRichtext.vue").default;
    }

    export interface ComponentCustomProperties {
        route: typeof router;
        trans: typeof trans;
        __: typeof __;
    }
}
