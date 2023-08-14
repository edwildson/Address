<template>
	<div v-if="show" class="flash-message" :class="typeClass">
		{{ message }}
		<button @click="hideMessage" class="close-button">×</button>
	</div>
</template>
  
  <script>
export default {
	props: {
		message: String,
		type: String, // Pode ser "success", "info", "warning", ou "error"
	},
	data() {
		return {
			show: true,
		};
	},
	computed: {
		typeClass() {
			return this.type ? `flash-${this.type}` : "";
		},
	},
	methods: {
		hideMessage() {
			this.show = false;
		},
	},
};
</script>
  
<style scoped>
.flash-message {
	position: fixed;
	bottom: 2vh;
	left: 50%;
	transform: translateX(-50%);
	padding: 1rem;
	background-color: #333;
	color: white;
	border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    z-index: 11;
	width:max-content;
}

.flash-success {
	background-color: #4caf50;
}

.flash-info {
	background-color: #2196f3;
}

.flash-warning {
	background-color: #ff9800;
}

.flash-error {
	background-color: #f44336;
}

.close-button {
	top: 5px;
	right: 0px;
	color: white;
	font-size: 18px;
	cursor: pointer;
}
</style>