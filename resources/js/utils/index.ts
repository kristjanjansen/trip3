import { usePage } from "@inertiajs/inertia-vue3";
import type { Shared } from "../types";

export function __(key: string): string {
    const { shared } = usePage<{ shared: Shared }>().props.value;
    return shared.translations[key] || key;
}
