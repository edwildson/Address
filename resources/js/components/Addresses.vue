<template>
	<div>
		<div class="flex flex-wrap w-full">
			<a
				class="flex justify-start items-center w-full lg:w-1/2 mx-4 p-2 mt-2 mb-0 pb-0 lg:py-6 lg:px-6 lg:mx-0"
			>
				<i
					@click="handleShowAddModal"
					class="button-register-address fa-solid fa-plus px-3 p-2 mx-4 text-white border-2 bg-blue-600 hover:bg-blue-800 rounded-full"
					><span> Novo Endereço</span></i
				>
				<!-- <p class="border-4 rounded-lg border-blue-500 bg-blue-600 hover:border-blue-800 p-2 text-white font-medium text-base antialiased">Cadastrar endereço</p> -->
			</a>
			<Search @search="handleSearchAddress" />
		</div>
		<h2
			class="text-2xl font-semibold w-full pl-10 pb-4 ml-0 lg:py-4 lg:pl-10 lg:mx-0 underline underline-offset-8"
		>
			Endereços     
		</h2>
		<div
			v-if="addresses?.length"
			class="flex flex-wrap justify-center items-center px-4 gap-4"
		>
			<AddressCard
				v-for="(address, index) in addresses"
				:key="index"
				:address="{ ...address }"
				@delete="handleDelete"
				@edit="handleShowEditModal"
			/>
		</div>

		<AddressModal
			:address="selectedAddress"
			:show="showModal"
			:new-address="newAddress"
			@close="handleCloseEditModal"
			@update="handleUpdateAddress"
			@create="handleCreateAddress"
		/>

		<ConfirmationModal
			:address="deleteAddress"
			:show="showDeleteModal"
			@close="handleCloseDeleteModal"
			@delete="handleDeleteConfirmation"
		/>

		<div>
			<flash-message
				:message="flashMessage"
				:type="flashType"
				v-if="showFlashMessage"
			/>
		</div>

		<empty-state v-if="!addresses?.length" @create="handleShowAddModal" />
	</div>
</template>

<script setup>
import Search from "./Search.vue";
import AddressCard from "./AddressCard.vue";
import AddressModal from "./AddressModal.vue";
import ConfirmationModal from "./ConfirmationModal.vue";
import FlashMessage from "./FlashMessage.vue";
import EmptyState from "./EmptyState.vue";
import { onMounted, ref } from "vue";
import api from "../services/api";

const addresses = ref([]);
const selectedAddress = ref({});
const deleteAddress = ref({});
const showModal = ref(false);
const showDeleteModal = ref(false);
const newAddress = ref(true);
const showFlashMessage = ref(false);
const flashMessage = ref("");
const flashType = ref("");

const fetchAddresses = () =>
	api
		.get("/address")
		.then((response) => (addresses.value = response.data.data));

const handleSearchAddress = (address) =>
	api
		.get("/address", { params: { address } })
		.then((response) => (addresses.value = response.data.data));

const handleDelete = (addressToRemove) => {
	deleteAddress.value = addressToRemove;
	showDeleteModal.value = true;
};

const handleCloseEditModal = () => (showModal.value = false);
const handleCloseDeleteModal = () => (showDeleteModal.value = false);

const handleShowEditModal = (addressToEdit) => {
	selectedAddress.value = addressToEdit;
	newAddress.value = false;
	showModal.value = true;
};

const handleShowAddModal = () => {
	console.log("oxe");
	selectedAddress.value = {};
	newAddress.value = true;
	showModal.value = true;
};

const handleDeleteConfirmation = (addressToDelete) => {
	api.delete(`/address/${addressToDelete.id}`).then(
		(response) => {
			addresses.value = addresses.value.filter(
				(address) => address.id != addressToDelete.id
			);
			showDeleteModal.value = false;
			showMessage("Endereço deletado com sucesso!", "success");
		},
		(response) => showMessage(response.data.message, "error")
	);
};

const handleUpdateAddress = (addressToUpdate) => {
	addressToUpdate.zip_code = addressToUpdate.zip_code?.replace(/\D/g, "");
	api.patch(`/address/${addressToUpdate.id}`, addressToUpdate).then(
		(response) => {
			addresses.value = addresses.value.map((address) =>
				address.id != addressToUpdate.id ? address : response.data.data
			);
			showModal.value = false;
			showMessage("Endereço atualizado com sucesso!", "success");
		},
		(response) => showMessage(response.data.message, "error")
	);
};

const handleCreateAddress = (addressToCreate) => {
	addressToCreate.zip_code = addressToCreate.zip_code?.replace(/\D/g, "");
	api.post("/address/", addressToCreate)
		.then(
			(response) => {
				addresses.value.push(response.data.data);
				showModal.value = false;
				showMessage("Endereço cadastrado com sucesso!", "success");
			},
			(err) => {
				console.log("erro create");
				showMessage(err.response.data.message, "error");
			}
		)
		.catch((err) => showMessage(err.response.data.message, "error"));
};

const showMessage = (message, type) => {
	flashMessage.value = message;
	flashType.value = type;
	showFlashMessage.value = true;

	setTimeout(() => {
		showFlashMessage.value = false;
	}, 10000);
};

onMounted(fetchAddresses);
</script>

<style lang="scss" scoped>
.botao-flutuante {
	position: fixed;
	bottom: 30px;
	right: 30px;
}

.float {
	position: fixed;
	width: 60px;
	height: 60px;
	bottom: 40px;
	right: 40px;
	background-color: #0c9;
	color: #fff;
	border-radius: 50px;
	text-align: center;
	box-shadow: 2px 2px 3px #999;
}

.botao-texto {
	display: none;
	/* position: absolute; */
	/* top: -30px; */
	left: 50%;
	transform: translateX(-50%);
	/* background-color: #333; */
	color: #fff;
	padding: 5px;
	border-radius: 3px;
	font-size: 12px;
	white-space: nowrap;
}

.float:hover {
	display: block;
	width: 160px;
	height: 5vh;
	border-radius: 0;
}
.botao-texto {
	display: block;
}

.my-float {
	margin-top: 22px;
}

.my-float:hover {
	display: none !important;
	position: absolute;
}

.button-register-address {
	span {
		display: inline;
	}
	&:hover {
		cursor: pointer;
	}
}
</style>