<template>
    <div>
      <app-sneak
        v-for="sneak in sneaks"
        :key="sneak.id"
        :sneak="sneak"
        />
    </div>
</template>

<script>

import { mapGetters, mapActions } from 'vuex'

export default {
  computed: {
    ...mapGetters({
      sneaks: 'timeline/sneaks'
    })
  },
  
  methods: {
    ...mapActions({
      getSneaks: 'timeline/getSneaks'
    })
  },

  mounted () {
    this.getSneaks()
  }
}
</script>