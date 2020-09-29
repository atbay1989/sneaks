<template>
  <div>
    <div class="border-b-8 border-orange-500 p-4 w-full">
      <app-sneak-compose />
    </div>

    <app-sneak
      v-for="sneak in sneaks"
      :key="sneak.id"
      :sneak="sneak"
    />

    <div
      v-if="sneaks.length"
      v-observe-visibility="{
        callback: handleScrolledToBottomOfTimeline
      }"
    >

    </div>
  </div>
</template>

<script>
  import { mapGetters, mapActions, mapMutations } from 'vuex'

  export default {
    data () {
      return {
        page: 1,
        lastPage: 1
      }
    },

    computed: {
      ...mapGetters({
        sneaks: 'timeline/sneaks'
      }),

      urlWithPage () {
        return `/api/timeline?page=${this.page}`
      }
    },

    methods: {
      ...mapActions({
        getSneaks: 'timeline/getSneaks'
      }),

      ...mapMutations({
        PUSH_SNEAKS: 'timeline/PUSH_SNEAKS'
      }),

      loadSneaks () {
        this.getSneaks(this.urlWithPage).then((response) => {
          this.lastPage = response.data.meta.last_page
        })
      },

      handleScrolledToBottomOfTimeline (isVisible) {
        if (!isVisible) {
          return
        }

        if (this.lastPage === this.page) {
          return
        }

        this.page++

        this.loadSneaks()
      }
    },

    mounted () {
      this.loadSneaks()

      Echo.private(`timeline.${this.$user.id}`)
        .listen('.SneakWasCreated', (e) => {
          this.PUSH_SNEAKS([e])
        })
    }
  }
</script>