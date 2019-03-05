<template>

    <div>
        <div class="modal-mask" :class="{'is-active': visible}"></div>

        <div class="show-materials-modal"
             :class="{'is-active animated bounceInUp': visible}">
            <div class="modal-entry">
                <div id="close-modal-materials" class="closs-modal position-absolute" @click.prevent="visible = false">
                    <div class="line line--left"></div>
                    <div class="line line--right"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="show-materials-modal-img"
                             :style="{backgroundImage: `url(${material.image})`}"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="show-materials-modal-item">
                            <h2 class="show-materials-modal-item__title">{{ material.title }}</h2>
                            <p class="show-materials-modal-item__text">
                                {{ material.description }}
                            </p>
                            <div class="show-materials-modal-item__text" v-html="material.body"></div>
                        </div>
                    </div>
                </div>

                <div class="show-materials-modal-item">
                    <div class="text-right">
                        <a href="#" class="more-info" @click.prevent="visible = false">
                            Другие учебные материалы</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
  export default {
    data() {
      return {
        visible: false,
        material: {}
      }
    },
    methods: {
      getModalData(route) {
        axios.get(route)
          .then(({data}) => {
            this.material = data;
            this.visible = true;
          })
      }
    },
    mounted() {
      VBUS.$on('showMaterialModal', (route) => {
        this.getModalData(route);
      });
    }
  }
</script>