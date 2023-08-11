<template>
    <div class="address-card justify-between p-4 bg-white border border-gray-50 rounded-lg shadow dark:bg-indigo-50 dark:border-gray-700">
        <p>
            <h5 class="flex gap-2 mb-2 text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-black">
                <svg class="flex-none" fill="#000000" width="22px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.97,2.242l-5,20A1,1,0,0,1,2,23a1.025,1.025,0,0,1-.244-.03,1,1,0,0,1-.727-1.212l5-20a1,1,0,1,1,1.94.484Zm10-.484a1,1,0,1,0-1.94.484l5,20A1,1,0,0,0,22,23a1.017,1.017,0,0,0,.243-.03,1,1,0,0,0,.728-1.212ZM12,1a1,1,0,0,0-1,1V6a1,1,0,0,0,2,0V2A1,1,0,0,0,12,1Zm0,7.912a1,1,0,0,0-1,1v4.176a1,1,0,1,0,2,0V9.912A1,1,0,0,0,12,8.912ZM12,17a1,1,0,0,0-1,1v4a1,1,0,0,0,2,0V18A1,1,0,0,0,12,17Z"/>
                </svg>
                {{ address.street }}
            </h5>
        </p>
        <p class="flex font-normal dark:text-gray-800">
            <svg class="flex-none" width="32px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" id="city">
                <path d="M13.6368,3.9994h-1.6387V1.3608C11.99804,1.16148,11.83642,0.99994,11.6371,1l0,0h-0.278&#xA;&#x9;c-0.19932,0-0.3609,0.16158-0.3609,0.3609l0,0v2.6385H9.36c-0.19932,0-0.3609,0.16158-0.3609,0.3609l0,0l0,0v5.6381h-3.637&#xA;&#x9;c-0.20042,0-0.3629,0.16248-0.3629,0.3629v3.2745c0.00055,0.20003,0.16287,0.3619,0.3629,0.3619h8.2747&#xA;&#x9;c0.19932,0,0.3609-0.16158,0.3609-0.3609l0,0V4.36c0-0.19932-0.16158-0.3609-0.3609-0.3609l0,0L13.6368,3.9994z M6.9989,11.9981h-1&#xA;&#x9;v-1h1V11.9981z M8.9989,11.9981h-1v-1h1V11.9981z M10.9989,11.9981h-1v-1h1V11.9981z M10.9989,9.9981h-1v-1h1V9.9981z&#xA;&#x9; M10.9989,7.9981h-1v-1h1V7.9981z M10.9989,5.9981h-1v-1h1V5.9981z M12.9989,11.9971h-1v-1h1V11.9971z M12.9989,9.9971h-1v-1h1&#xA;&#x9;V9.9971z M12.9989,7.9971h-1v-1h1V7.9971z M12.9989,5.9971h-1v-1h1V5.9971z M7.9987,1.3608C7.99864,1.16152,7.83708,1,7.6378,1H5.36&#xA;&#x9;C5.16068,1,4.9991,1.16158,4.9991,1.3609l0,0V3H3.36C3.16138,3.00049,3.00049,3.16138,3,3.36l0,0v0.6394H1.3608&#xA;&#x9;C1.16164,3.99945,1.00017,4.16084,1,4.36l0,0v9.2765c0,0.19932,0.16158,0.3609,0.3609,0.3609h2.6385V8.9986h3.9993V1.3608z&#xA;&#x9; M3,11.9981H2v-1h1V11.9981z M3,9.9981H2v-1h1V9.9981z M3,7.9981H2v-1h1V7.9981z M3,5.9981H2v-1h1V5.9981z M5,7.9981H4v-1h1V7.9981z&#xA;&#x9; M5,5.9981H4v-1h1V5.9981z M7,7.9981H6v-1h1V7.9981z M7,5.9981H6v-1h1V5.9981z M7,3.9981H6V3h1v1V3.9981z"/>
            </svg>
            {{ address.neighborhood }} - {{ address.city }}/{{ address.uf }}</p>
        <p class="flex mb-3 font-normal dark:text-gray-900">
            <svg class="flex-none" width="32px"  viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h48v48H0z" fill="none"/>
                    <g id="Shopicon">
                        <path d="M8,40h32c2.2,0,4-1.8,4-4V12c0-2.2-1.8-4-4-4H8c-2.2,0-4,1.8-4,4v24C4,38.2,5.8,40,8,40z M39.172,12L24,27.172L8.828,12
                            H39.172z M8,16.828l16,16l16-16V36H8V16.828z"/>
                    </g>
                </svg>
            {{ address.zip_code.slice(0,6) }}-{{ address.zip_code.slice(6,8) }}</p>
        <div class="address-card__buttons">
            <a href="#" class="inline-flex h-10 items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Editar
            </a>
            <a href="#" class="inline-flex h-10 items-center mx-2 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Excluir
            </a>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(['address'])

</script>

<style scoped>
.address-card {
    max-width: 80vw;
    width: 85vw;
    height: 15rem;

    @media (min-width: 768px) { 
        width: 44vw;
        height: 15rem;
    }

    @media (min-width: 1024px) {
        width: 44vw;
        height: 15rem;
    }

    @media (min-width: 1280px) {
        width: 30.5vw;
        height: 15rem;
    }

    @media (min-width: 1536px) {
        width: 23.3vw;
        height: 15rem;
    }

}

.address-card__buttons {
    height: 100%;
    bottom: 0;
}
</style>