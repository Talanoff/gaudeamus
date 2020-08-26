require('./bootstrap');

import Vue from 'vue';
import MultiImageUploader from "./components/MultiImageUploader";
import ImageUploader from "./components/SingleImageUploader";
import Wysiwyg from "./components/Wysiwyg";

new Vue({
    el: '#app',
    components: {
        MultiImageUploader,
        ImageUploader,
        Wysiwyg,
    },
    mounted() {
        const notification = document.querySelectorAll('.notification');

        if (notification.length) {
            Array.from(notification).map(item => {
                setTimeout(() => {
                    item.style.display = 'none';
                }, 4000);
            })
        }

        require('./modules/phone-mask');
    }
});

