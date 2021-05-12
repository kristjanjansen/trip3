import type { User } from "./user";
import type { Content } from "./content";

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
