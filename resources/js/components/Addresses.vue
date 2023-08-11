<template>
    <div>
        <Search />
        <div class="flex flex-wrap justify-center items-center px-4 gap-4">
            <AddressCard
                v-for="(address, index) in addresses"
                :key="index"
                :address="address"
                @delete="handleDelete"
                @edit="handleShowEditModal"
            />
        </div>
        <AddressModal 
            :address="selectedAddress"
            :show="showModal"
            @close="handleCloseEditModal"
        />


    </div>
</template>

<script setup>
import Search from "./Search.vue"
import AddressCard from "./AddressCard.vue";
import AddressModal from "./AddressModal.vue"
import { onMounted, ref } from 'vue'
import api from "../services/api";

const addresses = ref([]);
const selectedAddress = ref({});
const showModal = ref(false);

const fetchAddresses = () => api.get("/address").then((response) => (
    addresses.value = response.data.data
));

const handleDelete = (addressToRemove) => {
    api.delete(`/address/${addressToRemove.id}`).then(
        addresses.value = addresses.value.filter(
            address => address.id != addressToRemove.id
        ),
        // Lógica para falha
    )

}

const handleShowEditModal = (addressToEdit) => {
    showModal.value = true;
}

const handleCloseEditModal = () =>  showModal.value = false;

const handleEdit = (addressToEdit) => {
    api.delete(`/address/${addressToRemove.id}`).then(
        addresses.value = addresses.value.filter(
            address => address.id != addressToRemove.id
        ),
        // Lógica para falha
    )

}

onMounted(fetchAddresses);

</script>

<style lang="scss" scoped>

</style>