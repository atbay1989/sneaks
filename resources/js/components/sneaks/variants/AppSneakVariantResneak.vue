<template>
  <div>
    <div class="text-orange-100 font-medium text-xs flex items-center mb-2">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="24"
        height="24"
        class="fill-current text-orange-100 w-3 mr-2"
      >
        <path
          d="M5,7 L1,7 L1,13 L5,13 L10,18 L10,2 L5,7 Z M16.363961,16.363961 C17.9926407,14.7352814 19,12.4852814 19,10 C19,7.51471863 17.9926407,5.26471863 16.363961,3.63603897 L14.9497475,5.05025253 C16.2164983,6.31700338 17,8.06700338 17,10 C17,11.9329966 16.2164983,13.6829966 14.9497475,14.9497475 L16.363961,16.363961 L16.363961,16.363961 Z M13.5355339,13.5355339 C14.4403559,12.6307119 15,11.3807119 15,10 C15,8.61928813 14.4403559,7.36928813 13.5355339,6.46446609 L12.1213203,7.87867966 C12.6642136,8.42157288 13,9.17157288 13,10 C13,10.8284271 12.6642136,11.5784271 12.1213203,12.1213203 L13.5355339,13.5355339 L13.5355339,13.5355339 Z"
        />
      </svg>

      <span>{{ sneak.user.name }} amplified </span>
    </div>

    <component
      :is="`app-sneak-variant-${sneak.original_sneak.type}`"
      :sneak="sneak.original_sneak"
    />
  </div>
</template>

<script>
export default {
  props: {
    sneak: {
      required: true,
      type: Object,
    },
  },
};
</script>