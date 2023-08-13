<template>
	<transition name="modal">
		<div class="modal" v-if="show">
			<div class="modal-overlay" @click="closeModal"></div>
			<div class="modal-container">
				<div class="modal-content p-4 bg-white shadow-md rounded-lg text-center">
					<h3 class="text-xl lg:text-2xl font-semibold m-4">
						Tem certeza que deseja apagar o endereço selecionado?
					</h3>
					<div class="m-6">
						<p>Rua: {{ address.street }}</p>
						<p>Bairro: {{ address.neighborhood }}</p>
						<p>Cidade: {{ address.city }}</p>
						<p>UF: {{ address.uf }}</p>
						<p>CEP: {{ address.zip_code }}</p>
					</div>
					<div class="flex justify-center lg:justify-end ">
						<button
							@click="closeModal"
							class="px-4 py-2 bg-gray-300 text-gray-700 rounded mr-2"
						>
							Cancelar
						</button>
						<button
							@click="confirmDelete"
							class="px-4 py-2 bg-red-500 text-white rounded"
						>
							Deletar
						</button>
					</div>
				</div>
				<button class="modal-close" @click="closeModal">×</button>
			</div>
		</div>
	</transition>
</template>
  
<script setup>
const emit = defineEmits(["close", "delete"]);
const props = defineProps(["show", "address"]);

const closeModal = () => {
	emit("close");
};

const confirmDelete = () => {
	emit("delete", props.address);
};
</script>
  
<style scoped>
.modal {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	z-index: 9999;
}

.modal-overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.5);
	z-index: -1;
}

.modal-container {
	background-color: white;
	width: 80vw;
	height: 80vh;
	overflow: auto;
	border-radius: 0.5rem;
	box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
	position: relative;

    @media (min-width: 300px) {
        width: 80vw;
	    height: 50vh;
    }

    @media (min-width: 768px) {
        width: 55vw;
	    height: 50vh;
    }

    @media (min-width: 1024px) {
        width: 55vw;
	    height: 48vh;
    }

    @media (min-width: 1536px) {
        width: 50vw;
	    height: 30vh;
    }
}

.modal-content {
	background-color: white;
	height: 100%;
	padding: 20px;
	border-radius: 8px;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
	margin: 0 auto;
}

.modal-title {
	font-size: 1.5rem;
	margin-bottom: 10px;
}

.form-group {
	margin-bottom: 15px;
}

.label {
	font-weight: bold;
	display: block;
	margin-bottom: 5px;
}

.input {
	width: 100%;
	padding: 8px;
	border: 1px solid #000000;
	border-radius: 4px;
	transition: border-color 0.3s;
}

.input:focus {
	border-color: #3490dc;
	outline: none;
}

.modal-buttons {
	text-align: right;
	margin-top: 15px;
}

.btn {
	padding: 8px 15px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	transition: background-color 0.3s, color 0.3s;
}

.btn-primary {
	background-color: #3490dc;
	color: white;
}

.btn-secondary {
	background-color: #ccc;
	color: #333;
	margin-right: 10px;
}

.btn:hover {
	background-color: #1d68a7;
	color: white;
}

.modal-close {
	position: absolute;
	top: 0.5rem;
	right: 0.5rem;
	padding: 0.5rem;
	cursor: pointer;
}
</style>
  