<template>
    <div class="grid gap-4">
        <a
            href=""
            class="group grid gap-x-10 gap-y-6 grid-cols-1 sm:grid-cols-2"
        >
            <img
                class="group-hover:lighter active:darker w-full h-64 object-cover object-center transition-all sm:h-full"
                src="https://trip.ee/images/medium/bergamo-4440781_1920_1xzs.jpeg"
            />
            <div class="grid gap-8">
                <BlockTitle>Uudised</BlockTitle>
                <h1
                    class="text-4xl sm:text-6xl group-hover:text-gray-600 active:text-gray-800 font-bold tracking-tighter transition"
                >
                    Odavlennufirmad avavad suveks massiliselt uusi liine
                </h1>
                <div
                    class="text-xl sm:text-2xl group-hover:text-gray-600 active:text-gray-800 transition"
                >
                    Viimane aasta on lennufirmadele olnud üks suur kannatuste
                    rada. Väike lootus tekkis 2020. aasta suvel, kuid pärast
                    seda on tiksutud talveune režiimil. Kuid näiliselt vaikse
                    pinna all pulbitsevad arengud, mis ootavad valla päästmist.
                </div>
                <Meta
                    :content="{ ago: '12 paeva tagasi' }"
                    :user="{ name: 'Veigo', link: '/' }"
                />
            </div>
        </a>
    </div>
</template>
