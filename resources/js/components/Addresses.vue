<template>
    <div>
        <Search />
        <div class="flex flex-wrap justify-center items-center px-4 gap-4">
            <AddressCard
                v-for="(address, index) in addresses"
                :key="index"
                :address="address"
            />
        </div>


    </div>
</template>

<script setup>
import Search from "./Search.vue"
import AddressCard from "./AddressCard.vue";
import { reactive } from 'vue'

const addresses = reactive([
    {
        'zip_code': '12345678',
        'city': 'Juazeiro',
        'neighborhood': 'St. Antônio ABC ace das safwqc',
        'uf': 'BA',
        'street': 'Rua Amazonas',
    },
    {
        'zip_code': '12345678',
        'city': 'Petrolina',
        'neighborhood': 'St. Antônio',
        'uf': 'PE',
        'street': 'Avenida da integração',
    },
    {
        'zip_code': '12345678',
        'city': 'Salvador',
        'neighborhood': 'St. Antônio',
        'uf': 'BA',
        'street': 'Rua Vermelha',
    },
    {
        'zip_code': '12345678',
        'city': 'São Paulo',
        'neighborhood': 'St. Antônio',
        'uf': 'SP',
        'street': 'Avenida Faria Lima',
    },
    {
        'zip_code': '12345678',
        'city': 'Juazeiro',
        'neighborhood': 'St. Antônio',
        'uf': 'BA',
        'street': 'Rua Amazonas',
    },
    {
        'zip_code': '12345678',
        'city': 'Petrolina',
        'neighborhood': 'St. Antônio',
        'uf': 'PE',
        'street': 'Avenida da integração',
    },
    {
        'zip_code': '12345678',
        'city': 'Salvador',
        'neighborhood': 'St. Antônio',
        'uf': 'BA',
        'street': 'Rua Vermelha',
    },
    {
        'zip_code': '12345678',
        'city': 'São Paulo',
        'neighborhood': 'St. Antônio',
        'uf': 'SP',
        'street': 'Avenida Faria Lima',
    },
    {
        'zip_code': '12345678',
        'city': 'Juazeiro',
        'neighborhood': 'St. Antônio',
        'uf': 'BA',
        'street': 'Rua Amazonas',
    },
    {
        'zip_code': '12345678',
        'city': 'Petrolina',
        'neighborhood': 'St. Antônio',
        'uf': 'PE',
        'street': 'Avenida da integração',
    },
    {
        'zip_code': '12345678',
        'city': 'Salvador',
        'neighborhood': 'St. Antônio',
        'uf': 'BA',
        'street': 'rua Padre Benedito de Jesus Batista Laurindo',
    },
    {
        'zip_code': '12345678',
        'city': 'São Paulo',
        'neighborhood': 'St. Antônio',
        'uf': 'SP',
        'street': 'Avenida Faria Lima',
    },
]);


</script>

<style lang="scss" scoped>

</style>