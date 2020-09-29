<template>
  <form
    class="flex"
    @submit.prevent="submit">

    <img
      :src="$user.avatar"
      class="w-12 h-12 rounded-full mr-3"
    />

    <div class="flex-grow">

      <app-sneak-compose-textarea
        v-model="form.body"
      />

      <span class="text-orange-100"></span>

      <app-sneak-image-preview
        :images="media.images"
        v-if="media.images.length"
        @removed="removeImage"
      />

      <app-sneak-video-preview
        :video="media.video"
        v-if="media.video"
        @removed="removeVideo"
      />

      <div class="flex justify-between">
        <ul class="flex items-center">
          <li class="mr-4">
            <app-sneak-compose-media-button
              id="media-compose"
              @selected="handleMediaSelected"
            />
          </li>
        </ul>

        <div class="flex items-center justify-end">
          <div>
            <app-sneak-compose-limit
              class="mr-2"
              :body="form.body" />
          </div>
          <button
            type="submit"
            class="bg-orange-700 rounded-full text-orange-100 text-center px-4 py-3 font-bold leading-none animate-pulse"
          >
            Submit
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      form: {
        body: "",
        media: []
      },

      media: {
        images: [],
        video: null
      },

      mediaTypes: {},
    };
  },

  methods: {
    async submit() {
      await axios.post("/api/sneaks", this.form);
      this.form.body = ''
    },

    removeVideo() {
      this.media.video = null;
    },

    removeImage(image) {
      this.media.images = this.media.images.filter((i) => {
        return image !== i;
      });
    },

    async getMediaTypes() {
      let response = await axios.get("/api/media/types");
      this.mediaTypes = response.data.data;
    },

    handleMediaSelected(files) {
      Array.from(files)
        .slice(0, 4)
        .forEach((file) => {
          if (this.mediaTypes.image.includes(file.type)) {
            this.media.images.push(file)
          }

          if (this.mediaTypes.video.includes(file.type)) {
            this.media.video = file
          }
        });

      if (this.media.video) {
        this.media.images = [];
      }
    }
  },

  mounted() {
    this.getMediaTypes();
  },
};
</script>