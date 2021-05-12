import type { Content } from "./content";
import type { Comment } from "./comment";

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
