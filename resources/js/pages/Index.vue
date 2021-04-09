<template>
    <div>
        <img
            class="hover:lighter active:darker w-full max-h-96 object-cover object-center transition-all"
            src="https://trip.ee/photos/header3.jpg"
        />
        <div class="grid">
            <a href="" class="grid gap-3 p-4 bg-purple-500 hover:bg-purple-600">
                <div class="text-base text-purple-300">Aafrika ›</div>
                <div class="text-xl text-white">Reunion</div>
            </a>
            <div class="grid grid-cols-2">
                <div class="p-8 bg-gray-100">
                    Trip.ee on reisihuviliste kogukond, keda ühendab reisipisik
                    ning huvi kaugete maade ja kultuuride vastu.
                </div>
            </div>
            <div class="grid gap-4 p-8">
                <button
                    class="justify-self-start px-6 py-2 text-white font-medium hover:bg-green-400 bg-green-500 active:bg-green-600 rounded"
                >
                    Liitu Trip.ee-ga
                </button>

                <br />

                <a
                    href=""
                    class="group grid gap-x-10 gap-y-6 grid-cols-1 sm:grid-cols-2"
                >
                    <img
                        class="group-hover:lighter active:darker w-full h-64 object-cover object-center transition-all sm:h-full"
                        src="https://trip.ee/images/medium/bergamo-4440781_1920_1xzs.jpeg"
                    />
                    <div class="grid gap-8">
                        <a href="" class="flex gap-2 items-center">
                            <icon-rightarrow
                                class="w-4 text-green-500 group-hover:text-green-600"
                            />
                            <h2
                                class="text-sm text-green-500 group-hover:text-green-600 font-medium tracking-wider uppercase"
                            >
                                Uudised
                            </h2>
                        </a>
                        <h1
                            class="text-4xl sm:text-6xl group-hover:text-gray-600 active:text-gray-800 font-bold tracking-tighter transition"
                        >
                            Odavlennufirmad avavad suveks massiliselt uusi liine
                        </h1>
                        <div
                            class="text-xl sm:text-2xl group-hover:text-gray-600 active:text-gray-800 transition"
                        >
                            Viimane aasta on lennufirmadele olnud üks suur
                            kannatuste rada. Väike lootus tekkis 2020. aasta
                            suvel, kuid pärast seda on tiksutud talveune
                            režiimil. Kuid näiliselt vaikse pinna all
                            pulbitsevad arengud, mis ootavad valla päästmist.
                        </div>
                        <a href="" class="flex gap-2 items-center">
                            <icon-user
                                class="w-5 text-cyan-500 hover:text-gray-300 rounded-full ring-cyan-500 ring-2"
                            />
                            <div class="text-cyan-500 font-medium">
                                Veigo Kell
                            </div>
                            <div class="font-sans text-gray-300">
                                12. tundi tagasi
                            </div>
                        </a>
                    </div>
                </a>

                <br />

                <div class="grid gap-6">
                    <h1 class="text-4xl font-bold tracking-tight">
                        Odavlennufirmad avavad suveks massiliselt uusi liine
                    </h1>
                </div>
                <br />
                <a href="" class="flex gap-2 items-center">
                    <icon-rightarrow
                        class="w-4 text-gray-500 hover:text-gray-700"
                    />
                    <h2
                        class="text-sm text-green-600 hover:text-green-600 font-medium tracking-wider uppercase"
                    >
                        Soodsad lennupiletid
                    </h2>
                </a>
                <a href="">
                    <h2
                        class="text-2xl text-blue-500 hover:text-blue-600 font-medium"
                    >
                        Edasi-tagasi lennupiletid Lufthansaga Tallinnast
                        Kreetale alates 160€
                    </h2>
                </a>
                <div class="flex gap-3 items-center">
                    <a href="" class="w-14 text-gray-200 hover:text-gray-300">
                        <icon-user />
                    </a>
                    <div class="grid gap-3">
                        <a
                            href=""
                            class="text-xl hover:text-gray-800 font-medium"
                        >
                            <h3>Kas praegu saab Sardiiniasse reisida?</h3>
                        </a>
                        <div class="flex gap-2">
                            <a
                                href=""
                                class="text-sm justify-self-start px-2 py-1 text-gray-500 hover:bg-gray-100 border border-gray-400 rounded-full"
                                >2 comments
                            </a>
                            <a
                                href=""
                                class="text-sm justify-self-start px-2 py-1 text-orange-500 hover:bg-orange-100 border border-orange-300 rounded-full"
                                >Itaalia ja Hispaania
                            </a>
                        </div>
                    </div>
                </div>
                <br />
                <h1 class="text-4xl font-medium">
                    Kas praegu saab Sardiiniasse reisida?
                </h1>
                <div class="text-lg">
                    Äkki mõni targem oskab nõu anda. Nimelt oleks plaanis minna
                    Gran Canariale ümberistumisega Bergamos. Saan hetkel aru, et
                    Bergamos peab olema test tehtud 48h enne. Kas on veel
                    täiendavaid piiranguid, mida ei osanud lennujaama lehelt
                    välja lugeda?
                </div>
                <div
                    class="grid-cols-auto-6 grid gap-4 w-auto overflow-x-auto md:grid-cols-3"
                >
                    <a
                        v-for="i in 6"
                        :key="i"
                        href=""
                        class="relative w-56 h-56 md:w-auto"
                    >
                        <img
                            class="w-full h-full object-cover object-center"
                            src="https://trip.ee/images/medium/bergamo-4440781_1920_1xzs.jpeg"
                        />
                        <div
                            class="via-[#777777] absolute inset-0 bg-gradient-to-b from-white to-black hover:opacity-0 opacity-50"
                        />
                        <div class="absolute inset-0 flex items-end p-4">
                            <div class="grid gap-3">
                                <h3 class="text-xl text-white font-bold">
                                    Edasi-tagasi lennupiletid Tallinnast
                                    Réunioni saarele
                                </h3>
                                <div
                                    class="text-base justify-self-start p-1 text-white font-medium bg-orange-500 hover:bg-orange-600 rounded"
                                >
                                    al 15€
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <br />
    </div>
</template>
