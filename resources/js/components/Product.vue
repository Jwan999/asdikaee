<template>
    <div class="shadow-lg bg-white rounded-2xl flex flex-col hover:shadow-xl">
        <a :href="'product/'+product.id">
            <img class="rounded-t-2xl border-t-2 border-gray-700 h-96 w-full object-cover hover:opacity-80"
                 :src="'storage/'+product.preview_img"
                 alt="">
        </a>

        <!--    <h3 class="font-bold text-lg"></h3>-->
        <div class="px-3 py-4">
            <h3 class="font-bold text-xl text-red-500 text-center">{{ product.name }}</h3>
<!--            <h3 class="text-gray-800 text-justify text-md mt-2">{{ product.description }} Lorem ipsum dolor sit amet,-->
<!--                consectetur adipisicing elit. Animi consectetur doloremque ea incidunt nihil sed! Alias asperiores-->
<!--                assumenda distinctio dolore esse, fugiat laborum maiores maxime nihil, quibusdam totam, vel-->
<!--                voluptas?</h3>-->

            <div class="flex justify-start mt-5">
                <h3 class="text-lg text-gray-800"><span class="font-normal">السعر: </span>{{ product.price }}
                    IQD</h3>

            </div>
            <div class="border border-b-[0.5px] border-gray-300 w-full my-2"></div>
            <template v-if="showButtons">
                <div v-if="cartItem" class="grid grid-cols-4">
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
                <div v-else class="grid grid-cols-5 ">
                    <button
                        @click="addToCart"
                        class="bg-red-500 focus:bg-red-600-500 py-3 px-4 text-white rounded-2xl shadow-lg my-1 hover:bg-red-600 cursor-pointer col-span-5">
                        اضافة الى السلة
                    </button>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
    props: {
        product: {
            type: Object,
            required: false,
        },
        showButtons: {
            type: Boolean,
            default() {
                return true;
            }
        }
    },
    name: "Product",
    methods: {

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
    }

}
</script>

<style scoped>

</style>
