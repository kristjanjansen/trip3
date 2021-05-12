type Content = {
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
