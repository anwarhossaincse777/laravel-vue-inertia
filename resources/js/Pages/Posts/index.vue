<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,useForm,router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
defineProps({

    posts:Array,
})

const form=useForm({
    body:'',
})


form.setError("body","Body filed is required");



const createPost=()=>{
form.post(route('posts'),{

    preserveScroll:true,
    onSuccess:()=>{
        form.reset();
    }
});
}

// const refreshPost=()=>{
//
//     router.get(route('post'),{},{
//
//         only:['posts'],
//     })
//
// }


</script>

<template>
    <Head title="Post">
      <meta name="description" content="post Index">

    </Head>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<!--                globar error jodi  dori-->

                {{$page.props.errors}}


                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <form @submit.prevent="createPost()" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                            <label for="" class="sr-only">Body</label>
                            <textarea name="body" id="body" col="30" rows="5" @focus="form.clearErrors('body')"
                            class="border-gray-300 focus:bg-gray-100 w-full shadow-sm rounded-md focus:border-indigo-500"
                             v-model="form.body"

                            >

                            </textarea>

                            <div class="tex-sm text-red-600" v-if="form.errors.body">

                                {{form.errors.body}}

                            </div>



                            <button :disabled="form.processing" :class="{'opacity-50':form.processing}"

                                type="submit" class="mt-2 bg-gray-700 px-4 py-2 rounded-md font-medium text-white">
                                Post
                            </button>

                        </form>



                        <div class="text-center">
                           <Link :href="route('post')" preserve-scroll type="button" :only="['posts']"  class="btn btn-success">Refresh Post</Link>
                        </div>


                    </div>





                    <div class="p-6 text-gray-900" v-for="post in posts.data" :key="post.id">

                       <div class="font-semibold">

                           <Link :href="route('user.show',post.user)" preserve-scroll >{{post.user.user_name}} </Link>

                       </div>

                           <p class="mt-2 bg-red-50">{{post.body}}</p>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
