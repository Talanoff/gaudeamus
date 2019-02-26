require('./bootstrap');

import Vue from 'vue';

new Vue({
    el: '#app',
    mounted() {
        require('./media-manager/js/media-manager');
    }
});