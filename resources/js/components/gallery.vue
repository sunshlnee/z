<template>
    <div>
      <img class="img-thumbnail" v-for="(image, i) in images" :src="image" @click="onClick(i)" alt="" style="width: 100px; height: 100px; padding: 5px">

      <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>  
    </div>
</template>

<script>
import VueGallerySlideshow from 'vue-gallery-slideshow'

export default {

  components: {
    VueGallerySlideshow
  },

  props : ['images'],

  methods: {

    onClick(i) {
      this.index = i;
    }

  },

  data() {

    return {    
      index: null
    }

  }
}
</script>

<style>

</style>