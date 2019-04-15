<template>
    <div>
        <div class="field">
            <div class="control">
                <div class="select is-success">
                    <select v-model="selected">
                        <option v-for="size in sizes" v-bind:value="size.value" v-bind:key="size.value">
                            {{ size.text }}
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <button v-if="this.auth" class="button is-success" @click="add">Добавить товар в корзину</button>
    </div>
</template>

<script>
    export default {
    
        props: ['product', 'sizes', 'auth'],
    
        data: function() {
    
            return {
    
                selected: '',
    
            }
    
        },
    
        methods: {
            
            add: function() {
    
                if(this.selected) {

                    axios.post(this.path).then(response => {
                        
                        this.$store.commit('reloadCart');

                        this.$store.state.cartCount++
                        
                        this.$notify({
                            group: 'cart',
                            text: 'Товар добавлен в корзину',
                            type: 'success',
                        });
                    })
                }
    
            }
    
        },
    
        computed: {

            path: function() {
                return '/products/show/' + this.product + '/cart/' + this.selected
            }
        }
    
    }
</script>

