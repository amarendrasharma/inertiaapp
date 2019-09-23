<template>
	<layout>
		<div class="max-w-5xl mx-auto px-4 py-10">
			<card v-for="post in posts" :key="post.uuid" class="mb-10" :is-padding="false">
				<div class="flex">
					<div class="w-64 mr-5 bg-gray-200 flex-shrink-0">
						<img :src="post.image_full_path" class="object-cover" />
					</div>
					<div class="p-6">
						<heading
							size="heading"
							:to="`/${post.slug}`"
							tag="a"
							class="mb-4 block hover:text-blue-600"
						>{{post.title}}</heading>
						<heading class="mb-6">{{post.description}}</heading>
						<div class="flex items-center">
							<div class="flex items-center">
								<div>
									<avatar :name="post.user.name" color="blue" class="mr-3"></avatar>
								</div>
								<heading>{{post.user.name}}</heading>
							</div>
							<div class="mx-4 text-gray-600">&bull;</div>
							<div>
								<a href="#" class="text-blue-600">{{post.category.category_name}}</a>
							</div>
						</div>
					</div>
				</div>
			</card>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";
import Card from "@/Shared/tuis/Card";
import Avatar from "@/Shared/tuis/Avatar";
import Heading from "@/Shared/tuis/Heading";
import BasicTable from "@/Shared/tuis/BasicTable";
import Badge from "@/Shared/tuis/Badge";
import Alert from "@/Shared/tuis/Alert";

export default {
	components: {
		Layout,
		Card,
		Heading,
		BasicTable,
		Badge,
		Alert,
		Avatar
	},
	props: ["posts"],

	data() {
		return {
			showNavbar: false,
			datas: [
				{
					invoice: "#IN12345",
					date: "10 Sep 2018",
					amount: 12000,
					status: "Completed"
				},
				{
					invoice: "#IN34512",
					date: "12 Sep 2018",
					amount: 40000,
					status: "Completed"
				},
				{
					invoice: "#IN12345",
					date: "13 Sep 2018",
					amount: 5000,
					status: "Declined"
				},
				{
					invoice: "#IN12345",
					date: "14 Sep 2018",
					amount: 25000,
					status: "Completed"
				},
				{
					invoice: "#IN34555",
					date: "15 Sep 2018",
					amount: 20000,
					status: "Pending"
				}
			]
		};
	},

	methods: {
		toggleMenu() {
			this.showNavbar = !this.showNavbar;
		},
		logout() {
			this.$inertia.post("/logout");
		}
	}
};
</script>

<style>
.active {
	position: relative;
}
.active:after {
	bottom: 0;
	position: absolute;
	left: 0;
	right: 0;
	display: block;
	margin-left: auto;
	margin-right: auto;
	content: "";
	height: 3px;
	width: 100%;
	border-radius: 1000px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
	background-color: #4299e1; /* Change this color a/c to theme */
}
</style>
 