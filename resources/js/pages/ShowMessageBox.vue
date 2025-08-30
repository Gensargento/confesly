<script setup>
import { Form } from '@inertiajs/vue3'
import { Textarea } from "@/components/ui/textarea"
import { Button } from "@/components/ui/button"
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'

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
    <Textarea name="content" class="w-64 h-64 mt-5"/>
    <Button type="submit" class="mt-5" >Submit </Button>
    </Form>

</template>

<style>
html, body {
    min-height: 100vh;
}
</style>
