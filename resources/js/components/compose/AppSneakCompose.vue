<template>
  <form class="flex">
    <div class="mr-3">
      <img :src="$user.avatar" class="w-12 rounded-full" />
    </div>
    <div class="flex-grow">
      <textarea
        class="bg-orange-500 w-full outline-none text-orange-100 text-lg resize-none mb-2 placeholder-orange-300"
        placeholder="What is there to say?"
        autofocus
      ></textarea>

      <div class="flex justify-between">
        <div></div>

        <div>
          <button
            type="submit"
            class="bg-orange-700 rounded-full text-orange-100 text-center px-4 py-3 font-bold leading-none"
          >Submit</button>
        </div>
      </div>
    </div>
  </form>
</template>