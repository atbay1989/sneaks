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

import axios from 'axios'

export default {
  data() {
    return {
      sneaks: [],
    };
  },

  methods: {
    async getSneaks() {
      let response = await axios.get("/api/timeline");

      this.sneaks = response.data.data;
    },
  },

  mounted() {
    this.getSneaks();
  },
};
</script>