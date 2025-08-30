<script setup>
import { Form } from '@inertiajs/vue3'
import { Textarea } from "@/components/ui/textarea"
import { Button } from "@/components/ui/button"
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert'

const props = defineProps({
    user: Object
})
const userLink = "/" + props.user.name + "/message";
</script>

<template>
    <Form method="post" :action="userLink" class="flex justify-center items-center flex-col min-h-screen">
        <Avatar>
    <AvatarImage src="https://github.com/unovue.png" alt="@unovue" />
    <AvatarFallback>CN</AvatarFallback>
  </Avatar>
    <h2> {{  props.user.name  }}</h2>
    <Alert class="w-80 mt-5 flex justify-center">
    <AlertDescription class="w-64 text-center">
    <span class="text-center">Anonymous message sent succesfully </span>
    </AlertDescription>
  </Alert>
    </Form>

</template>

<style>
html, body {
    min-height: 100vh;
}
</style>
