<template>
	<layout>
		<heading size="heading" class="mb-6">All Posts</heading>
		<card :is-padding="false">
			<basic-table :headings="['Title', 'Description']">
				<tr
					v-for="(post, postIndex) in posts"
					:key="postIndex"
					class="hover:bg-grey-lightest focus-within:bg-grey-lightest"
				>
					<td class="border-t">
						<span class="text-gray-700 px-6 py-4 flex items-center focus:text-indigo">{{ post.title }}</span>
					</td>
					<td class="border-t">
						<span
							class="text-gray-700 px-6 py-4 flex items-center focus:text-indigo"
						>{{ post.description }}</span>
					</td>
				</tr>
			</basic-table>
		</card>
	</layout>
</template>
<script>
import Layout from "@/Shared/Layout";
import Card from "@/Shared/tuis/Card";
import Heading from "@/Shared/tuis/Heading";
import BasicTable from "@/Shared/tuis/BasicTable";
export default {
	components: {
		Layout,
		Card,
		BasicTable,
		Heading
	},
	props: ["posts"],
	data() {},
	methods: {}
};
</script>