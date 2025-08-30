<script setup>
import DefaultForm from './Form.vue'
import { Form } from '@inertiajs/vue3'
</script>

<template>

<Form action="/user/register" method="post">
  @csrf
    <label for="name">Username</label>
<input type="text" name="name" />
<label for="password">Password</label>
<input type="password" name="password" />
<label for="password">Password Confirmation</label>
<input type="password" name="password_confirmation" />
<button type="submit"> Create User </button>
  
</Form>
</template>
<style>
html, body {
    margin: 10px;
    }
  </style>