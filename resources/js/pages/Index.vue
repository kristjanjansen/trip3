<template>
    <div>
        <div
            class="bg-gray-100 relative overflow-hidden p-6 lg:px-0 lg:pt-10 pb-0"
        >
            <background-map
                class="w-[1000px] my-[-260px] absolute inset-0 opacity-5 pointer-events-none"
            />
            <div class="inset-0 container lg:mx-auto grid gap-6">
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
        <div class="lg:container lg:mx-auto p-6 pt-12 bg-gray-50">
            <!-- <div class="grid gap-8 py-8">
                <ForumRow />
                <BlockTitle>Tripikad räägivad</BlockTitle>
            </div> -->
            <div class="grid grid-cols-1 md:grid-cols-[auto,1fr] gap-5">
                <icon-user
                    class="w-12 md:w-16 text-gray-200 rounded-full border-4 border-cyan-500"
                />
                <div class="grid gap-6">
                    <h1
                        class="font-bold text-3xl text-color-600 tracking-tight"
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
        <div class="bg-gray-100 pt-12 pr-6 pb-24 pl-6">
            <div
                class="container lg:mx-auto grid grid-cols-0 md:grid-cols-4 justify-center md:justify-start text-center md:text-left gap-4"
            >
                <inertia-link href="">
                    <logo-plain class="h-[25px] text-gray-600" />
                    <div class="h-8" />
                </inertia-link>
                <div class="grid auto-rows-max gap-5">
                    <inertia-link
                        v-for="i in 7"
                        :key="i"
                        href=""
                        class="font-medium text-sm text-gray-600"
                    >
                        Link {{ i }}
                    </inertia-link>
                </div>
                <div class="grid auto-rows-max gap-5">
                    <inertia-link
                        v-for="i in 3"
                        :key="i"
                        href=""
                        class="font-medium text-sm text-gray-600"
                    >
                        Link {{ i }}
                    </inertia-link>
                </div>
                <div class="grid auto-rows-max gap-5">
                    <inertia-link
                        v-for="i in 7"
                        :key="i"
                        href=""
                        class="font-medium text-sm text-gray-600"
                    >
                        Link {{ i }}
                    </inertia-link>
                </div>
            </div>
            <div class="h-16" />
            <div
                class="flex flex-col md:flex-row gap-4 justify-center items-center"
            >
                <inertia-link
                    v-for="link in [
                        'Facebook',
                        'Twitter',
                        'Lennupakkumiste RSS',
                        'Uudiste RSS',
                    ]"
                    :key="link"
                    href=""
                    class="flex items-center gap-2 text-sm text-gray-600"
                >
                    <icon-rss class="hidden md:block w-4 h-4 text-gray-600" />
                    <div class="text-sm">{{ link }}</div>
                </inertia-link>
            </div>
            <div class="h-12" />
            <div class="text-sm text-gray-400 text-center">
                Autoriõigused © Trip.ee 1998-2021
            </div>
        </div>
    </div>
</template>
