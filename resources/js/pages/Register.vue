<template>
  <div class="flex flex-col space-y-10 w-8/12">
    <input v-model="name" placeholder="name" type="text">
    <input v-model="phone" placeholder="phone" type="text">
    <input v-model="email" placeholder="email" type="text">
    <input v-model="address" placeholder="address" type="text">
    <input v-model="password" placeholder="password" type="text">
    <button @click="register">register</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      name: "",
      phone: "",
      address: "",
    }
  },
  methods: {
    register() {
      axios.post('/register', {
        email: this.email,
        password: this.password,
        phone: this.phone,
        name: this.name,
        address: this.address,
      }).then(response => {
        // console.log(response)
        // window.location.reload();
      })
    },
  },
  mounted() {
  }
}
</script>

<style scoped>

</style>
