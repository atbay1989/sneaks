<template>
  <div class="flex w-full">
      <img :src="sneak.user.avatar" class="w-12 h-12 rounded-full mr-3" />
    <div class="flex-grow">
      <app-sneak-username :user="sneak.user" />
      <p class="text-grey-200 whitespace-pre-wrap">{{ sneak.body }}</p>
      <app-sneak 
        class="border border-orange-100 rounded-lg mt-4"
        :sneak="sneak.original_sneak"
      />
      <app-sneak-action-group 
        :sneak="sneak"
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