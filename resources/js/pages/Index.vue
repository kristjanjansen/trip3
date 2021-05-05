<template>
    <div>
        <div
            class="relative p-6 pb-0 overflow-hidden bg-gray-100 lg:px-0 lg:pt-10"
        >
            <background-map
                class="w-[1000px] my-[-260px] absolute inset-0 opacity-5 pointer-events-none"
            />
            <div class="container inset-0 grid gap-6 lg:mx-auto">
                <Nav />
                <div class="h-6" />
                <h1
                    class="text-4xl font-bold tracking-tight text-gray-500 lg:text-5xl"
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
        <div class="p-6 pt-12 lg:container lg:mx-auto bg-gray-50">
            <!-- <div class="grid gap-8 py-8">
                <ForumRow />
                <BlockTitle>Tripikad räägivad</BlockTitle>
            </div> -->
            <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-5">
                <icon-user
                    class="w-12 text-gray-200 border-4 rounded-full md:w-16 border-cyan-500"
                />
                <div class="grid gap-6">
                    <h1
                        class="text-3xl font-bold tracking-tight text-color-600"
                    >
                        Aeroflot sulgeb (nädal tagasi taasavatud) liini
                        Tallinn-Moskva vahel
                    </h1>
                    <div class="flex gap-2">
                        <Tag>Moskva</Tag>
                        <Tag>Venemaa</Tag>
                    </div>
                    <div class="prose lg:prose-lg max-w-none prose-blue">
                        <p>
                            Reisi targalt lehel on üleval info, et alates 30.03
                            on Eestist reisijatel vajalik esitada corona test ka
                            juhul, kui läbitakse Saksamaa transiidina ja
                            vahemaandumisel transiiditsoonist ei väljuta.
                        </p>
                        <p>
                            Samas on Lufthansa lehel info, et transiidi puhul on
                            vajalik test <a href="">vajalik esitada</a> vaid
                            neile, kes tulevad viiruse mutatsiooniga
                            piirkondadest. Eesti kuulub aga kõrge riskiga
                            piirkonna, mitte mutatsiooniohuga piirkonna alla.
                            Oskab keegi kommenteerida, kummat infot usaldada?
                        </p>
                    </div>
                </div>
            </div>

            <div class="h-12" />

            <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-5">
                <div class="w-0 md:w-16" />
                <div class="grid gap-4">
                    <comment v-for="i in 10" :key="i" />
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>
