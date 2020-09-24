<template>
  <div class="flex w-full">
    <div class="mr-3">
      <img :src="sneak.user.avatar" class="w-12 rounded-full" />
    </div>
    <div class="flex-grow">
      <app-sneak-username :user="sneak.user" />
      <p class="text-grey-200 whitespace-pre-wrap">{{ sneak.body }}</p>
      <app-sneak 
        class="border border-orange-100 rounded-lg mt-4"
        :sneak="sneak.original_sneak"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    sneak: {
      required: true,
      type: Object,
    },
  },
};
</script>