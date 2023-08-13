<template>
	<div class="flex items-center justify-center pt-16">
		<div class="text-center">
			<svg
				@click="$emit('create')"
				class="h-16 w-16 mx-auto text-gray-400 cursor-pointer"
				fill="none"
				stroke-linecap="round"
				stroke-linejoin="round"
				stroke-width="2"
				viewBox="0 0 24 24"
				stroke="currentColor"
                
			>
				<path d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
			</svg>
			<h2 class="mt-2 text-lg font-semibold text-gray-600">
				Nenhum conteúdo disponível
			</h2>
			<p class="mt-1 text-gray-500">
				Não há endereços cadastrados para mostrar neste momento.
			</p>
		</div>
	</div>
</template>
  
  <style>
/* Estilos personalizados podem ser adicionados aqui */
</style>