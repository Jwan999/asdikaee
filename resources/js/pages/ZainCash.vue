<template>
    <div>
        <navbar></navbar>
        <div class="flex flex-wrap lg:px-24 px-4 mt-10">
            <div v-if="completed"
                 class="w-full text-center text-success font-semibold text-4xl h-[80vh] flex justify-center items-center">
                تمت عملية الدفع بنجاح
            </div>
            <div v-else-if="order"
                 class="w-full text-center text-success font-semibold text-4xl h-[80vh] flex justify-center items-center">
                يرجى اكمال عملية الدفع في النافذة المنبثقة
            </div>

        </div>

    </div>

</template>

<script>
import Navbar from "../components/Navbar";

export default {
    name: "ZainCash",
    props: ["zain", "order", "orderId"],
    components: {
        Navbar,
    },
    data() {
        return {
            completed: null,
        }
    },
    methods: {
        popupCenter({url, title, w, h}) {
            // Fixes dual-screen position                             Most browsers      Firefox
            const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

            const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
            const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

            const systemZoom = width / window.screen.availWidth;
            const left = (width - w) / 2 / systemZoom + dualScreenLeft
            const top = (height - h) / 2 / systemZoom + dualScreenTop
            const newWindow = window.open(url, title, `
      scrollbars=yes,
      width=${w / systemZoom},
      height=${h / systemZoom},
      top=${top},
      left=${left}
      `
            )
            window.addEventListener('message', event => {
                this.completed = event.data;
            })
            if (window.focus) newWindow.focus();
        },
    },
    mounted() {
        if (this.zain) {
            this.popupCenter({url: this.zain.url, title: "Zain Cash", w: 800, h: 600});
        }
        if (window.zain) {
            this.completed = window.zain;
            setTimeout(() => {
                window.opener.postMessage(this.completed, '*');
                window.close();
            }, 2000);
        }
    }
}
</script>

<style scoped>

</style>
