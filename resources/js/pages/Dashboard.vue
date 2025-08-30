<script setup>
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar'

    defineProps({
    messages: Array,
    user: Object
    });
</script>
<template>
    <div class="flex justify-center items-center flex-col min-h-screen">
        <Avatar>
    <AvatarImage src="https://github.com/unovue.png" alt="@unovue" />
    <AvatarFallback>CN</AvatarFallback>
  </Avatar>
		<h2> {{ user.name }} </h2>
		<div v-for="message in messages.data" class="flex flex-col"> 
			<div class="border-2 mt-5 w-64 h-32 rounded-md flex justify-center items-center"> {{ message.content }} </div>

		</div>
    </div>


</template>
