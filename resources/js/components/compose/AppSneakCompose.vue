<template>
  <form class="flex" @submit.prevent="submit">
    <div class="mr-3">
      <img :src="$user.avatar" class="w-12 rounded-full" />
    </div>
    <div class="flex-grow">
      <app-sneak-compose-textarea
        v-model="form.body"
      />

      <div class="flex justify-between">
        <div></div>

        <div class="flex items-center justify-end">
          <div>
            <app-sneak-compose-limit
              class="mr-2" 
              :body="form.body"
              />
          </div>
          <button
            type="submit"
            class="bg-orange-700 rounded-full text-orange-100 text-center px-4 py-3 font-bold leading-none"
          >Submit</button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import axios from 'axios'
export default {
  data () {
    return {
      form: {
        body: ''
      }
    }
  },

  methods: {
    async submit () {
      await axios.post('/api/sneaks', this.form)
      this.form.body = ''
    }
  },
}
</script>