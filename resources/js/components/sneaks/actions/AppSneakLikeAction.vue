<template>
  <a href="#" class="flex items-center text-base" @click.prevent="likeOrUnlike">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      width="24"
      height="24"
      class="fill-current text-orange-100 w-5 mr-2"
      :class="{
        'text-blue-600': liked,
      }"
    >
      <path
        d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z"
      />
    </svg>
    <span
      class="text-orange-100"
      :class="{
        'text-blue-600': liked,
      }"
    >
      {{ sneak.likes_count }}
    </span>
  </a>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  props: {
    sneak: {
      required: true,
      type: Object,
    },
  },

  computed: {
    ...mapGetters({
      likes: "likes/likes",
    }),

    liked() {
      return this.likes.includes(this.sneak.id);
    },
  },

  methods: {
    ...mapActions({
      likeSneak: "likes/likeSneak",
      unlikeSneak: "likes/unlikeSneak",
    }),

    likeOrUnlike() {
      if (this.liked) {
        this.unlikeSneak(this.sneak);
        return;
      }

      this.likeSneak(this.sneak);
    },
  },
};
</script>