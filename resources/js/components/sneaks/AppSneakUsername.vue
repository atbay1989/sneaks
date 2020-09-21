<template>
  <span class="text-grey-200 font-bold">
    {{ user.name }}
    <span class="text-orange-100 font-normal">@{{ user.username }}</span>
  </span>
</template>

<script>
export default {
  props: {
    user: {
      required: true,
      type: Object,
    },
  },
};
</script>