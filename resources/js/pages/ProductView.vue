<template>
    <div>
        <navbar></navbar>

        <div class="lg:px-24 px-4 mt-10">

            <div class="flex justify-end">
                <button @click="goBack"
                        class="lg:py-3 py-3 px-4 lg:px-6 bg-gray-700 focus:bg-gray-800 text-white rounded-2xl shadow-lg">
                    رجوع
                </button>
            </div>
            <div class="flex lg:flex-row flex-col-reverse items-center justify-between mt-10 bg-white rounded p-4">

                <div class="lg:w-5/12 w-full mt-10 lg:mt-0">
                    <h1 class="text-2xl text-dark-100">{{ product.name }}</h1>
                    <p class="text-base mt-6 text-dark-200">
                        {{ product.description }}
                    </p>
                    <h1 class="text-orange-100 text-xl mt-4">
                        <span class="text-dark-100 text-sm">السعر:</span>
                        {{ product.price }} IQD
                    </h1>


                    <!--                    <h1 class="text-lg text-dark-200 mt-10">هذا المنتج من متجر:</h1>-->
                    <!--                    <div class="flex items-center mt-6">-->
                    <!--                        <img class="rounded-full border border-dark-100 w-16 h-16 object-center object-cover ml-4"-->
                    <!--                             :src="'/storage/'+product.shop.logo" alt="">-->

                    <!--                        <h1 class="text-xl text-dark-200">-->
                    <!--                            {{ product.shop.name }}-->
                    <!--                        </h1>-->
                    <!--                    </div>-->

                    <!--                    <p class="text-dark-200 mt-3">-->
                    <!--                        {{ product.shop.overview }}-->
                    <!--                    </p>-->


                    <div v-if="cartItem" class="grid grid-cols-4 mt-10">
                        <button
                            @click="removeFromCart"
                            class="bg-gray-700 text-white py-2 px-4 font-semibold text-xl rounded-2xl my-1 hover:bg-gray-800 cursor-pointer col-span-1">
            <span class="flex justify-center">

              <svg class="fill-current text-white w-8 h-8" viewBox="0 0 24 24"
                   xmlns="http://www.w3.org/2000/svg">
<path
    d="M18 12.75H6C5.59 12.75 5.25 12.41 5.25 12C5.25 11.59 5.59 11.25 6 11.25H18C18.41 11.25 18.75 11.59 18.75 12C18.75 12.41 18.41 12.75 18 12.75Z"/>
</svg>

            </span>
                        </button>
                        <span
                            class="col-span-2 flex items-center justify-center font-mono text-lg">{{
                                cartItem.quantity
                            }}</span>
                        <button
                            @click="addToCart"
                            class="bg-red-500 text-white py-2 px-4 font-semibold text-xl rounded-2xl my-1 hover:bg-red-600 cursor-pointer col-span-1">
            <span class="flex justify-center">
              <svg class="fill-current text-white w-8 h-8" viewBox="0 0 24 24"
                   xmlns="http://www.w3.org/2000/svg"><path
                  d="M18 12.75H6C5.59 12.75 5.25 12.41 5.25 12C5.25 11.59 5.59 11.25 6 11.25H18C18.41 11.25 18.75 11.59 18.75 12C18.75 12.41 18.41 12.75 18 12.75Z"/><path
                  d="M12 18.75C11.59 18.75 11.25 18.41 11.25 18V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V18C12.75 18.41 12.41 18.75 12 18.75Z"/>
              </svg>

            </span>
                        </button>
                    </div>
                    <div v-else class="grid grid-cols-5 mt-10">
                        <button
                            @click="addToCart"
                            class="bg-red-500 focus:bg-red-600-500 py-3 px-4 text-white rounded-2xl shadow-lg my-1 hover:bg-red-600 cursor-pointer col-span-5">
                            اضافة الى السلة
                        </button>
                    </div>


                </div>


                <div class="lg:w-6/12 lg:flex flex-none justify-center w-full">
                    <div class="w-full flex justify-center">
                        <img class="rounded w-96 object-cover" :src="mainImage.url" alt="">
                    </div>
                    <div v-if="productsImages.length !=0"
                         class="grid lg:grid-cols-1 grid-cols-4 lg:justify-items-start justify-items-center bg-gray-100 p-4 lg:w-auto w-full lg:gap-0 gap-4">

                        <img v-for="(img,index) in productsImages" @click="pickImage(index)"
                             class="rounded lg:h-24 lg:w-32 h-20 w-full object-cover object-center hover:opacity-70 cursor-pointer"
                             :src="img.url" alt="">

                    </div>
                </div>
                <!--testing better code for multiple images-->
                <!--                <div>-->
                <!--                    <div class="grid grid-cols-4 justify-items-center w-full gap-6">-->
                <!--                        <div class="bg-gray-100 p-8 col-span-4 text-center">test</div>-->
                <!--                        <div class="bg-gray-100 p-8">test</div>-->
                <!--                        <div class="bg-gray-100 p-8">test</div>-->
                <!--                        <div class="bg-gray-100 p-8">test</div>-->

                <!--                    </div>-->
                <!--                </div>-->

                <!--                todo-->
                <!--                add a main image property and change it when other images are clicked, -->
                <!--                by default it takes the first image in the main image through vue js and adds all the images to an array of all the products images and when each image is clicked the main image link changes-->
                <!--                <div class="grid">-->

                <!--                </div>-->

                <!--                add array of hex code colors and use them as background color for-->

            </div>

        </div>

    </div>
</template>


<script>
import Navbar from "../components/Navbar";
import axios from "axios";
import {mapGetters} from "vuex";

export default {
    data() {
        return {
            product: {},
            mainImage: '',
            productsImages: [],
        }
    },
    components: {
        Navbar
    },
    methods: {
        goBack() {
            this.$router.back();
        },
        pickImage(index) {
            // this.productsImages.push(this.mainImage)
            this.mainImage = this.productsImages[index]
        },
        getProduct() {
            axios.get('/api/product', {
                params: {
                    id: this.$route.params.id
                }
            }).then(response => {
                this.product = response.data.product
                // console.log(response.data)

                if (this.product.images) {
                    // console.log('test')
                    this.productsImages = JSON.parse(this.product.images)
                    this.productsImages.push({
                        url: `/storage/${this.product.preview_img}`
                    })
                    this.mainImage = this.productsImages[this.productsImages.length - 1]

                } else {
                    this.mainImage = {
                        url: `/storage/${this.product.preview_img}`
                    }
                }

                // console.log(this.productsImages)
            })
        },
        addToCart() {
            this.$store.dispatch("addToCart", {
                product: this.product,
                quantity: 1
            });
        },
        removeFromCart() {
            this.$store.dispatch("removeFromCart", {
                product: this.product,
            });
        }
    },
    computed: {
        ...mapGetters({
            "cartItems": "items"
        }),
        cartItem() {
            return this.cartItems.find(item => item.product.id === this.product.id);
        }
    },

    mounted() {
        this.getProduct()
    }

}
</script>

<!--<template>-->

<!--    <div class="text-black">-->
<!--       hello Product-->
<!--    </div>-->

<!--</template>-->

<!--<script>-->
<!--export default {-->
<!--    name: "ProductView",-->

<!--}-->
<!--</script>-->


<!--<style scoped>-->

<!--</style>-->
