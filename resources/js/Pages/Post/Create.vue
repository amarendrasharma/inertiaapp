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
				v-model="post.category"
				label="Select Category"
				:options="categories"
				class="w-64 mb-4"
				:errors="errors.category_id"
				@input="delete errors.category_id"
			>
				<option value="null" disabled>Select a category</option>
			</select-input>

			<date-input
				format="YYYY-MM-DD"
				class="mb-4 w-64"
				placeholder="Select date"
				label="Publish Date"
				v-model="post.publishAt"
				readonly
			></date-input>
			<textarea-input
				v-model="post.description"
				class="mb-4"
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
import SelectInput from "@/Shared/tuis/SelectInput";
import DateInput from "@/Shared/tuis/DateInput";
import LoadingButton from "@/Shared/tuis/LoadingButton";
export default {
	components: {
		Layout,
		Card,
		TextInput,
		FileInput,
		TextareaInput,
		LoadingButton,
		SelectInput,
		DateInput
	},
	props: ["errors", "categories"],
	data() {
		return {
			post: {
				category: null
			}
		};
	},
	methods: {
		postCreate() {
			this.$refs.submitButton.startLoading();

			// || '' so that the controller can validate as a string not file
			let form = new FormData();
			form.append("title", this.post.title || "");
			form.append("description", this.post.description || "");
			form.append("image", this.post.image || "");
			form.append("category_id", this.post.category || "");
			form.append("publish_at", this.post.publishAt || "");

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