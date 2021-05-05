<template>
    <div>
        <div
            class="bg-gray-100 relative overflow-hidden p-6 lg:px-0 lg:pt-10 pb-0"
        >
            <background-map
                class="w-[1000px] my-[-260px] absolute inset-0 opacity-5 pointer-events-none"
            />
            <div class="inset-0 lg:container lg:mx-auto grid gap-6">
                <Nav />
                <div class="h-6" />
                <h1
                    class="text-4xl lg:text-5xl font-bold text-gray-500 tracking-tight"
                >
                    Foorum
                </h1>
                <div class="flex overflow-x-scroll lg:overscroll-auto">
                    <inertia-link
                        v-for="(link, i) in [
                            'Üldfoorum',
                            'Ost-müük',
                            'Elu välismaal',
                            'Vaba teema',
                        ]"
                        :key="link"
                        class="px-5 py-3 font-bold text-gray-500 whitespace-nowrap text-md"
                        :class="{ 'bg-white text-gray-800': i === 0 }"
                        href=""
                    >
                        {{ link }}
                    </inertia-link>
                </div>
            </div>
        </div>
        <div class="lg:container lg:mx-auto p-6 pt-12">
            <!-- <div class="grid gap-8 py-8">
                <ForumRow />
                <BlockTitle>Tripikad räägivad</BlockTitle>
            </div> -->
            <div class="grid grid-cols-[auto,1fr] gap-5">
                <icon-user
                    class="w-10 lg:w-16 text-gray-200 rounded-full border-4 border-cyan-500"
                />
                <div class="grid gap-6">
                    <h1
                        class="font-bold text-3xl text-color-600 tracking-tight"
                    >
                        Aeroflot sulgeb (nädal tagasi taasavatud) liini
                        Tallinn-Moskva vahel
                    </h1>
                    <div class="text-lg">
                        <div>
                            Reisi targalt lehel on üleval info, et alates 30.03
                            on Eestist reisijatel vajalik esitada corona test ka
                            juhul, kui läbitakse Saksamaa transiidina ja
                            vahemaandumisel transiiditsoonist ei väljuta.
                        </div>
                        <div class="h-2" />
                        <div>
                            Samas on Lufthansa lehel info, et transiidi puhul on
                            vajalik test vaid neile, kes tulevad viiruse
                            mutatsiooniga piirkondadest. Eesti kuulub aga kõrge
                            riskiga piirkonna, mitte mutatsiooniohuga piirkonna
                            alla. Oskab keegi kommenteerida, kummat infot
                            usaldada?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
