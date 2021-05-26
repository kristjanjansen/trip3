import type { ComputedRef } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { get } from "lodash-es";
import marked from "marked";
import { format } from "date-fns";
import { et } from "date-fns/locale";
import type { TimeAgoMessages } from "@vueuse/core";
import { useTimeAgo } from "@vueuse/core";

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

// @TODO trans_choice()
// https://pineco.de/using-laravels-localization-js/

export function __(key: string, tokens: Record<string, any> = {}): string {
    const page = usePage<{ translations_json: any }>().props.value;
    return replaceTokens(page.translations_json[key] || key, tokens);
}

export function formatContent(str: string | null): string {
    return marked(str || "", { breaks: true });
}

/*
function format_date($date)
{
    if ($date->isToday()) {
        return trans('utils.date.today') . ' ' . $date->format('H:i');
    }
    if ($date->isYesterday()) {
        return trans('utils.date.yesterday') . ' ' . $date->format('H:i');
    }
    if ($date->year == Carbon::now()->year) {
        return Date::parse($date)->format('j. M H:i');
    }

    return Date::parse($date)->format('j. M Y H:i');
}
*/

// @TODO: handle current year

export function formatDate(date: string | Date | null): string {
    return format(new Date(date || new Date()), "d. LLL Y HH:mm", {
        locale: et,
    });
}

// @TODO trans()

const messages: TimeAgoMessages = {
    justNow: "just praegu",
    past: (n) => (n.match(/\d/) ? `${n} tagasi` : n),
    future: (n) => (n.match(/\d/) ? `${n}` : n),
    month: (n, past) =>
        n === 1
            ? past
                ? "eelmisel kuul"
                : "järgmisel kuul"
            : `${n} kuu${n > 1 ? "d" : ""}`,
    year: (n, past) =>
        n === 1
            ? past
                ? "eelmisel aastal"
                : "järgmisel aastal"
            : `${n} aasta${n > 1 ? "t" : ""}`,
    day: (n, past) =>
        n === 1 ? (past ? "eile" : "homme") : `${n} päev${n > 1 ? "a" : ""}`,
    week: (n, past) =>
        n === 1
            ? past
                ? "eelmisel nädalal"
                : "järgmisel nädalal"
            : `${n} nädal${n > 1 ? "at" : ""}`,
    hour: (n) => `${n} tund${n > 1 ? "i" : ""}`,
    minute: (n) => `${n} minut${n > 1 ? "it" : ""}`,
    second: (n) => `${n} sekund${n > 1 ? "it" : ""}`,
};

export function useFormatAgo(str: string | null) {
    return useTimeAgo(str || new Date(), { messages });
}

export function sliceByKey(obj: object, key: string): object {
    if (Object.keys(obj).includes(key)) {
        const i = Object.keys(obj).findIndex((k) => k === key);
        return Object.fromEntries(Object.entries(obj).slice(0, i + 1));
    } else {
        return obj;
    }
}
