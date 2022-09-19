<template>
    <div>

        <navbar></navbar>

        <div class="w-full flex flex-col lg:px-24 px-4 mt-10">
            <!--    <router-link :to="{path:'/products'}">Click Me</router-link>-->
            <!--    <router-link :to="{path:'/checkout'}">Checkout</router-link>-->
            <div class="flex flex-wrap items-center justify-between">
                <div class="lg:w-6/12 w-full">
                    <h1 class="lg:text-5xl text-4xl font-bold text-blue-700">
                        متجر اصدقائي
                    </h1>
                    <p class="mt-10 lg:text-xl text-base">عالم بلا حدود لكل من يبحث عن الثقافة والمتعة والخيال.</p>
                    <div class="mt-10">
                        <button type="button"
                                class="lg:py-3 text-xl lg:px-6 py-3 px-5 bg-red-500 text-white rounded-2xl shadow-lg">
                            <a href="/#store">
                                الذهاب الى المتجر
                            </a>
                        </button>
                    </div>


                </div>

                <div class="lg:w-6/12 w-full flex lg:justify-end justify-center mt-6 lg:mt-0">
                    <img class="w-11/12 mt-4" src="images/charechtersWelcoming.png" alt="">
                </div>

            </div>
            <div id="store">

                <h1 class="lg:text-4xl text-3xl lg:mb-10 mb-6 text-center text-red-500 font-bold mt-28">المتجر</h1>

                <div class="flex flex-wrap rounded-2xl justify-center">
                    <h1 :class="activeCategories == null ? 'bg-red-500 text-white' :  'text-red-500 bg-red-100'"
                        @click="getProducts(null)"
                        class="lg:text-xl items-center px-5 py-3 rounded-2xl font-bold ml-2 cursor-pointer lg:mt-0 mt-2">
                        كل المنتجات
                    </h1>
                    <div v-for="category in categories">
                        <h1 :class="activeCategories == category.id ? 'bg-red-500 text-white' :  'text-red-500 bg-red-100'"
                            @click="getProducts(category.id)"
                            class="lg:text-xl items-center px-5 py-3 rounded-2xl font-bold ml-2 cursor-pointer lg:mt-0 mt-2">
                            {{ category.name }}
                        </h1>
                    </div>
                </div>
                <!--products-->


                <!--grid lg:grid-cols-4 md:grid-cols-3 gap-6 grid-cols-1 lg:justify-items-start justify-items-center mt-10-->
                <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10 mt-10">
                    <!--// loop through the products array, create a <product> component for each and pass the object as 'product' prop-->
                    <product v-for="product in products" :hide-price="true" :key="`product-${product.id}`"
                             :product="product"></product>

                    <!--<category v-for="category in categories" :key="`catxegory-${category.id}`" :category="category"></category>-->

                </div>
            </div>
        </div>

    </div>


</template>

<script>
import Product from "../components/Product";
// import Category from "../components/Category";
import Navbar from "../components/Navbar";

import axios from "axios";

export default {
    components: {
        Product, Navbar
    },
    name: "Home",
    data() {
        return {
            products: [],
            categories: [],
            activeCategories: null
        }
    },
    computed: {
        items() {
            return this.$store.getters.items;
        },
        total() {
            return this.$store.getters.total;
        },

        // ...mapGetters(["total"])
    },
    methods: {
        getProducts(category) {
            // console.log(category)
            axios.get('/api/products', {
                params: {
                    category: category,
                }
            }).then(response => {
                // console.log(response)

                this.products = response.data.products;

                if (category !== undefined) {
                    this.activeCategories = category
                    // console.log(this.activeCategories)
                }

            })
        }
    },
    mounted() {
        this.getProducts()

        axios.get('/api/categories').then(response => {
            this.categories = response.data.categories
            // console.log(response)

        });
    }
}
</script>

<style scoped>

</style>
