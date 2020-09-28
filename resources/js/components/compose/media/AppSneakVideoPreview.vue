<template>
  <div class="mb-4 relative">
    <video
      controls
      preload
      :src="generateVideoPreview(video)"
      :key="index"
      class="rounded-lg"
    ></video>

    <a
      href="#"
      @click.prevent="$emit('removed', video)"
      class="bg-orange-900 w-8 h-8 rounded-full absolute top-0 right-0 mt-3 mr-3 flex item-center justify-center"
    >
        <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      width="24"
      height="24"
      class="fill-current text-orange-100"
    >
      <path
        d="M11.4142136,10 L14.2426407,7.17157288 L12.8284271,5.75735931 L10,8.58578644 L7.17157288,5.75735931 L5.75735931,7.17157288 L8.58578644,10 L5.75735931,12.8284271 L7.17157288,14.2426407 L10,11.4142136 L12.8284271,14.2426407 L14.2426407,12.8284271 L11.4142136,10 L11.4142136,10 Z M2.92893219,17.0710678 C6.83417511,20.9763107 13.1658249,20.9763107 17.0710678,17.0710678 C20.9763107,13.1658249 20.9763107,6.83417511 17.0710678,2.92893219 C13.1658249,-0.976310729 6.83417511,-0.976310729 2.92893219,2.92893219 C-0.976310729,6.83417511 -0.976310729,13.1658249 2.92893219,17.0710678 L2.92893219,17.0710678 Z"
      />
    </svg>
    </a>
  </div>
</template>

<script>
export default {
  props: {
    video: {
      required: true,
      type: File,
    },
  },

  methods: {
    generateVideoPreview(video) {
      return URL.createdObjectURL(file);
    },
  },
};
</script>