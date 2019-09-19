<template>
	<layout>
		<card with-footer>
			<text-input
				v-model="post.title"
				label=" Title"
				:errors="errors.title"
				class="mb-3"
				@keydown="delete errors.title"
			></text-input>
			<textarea-input
				v-model="post.description"
				class="mb-3"
				label="Description"
				:errors="errors.description"
				@keydown="delete errors.description"
			></textarea-input>
			<file-input v-model="post.image" label="Post Image" :errors="errors.image"></file-input>
			<template #footer>
				<loading-button ref="submitButton" @click="postCreate">Save Article</loading-button>
			</template>
		</card>
	</layout>
</template>
<script>
import Layout from "@/Shared/Layout";
import Card from "@/Shared/tuis/Card";
import TextInput from "@/Shared/tuis/TextInput";
import TextareaInput from "@/Shared/tuis/TextareaInput";
import FileInput from "@/Shared/tuis/FileInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";
export default {
	components: {
		Layout,
		Card,
		TextInput,
		FileInput,
		TextareaInput,
		LoadingButton
	},
	props: ["errors"],
	data() {
		return {
			post: {}
		};
	},
	methods: {
		postCreate() {
			this.$refs.submitButton.startLoading();

			// || '' show that the controller can validate as a string not file
			let form = new FormData();
			form.append("title", this.post.title || "");
			form.append("description", this.post.description || "");
			form.append("image", this.post.image || "");

			this.$inertia
				.post("/posts", form)
				.then(res => {
					this.$refs.submitButton.stopLoading();
					this.post = {};
				})
				.catch(() => {
					this.$refs.submitButton.stopLoading();
				});
		}
	}
};
</script>