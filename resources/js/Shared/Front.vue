<template>
	<main>
		<div class="md:flex items-center justify-between bg-white shadow-base px-4">
			<div class="flex justify-between md:flex-none items-center">
				<a href="#" class="py-3">
					<div
						class="w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white font-bold"
					>S.</div>
				</a>
				<div
					class="inline-block inline-flex items-center justify-center w-8 h-8 rounded-full mr-2 cursor-pointer md:hidden"
					@click="toggleMenu"
				>
					<svg
						class="fill-current text-gray-600"
						xmlns="http://www.w3.org/2000/svg"
						width="24"
						height="24"
						viewBox="0 0 24 24"
					>
						<path d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z" />
					</svg>
				</div>
			</div>
			<div class="hidden md:block">
				<a
					href="#"
					class="px-4 mr-3 py-5 inline-block font-medium active text-blue-600 hover:text-blue-600"
				>Dashboard</a>
				<a
					href="#"
					class="px-4 mr-3 py-5 inline-block font-medium text-gray-500 hover:text-blue-600"
				>Invoices</a>
				<a
					href="#"
					class="px-4 mr-3 py-5 inline-block font-medium text-gray-500 hover:text-blue-600"
				>Investments</a>
				<a href="#" class="px-4 py-5 inline-block font-medium text-gray-500 hover:text-blue-600">Notices</a>
			</div>
			<div class="hidden md:block">
				<dropdown>
					<template #trigger>
						<div class="flex items-center">
							<span
								class="outline-none block inline-flex items-center justify-center h-10 w-10 overflow-hidden rounded-full shadow-inner"
							>
								<img
									src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=256&amp;q=80"
									alt
									class="h-full w-full object-cover"
								/>
							</span>

							<div class="text-left ml-3">
								<span class="block leading-none">{{$page.auth.user.name}}</span>
								<span class="block leading-none">( {{$page.auth.user.role}} )</span>
							</div>
						</div>
					</template>
					<template #dropdown>
						<div class="mt-2 bg-white xl:border rounded-lg w-48 py-1 shadow-xl">
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Notifications</a>
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Profile & Account</a>
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Help & Feedback</a>
							<div class="border-t my-1"></div>
							<a
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="#"
							>Admin Panel</a>
							<inertia-link
								class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600"
								href="/logout"
								method="post"
							>Logout</inertia-link>
						</div>
					</template>
				</dropdown>
				<!-- <a href="#" class="px-4 py-5 inline-block font-medium text-gray-600 hover:text-blue-500">Sign up</a>
				<a href="#" class="px-4 py-5 inline-block font-medium text-gray-600 hover:text-blue-500">Login</a>-->
			</div>

			<div class="md:hidden" v-if="showNavbar">
				<a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Home</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Search</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Schedule</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Events</a>
				<a
					href="#"
					class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500"
				>Sign up</a>
				<a href="#" class="border-t px-2 py-3 block font-medium text-gray-600 hover:text-blue-500">Login</a>
			</div>
		</div>

		<article class="max-w-5xl mx-auto py-10 px-4">
			<slot />
		</article>
	</main>
</template>


<script>
import Dropdown from "@/Shared/tuis/Dropdown";
import Alert from "@/Shared/tuis/Alert";

export default {
	components: {
		Dropdown,
		Alert
	},
	data() {
		return {
			showNavbar: false
		};
	},
	watch: {
		"$page.flash": {
			handler() {
				this.showMessage();
			},
			deep: true
		}
	},
	mounted() {
		this.showMessage();
	},
	methods: {
		toggleMenu() {
			this.showNavbar = !this.showNavbar;
		},
		logout() {
			this.$inertia.post("/logout");
		},
		showMessage() {
			this.$snack.success(this.$page.flash.success);
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
 