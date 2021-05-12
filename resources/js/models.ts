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
