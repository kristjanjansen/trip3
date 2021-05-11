import { usePage } from "@inertiajs/inertia-vue3";
import type { Shared } from "../app";
import { get } from "lodash-es";

function replaceTokens(string: string, tokens: Record<string, any>) {
    return Object.keys(tokens).reduce((prev, current) => {
        return prev.replace(new RegExp(":" + current, "g"), tokens[current]);
    }, string);
}

export function trans(
    lookup: string,
    tokens: Record<string, any> = {}
): string {
    const page = usePage<{ shared: Shared }>().props.value;
    const translation = get(page.shared.translations_php, lookup);
    return translation ? replaceTokens(translation, tokens) : lookup;
}

export function __(key: string, tokens: Record<string, any> = {}): string {
    const page = usePage<{ shared: Shared }>().props.value;
    return replaceTokens(page.shared.translations_json[key] || key, tokens);
}
