<script setup>
import { Form } from '@inertiajs/vue3'
import { Label } from '@/components/ui/label'
import { Input } from '@/components/ui/input'
import { Button } from "@/components/ui/button"
</script>
<template>
<Form action="/user/login" method="post" class="flex flex-col justify-center items-center">
    <h1> Anonimo </h1>
<label for="name">Username </label>
<Input type="text" name="name" class="w-64" />
<label for="password" class="mt-6">Password </label>
 <Input type="password" name="password" class="w-64" />
 <Button type="submit" class="mt-6">Log In</Button>
</Form>
</template>

<style>
html,body{
    height: 100%;
    width: 100%;
}
Form {
    height: 100%;
    width: 100%;
    position: fixed;
}
</style>