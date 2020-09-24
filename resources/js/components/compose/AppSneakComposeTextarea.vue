<template>
    

      <textarea
        class="bg-orange-500 w-full outline-none text-orange-100 text-lg resize-none mb-2 placeholder-orange-300"
        placeholder="What is there to say?"
        autofocus
        @input="$emit('input', $event.target.value); resize($event)"
        :value="value"
      ></textarea>

</template>

<script>
export default {
    props: {
        value: {
            required: false
        }
    },

    methods: {
        resize (e) {
            e.target.style.height = "auto"
            e.target.style.height = `${e.target.scrollHeight}px`

        }
    }
}
</script>