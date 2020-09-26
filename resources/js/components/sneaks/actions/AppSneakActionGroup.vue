<template>
  <ul class="flex mt-4">
    <li class="w-3/12">
        <app-sneak-reply-action />
    </li>
    <li class="w-3/12">
        <app-sneak-resneak-action />
    </li>
    <li class="w-3/12">
        <app-sneak-like-action 
          :sneak="sneak"
        />
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    sneak: {
      required: true,
      type: Object
    }
  }
}
</script>