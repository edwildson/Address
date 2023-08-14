<template>
	<transition name="modal">
		<div class="modal" v-if="show">
			<div class="modal-overlay" @click="closeModal"></div>
			<div class="modal-container">
				<div class="modal-content">
					<!-- Conteúdo do modal aqui -->
					<!-- <slot></slot> -->
					<h2 class="text-2xl font-bold capitalize px-2 py-4">
						{{ newAddress ? 'Cadastrar endereço' : 'Editar Endereço' }}
					</h2>
					<hr class="mb-4" />
					<div class="modal-form">
						<div class="flex flex-wrap w-full">
							<div class="form-group mb-4 px-2 w-full lg:w-1/2">
								<label
									class="block mb-1 text-base 2xl:text-lg font-semibold"
									for="street"
								>
									Nome do logradouro: <span class="required-indicator">*</span>
									
								</label>
								<input
									id="street"
									class="w-full border px-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none"
									type="text"
									autofocus
									placeholder="Digite o nome do logradouro"
									v-model="address.street"
									required
								/>
								<div
									v-if="errors.street"
									class="text-xs text-red-600 mt-1"
								>
									O nome do logradouro é obrigatório
								</div>
							</div>
							<div class="form-group mb-4 px-2 w-full lg:w-1/2">
								<label
									class="block mb-1 text-base 2xl:text-lg font-semibold"
									for="neighborhood"
									>Bairro: <span class="required-indicator">*</span></label
								>
								<input
									class="w-full border px-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none"
									type="text"
									autofocus
									placeholder="Digite o nome do bairro"
									v-model="address.neighborhood"
									id="neighborhood"
									required
								/>
								<div
									v-if="errors.neighborhood"
									class="text-xs text-red-600 mt-1"
								>
									O nome do bairro é obrigatório
								</div>
							</div>
						</div>
						<div class="flex flex-wrap w-full">
							<div class="form-group mb-4 px-2 w-full lg:w-1/2">
								<label
									class="block mb-1 text-base 2xl:text-lg font-semibold"
									for="city"
									>Cidade: <span class="required-indicator">*</span></label
								>
								<input
									class="w-full border px-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none"
									type="text"
									autofocus
									placeholder="Digite o nome da cidade"
									v-model="address.city"
									id="city"
									required
								/>
								<div
									v-if="errors.city"
									class="text-xs text-red-600 mt-1"
								>
									O nome da cidade é obrigatório
								</div>
							</div>
							<div class="form-group mb-4 px-2 w-1/3 lg:w-1/6">
								<label
									class="block mb-1 text-base 2xl:text-lg font-semibold"
									for="uf"
                                >
                                    UF: <span class="required-indicator">*</span>
								</label>
								<div class="relative">
									<select
										v-model="address.uf"
                                        class="w-full h-1/4 border px-4 pr-8 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none appearance-none"
										id="uf"
                                        placeholder="Selecione uma UF"
                                        value="Selecione uma UF"
										required
									>
                                    
                                        <option disabled selected>Selecione uma UF</option>
										<option
											v-for="uf in ufs"
											:key="uf"
											:value="uf"
										>
											{{ uf }}
										</option>
									</select>

									<div
										class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
									>
										<svg
											class="fill-current h-4 w-4"
											xmlns="http://www.w3.org/2000/svg"
											viewBox="0 0 20 20"
										>
											<path
												d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
											/>
										</svg>
									</div>
								</div>
								<div
									v-if="errors.uf"
									class="text-xs text-red-600 mt-1"
								>
									O UF é obrigatório
								</div>
							</div>
							<div class="form-group mb-4 px-2 w-2/3 lg:w-1/3">
								<label
									class="block mb-1 text-base 2xl:text-lg font-semibold"
									for="cep"
									required
                                >
                                    CEP: <span class="required-indicator">*</span>
                                </label>
								<input
									class="w-full border px-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none"
									type="text"
									autofocus
									v-maska:[options]
									placeholder="Digite o CEP da cidade"
									v-model="address.zip_code"
									id="cep"
									required
								/>
								<div
									v-if="errors.zip_code"
									class="text-xs text-red-600 mt-1"
								>
									O CEP é obrigatório
								</div>
							</div>
						</div>
					</div>
					<div class="modal-buttons">
						<button @click="closeModal" class="btn btn-secondary">
							Cancelar
						</button>
						<button @click="saveChanges" class="btn btn-primary">
							Salvar
						</button>
					</div>
				</div>
				<button class="modal-close" @click="closeModal">×</button>
			</div>
		</div>
	</transition>
</template>
  
<script setup>
import { ref } from "vue";
import { vMaska } from "maska";

const emit = defineEmits(['close', 'create', 'update'])
const props = defineProps(["show", "address",  "newAddress"]);
const errors = ref({});
const options = { mask: '#####-###' };
const ufs = [
	"AC",
	"AL",
	"AP",
	"AM",
	"BA",
	"CE",
	"DF",
	"ES",
	"GO",
	"MA",
	"MT",
	"MS",
	"MG",
	"PA",
	"PB",
	"PR",
	"PE",
	"PI",
	"RJ",
	"RN",
	"RS",
	"RO",
	"RR",
	"SC",
	"SP",
	"SE",
	"TO",
];

const closeModal = () => {
	emit("close");
	// this.$emit('update:show', false);
};

const saveChanges = () => {
	if (props.newAddress) {
		if (validateFields())  emit('create', props.address);
	}
	else {
		if (validateFields()) emit('update', props.address)
	}
};

const validateFields = () => {
	const fields = ['street', 'neighborhood', 'city', 'uf', 'zip_code']
	let valid = false;
	for (const field of fields) {
		if (props.address.value == undefined || props.address.value.hasOwnProperty(key)) {
			if (!props.address[field]) 
				errors.value[field] = true;
			else { 
				errors.value[field] = false;
				valid = true;
			}
		}		
  	}
	return valid;
}
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
	z-index: 10;
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
	width: 90%;
	height: 80%;
	overflow: auto;
	border-radius: 0.5rem;
	box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
	position: relative;
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

.required-indicator {
  color: red;
  font-size: 16px;
}
</style>
  