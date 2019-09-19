<template>
	<layout>
		<div class="max-w-5xl mx-auto px-4 py-10">
			<alert class="mb-5">
				<strong>Hello</strong>. Please verify your email to unlock full features of the application.
			</alert>

			<div class="mb-4 flex items-center justify-between">
				<heading size="heading">Overview</heading>
				<div>
					<heading>As of September 14, 2018</heading>
				</div>
			</div>
			<div class="md:flex md:flex-1 -mx-4 mb-10">
				<div class="md:w-1/3 px-4 mb-4 md:mb-0">
					<card>
						<heading size="small-caps" class="mb-2">Total Balance</heading>
						<heading size="heading" class="mb-2">$16,412.91</heading>
						<span class="text-green-600">+$648.43</span>
					</card>
				</div>
				<div class="md:w-1/3 px-4 mb-4 md:mb-0">
					<card>
						<heading size="small-caps" class="mb-2">Investments</heading>
						<heading size="heading" class="mb-2">$15,606.14</heading>
						<span class="text-green-600">+$648.43</span>
					</card>
				</div>
				<div class="md:w-1/3 px-4 mb-4 md:mb-0">
					<card class="h-full">
						<heading size="small-caps" class="mb-2">Cash</heading>
						<heading size="heading">$806.78</heading>
					</card>
				</div>
			</div>

			<heading size="heading" class="mb-4">Transaction History</heading>
			<basic-table :headings="['Invoice', 'Date', 'Amount', 'Status']">
				<tr
					v-for="(data, dataIndex) in datas"
					:key="dataIndex"
					class="hover:bg-gray-100 focus-within:bg-gray-200"
				>
					<td class="border-t">
						<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.invoice }}</span>
					</td>
					<td class="border-t">
						<span class="text-gray-700 px-6 py-4 flex items-center">{{ data.date }}</span>
					</td>
					<td class="border-t">
						<span class="text-gray-700 px-6 py-4 flex items-center">${{ data.amount }}</span>
					</td>
					<td class="border-t">
						<span class="px-6 py-4 flex items-center">
							<badge variant="danger" v-if="data.status == 'Declined'">{{ data.status }}</badge>
							<badge variant="success" v-if="data.status == 'Completed'">{{ data.status }}</badge>
							<badge variant="warning" v-if="data.status == 'Pending'">{{ data.status }}</badge>
						</span>
					</td>
				</tr>
			</basic-table>
		</div>
	</layout>
</template>

<script>
import Layout from "@/Shared/Layout";

import Card from "@/Shared/tuis/Card";
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
		Alert
	},

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
 