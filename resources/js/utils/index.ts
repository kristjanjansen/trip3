import { usePage } from "@inertiajs/inertia-vue3";
import type { Shared } from "../types";

export function __(key: string): string {
    const page = usePage<{ shared: Shared }>().props.value;
    return page.shared.translations_json[key] || key;
}
