<template>
    <div>
        <div class="container" style="margin-left: 20px">
            <p>{{this.$store.state.cartCount}} товаров на {{ totalPrice }} рублей</p>
        </div>
    
        <hr class="dropdown-divider">

        <div class="container navbar-item" v-for="item in $store.state.cart" :key="item.id">
            <img :src="'/uploads/preview/' + item.preview" height="100px">
            <div class="field is-grouped is-grouped-multiline" style="padding-left: 5px">
              <div class="control">
                <div class="tags has-addons">
                  <span class="tag is-dark">Код</span>
                  <span class="tag is-info">{{ item.code }}</span>
                </div>
            </div>

            <div class="control">
                <div class="tags has-addons">
                  <span class="tag is-dark">Размер</span>
                  <span class="tag is-info">{{ item.size }}</span>
                </div>
            </div>
            <div class="control">
                <div class="tags has-addons">
                  <span class="tag is-dark">Цена за {{ item.quantity }}</span>
                  <span class="tag is-info">{{ item.totalPrice }}</span>
                </div>
            </div>
            <a class="tag is-delete is-danger" @click="removeFromCart(item)"></a>

            </div>
        </div>

        <hr class="dropdown-divider">

        <div class="container">
            <button class="button is-success" @click="makeOrder()">Сделать заказ</button>
        </div>

    </div>
</template>

<script>
export default {
    computed: {
        totalPrice() {
            let total = 0;  

            for (let item of this.$store.state.cart) {
                total += item.totalPrice;
            }
            return total.toFixed(2);
        }
    },

    methods: {

        removeFromCart(item) {

            axios.delete('/products/show/' + item.id + '/cart/' + item.pivot.id).then(response => { 
                this.$store.commit('removeFromCart', item);

                this.$notify({
                    group: 'cart',
                    text: 'Товар удален из корзины',
                    type: 'success'
                })
            })
        },

        makeOrder() {

            axios.post('/ajax/make-order').then(response => {

                this.$notify({
                    group: 'cart',
                    text: 'Спасибо, ожидайте письма на почте.',
                    type: 'success'
                })

            })
        }  
    },
}
</script>