<script setup>
  import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <Transition
      name="fade-slide"
      mode="out-in"
    >
      <RouterView />
    </Transition>
</template>

<style scoped>
  .fade-slide-enter-from {
    opacity: 0;
    transform: translateX(100px);
  }

  .fade-slide-enter-active {
    transition: all 0.3s ease-out;
  }

  .fade-slide-leave-to {
    opacity: 0;
    transform: translateX(-100px);
  }

  .fade-slide-leave-active {
    transition: all 0.3s ease-in;
  }

</style>