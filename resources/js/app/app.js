require('./bootstrap');

import Vue from 'vue';
import MaterialsModal from './components/MaterialsModal'

window.VBUS = new Vue();

new Vue({
  el: '#app',
  components: {
    MaterialsModal
  },
  mounted() {
    require('./common');
    // require('./media-manager/js/media-manager');
  },
  methods: {
    showMaterialModal(route) {
      VBUS.$emit('showMaterialModal', route)
    }
  }
});