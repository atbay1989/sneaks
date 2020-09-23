<template>
  <div class="flex w-full">
    <div class="mr-3">
      <img :src="sneak.user.avatar" class="w-12 rounded-full" />
    </div>
    <div>
      <app-sneak-username :user="sneak.user" />
      <p class="text-grey-200 whitespace-pre-wrap">{{ sneak.body }}</p>
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