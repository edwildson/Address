<template>
	<div class="w-full">
		<form class="mx-4 px-6 pt-4 lg:px-2 lg:mx-0 lg:mx-8" @submit.prevent="submitForm">
			<label
				for="default-search"
				class="m-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
				>Search</label
			>
			<div class="relative">
				<div
					class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
				>
					<svg
						class="w-4 h-4 text-gray-500 dark:text-gray-400"
						aria-hidden="true"
						xmlns="http://www.w3.org/2000/svg"
						fill="none"
						viewBox="0 0 20 20"
					>
						<path
							stroke="currentColor"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
						/>
					</svg>
				</div>
				<input
					type="search"
					id="default-search"
					class="block w-full p-4 pl-10 text-sm text-black border border-gray-300 rounded-lg dark:placeholder-gray-400"
					placeholder="Buscar um endereço"
                    v-model="addressSearch"
				/>
				<button
					type="submit"
					class="text-white absolute right-2.5 bottom-2.5 bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2"
				>
					Buscar
				</button>
			</div>
		</form>
	</div>
</template>

<script setup>
import { ref } from 'vue';

const addressSearch = ref('');
const emit = defineEmits(['search'])

const submitForm = () => emit('search', addressSearch.value)
</script>

<style lang="scss" scoped>
</style>