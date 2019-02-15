import Vue from 'vue';



new Vue({
    el: '#app',
    mounted() {
        require('./bootstrap');
        require('./media-manager/js/media-manager');

    }
});
