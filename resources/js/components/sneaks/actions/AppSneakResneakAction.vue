<template>
  <div>
    <app-dropdown v-if="!resneaked">
      <template slot="trigger">
        <app-sneak-resneak-action-button :sneak="sneak" />
      </template>
      <app-dropdown-item @click.prevent="resneakOrUnresneak">
        Amplify
      </app-dropdown-item>
      <app-dropdown-item> Quote </app-dropdown-item>
    </app-dropdown>
    <app-sneak-resneak-action-button
      v-else
      :sneak="sneak"
      @click.prevent="resneakOrUnresneak"
    />
  </div>
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
      resneaks: "resneaks/resneaks",
    }),

    resneaked() {
      return this.resneaks.includes(this.sneak.id);
    },
  },

  methods: {
    ...mapActions({
      resneakSneak: "resneaks/resneakSneak",
      unresneakSneak: "resneaks/unresneakSneak",
    }),

    resneakOrUnresneak() {
      if (this.resneaked) {
        this.unresneakSneak(this.sneak);
        return;
      }

      this.resneakSneak(this.sneak);
    },
  },
};
</script>