 
<template>
	<div>
		<layout>
			<div class="flex">
				<div class="w-2/3">
					<div class="h-68 rounded-lg bg-blue-300">
						<img :src="post.image_full_path" class="object-fill rounded-lg w-full h-full" />
					</div>
					<div class="py-8">
						<p class="text-3xl">{{post.title}}</p>
						<p>
							<avatar :name="post.user.name" color="orange"></avatar>
							<span class="text-sm">{{post.user.name}}</span>&nbsp;
							<span class="text-gray-500 text-sm">in</span>&nbsp;
							<span class="text-sm">{{post.category.category_name}}</span>
						</p>
						<p
							class="pt-4 text-sm tracking-widest text-gray-700 leading-relaxed"
						>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia a non voluptate consequatur molestias voluptas officia atque velit beatae ex quam ducimus quo, ipsum dolor architecto veritatis et nihil magnam. Non eius recusandae commodi fuga nisi doloribus sit consequatur iure et laborum ipsa doloremque temporibus maxime repudiandae dolorum consectetur dolores enim explicabo, suscipit sunt asperiores, harum perferendis. Nobis vero perspiciatis excepturi ab nemo architecto dolor incidunt distinctio quae tenetur illum a quidem doloremque ipsa eum, dicta consequatur neque? Velit ab dolores labore placeat, in neque aspernatur ullam est assumenda necessitatibus doloremque maiores pariatur, sapiente nulla beatae nobis dolore provident atque. Voluptatibus at veniam nobis provident eum sed velit cumque, laboriosam magni, architecto atque ex, ducimus quae voluptate nemo repudiandae similique libero molestias aliquam non aspernatur? Nam cumque dolore debitis accusantium ipsa odit aut totam odio quia laborum inventore, architecto nihil corporis maiores unde rerum aperiam. Eos tenetur sunt id cumque nisi quas fugit, harum explicabo pariatur error cum eius aliquid voluptatum quos ea, numquam perferendis non excepturi earum aperiam? Molestias distinctio similique sint magnam alias! Doloremque, impedit odio voluptatem, expedita ab alias animi facere modi deleniti in quidem cumque nostrum? Nihil corporis commodi hic omnis non assumenda excepturi est obcaecati.</p>
						<p class="pt-8 text-sm tracking-wider">
							<span class="text-gray-800">Category:</span>&nbsp;
							<span class="text-green-400">{{post.category.category_name}}</span>
						</p>
					</div>
					<div>
						<p class="text-2xl tracking-wider pt-2">
							<u>6 Comments</u>
						</p>
					</div>
				</div>
				<div class="w-1/3 pl-12">
					<div class="pb-4 text-2xl tracking-wider">
						<u>Popular Posts</u>
					</div>
					<div class="flex justify-start">
						<div class="text-3xl text-gray-400 inline-block">01</div>
						<div class="text-lg inline-block">News Needs to Meet Its Audiences Where They Are</div>
					</div>
				</div>
			</div>
		</layout>
	</div>
</template>

<script>
import Layout from "@/Shared/Layout";
import Avatar from "@/Shared/tuis/Avatar";
export default {
	components: {
		Layout,
		Avatar
	},
	props: ["post"]
};
</script>

<style lang="scss" scoped>
</style>