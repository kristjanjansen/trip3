import { usePage } from "@inertiajs/inertia-vue3";
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
    const page = usePage<{ translations_php: any }>().props.value;
    const translation = get(page.translations_php, lookup);
    return translation ? replaceTokens(translation, tokens) : lookup;
}

export function __(key: string, tokens: Record<string, any> = {}): string {
    const page = usePage<{ translations_json: any }>().props.value;
    return replaceTokens(page.translations_json[key] || key, tokens);
}
