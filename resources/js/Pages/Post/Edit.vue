<template>
	<layout>
		<inertia-link href="/posts" class="text-lg text-gray-600 mb-4 inline-block">Back</inertia-link>
		<card with-footer>
			<text-input
				v-model="post.title"
				label=" Title"
				:errors="errors.title"
				class="mb-4"
				@keydown="delete errors.title"
			></text-input>
			<select-input
				v-model="post.category_id"
				label="Select Category"
				:options="categories"
				class="w-64 mb-4"
				:errors="errors.category_id"
				@input="delete errors.category_id"
			>
				<option value="null" disabled>Select a category</option>
			</select-input>
			<textarea-input
				v-model="post.description"
				class="mb-4"
				label="Description"
				:errors="errors.description"
				@keydown="delete errors.description"
			></textarea-input>
			<template v-if="post.image">
				<div class="w-64 h-auto bg-gray-100 rounded-lg mb-2">
					<img :src="post.image_full_path" class="rounded-lg object-fill" />
				</div>
				<loading-button ref="deleteImageBtn" @click.prevent="deleteImage" variant="danger">Delete Image</loading-button>
			</template>
			<template v-else>
				<file-input v-model="image" label="Post Image" :errors="errors.image"></file-input>
			</template>
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
import SelectInput from "@/Shared/tuis/SelectInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";
export default {
	components: {
		Layout,
		Card,
		TextInput,
		FileInput,
		TextareaInput,
		LoadingButton,
		SelectInput
	},
	props: ["errors", "categories", "post"],
	data() {
		return {
			image: null
		};
	},
	methods: {
		postCreate() {
			this.$refs.submitButton.startLoading();

			// || '' show that the controller can validate as a string not file
			let form = new FormData();
			form.append("title", this.post.title || "");
			form.append("description", this.post.description || "");
			form.append("image", this.image || "");
			form.append("category_id", this.post.category_id || "");

			this.$inertia
				.post(`/posts/${this.post.id}/update`, form)
				.then(res => {
					this.$refs.submitButton.stopLoading();
				})
				.catch(() => {
					this.$refs.submitButton.stopLoading();
				});
		},
		deleteImage() {
			this.$inertia
				.post(`/posts/image/${this.post.id}/delete`)
				.then(res => {
					this.$refs.deleteImageBtn.stopLoading();
				})
				.catch(() => {
					this.$refs.deleteImageBtn.stopLoading();
				});
		}
	}
};
</script>