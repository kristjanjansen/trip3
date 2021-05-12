import type { User } from "./user";
import type { Comment } from "./comment";

export type Content = {
    id: number;
    user_id: number;
    title: string | null;
    body: string | null;
    type: string;
    created_at: string /* Date */;
    updated_at: string /* Date */;
    user?: User | null;
    comments?: Comment | null;
};
