<template>
  <div
    class="w-full inline-block p-4 border-b border-orange-100 bg-orange-500 hover:bg-orange-300"
  >
    <component :is="`app-sneak-variant-${sneak.type}`" :sneak="sneak" />
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