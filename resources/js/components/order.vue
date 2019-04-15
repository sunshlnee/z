<template>
    <div class="columns is-multiline">
        <div class="column is-6" v-for="order in orders" :key="order.id">

            <div class="card" style="margin: 5px">

              <header class="card-header">
                <p class="card-header-title">{{order.user.email}}</p>
              </header>

              <div class="card-content">

                <div v-for="orderItem in order.order">
                    <div>
                        <img :src="'/uploads/preview/' + orderItem.product.preview" width="95px">

                        <div class="field is-grouped is-grouped-multiline" style="margin-bottom: 5px; display: inline-block;">
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-dark">Код</span>
                                    <span class="tag is-info">{{ orderItem.product.code }}</span>
                                </div>
                            </div>

                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-dark">Размер</span>
                                    <span class="tag is-info">{{ orderItem.size }}</span>
                                </div>
                            </div>

                            <div class="control">
                                <div class="tags has-addons">
                                  <span class="tag is-dark">Кол-Во {{ orderItem.quantity }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>

                </div>

              </div>
              <footer class="card-footer">
                <a class="card-footer-item" @click="removeOrder(order.id)">Delete</a>
              </footer>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props:['orders'],

    methods: {
        removeOrder(id) {

            axios.delete('/ajax/remove-order/' + id).then(response => { 

                this.$notify({
                    group: 'cart',
                    text: 'Заказ удален',
                    type: 'success'
                })

            })
        }  
    }
}
</script>