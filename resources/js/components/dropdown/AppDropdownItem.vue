<template>
  <a href="#" class="block py-3 px-4 text-orange-100 hover:bg-orange-300" @click.prevent="handleClick">
      <slot />
  </a>
</template>

<script>
export default {
    methods: {
        handleClick (e) {
          this.$emit('click', e)  
          this.$parent.close()
        }
    }
}
</script>