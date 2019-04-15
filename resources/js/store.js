let store = {

    state: {
        cart: [],
        cartCount: 0,
    },

    mutations: {

        removeFromCart(state, item) {

            let index = state.cart.indexOf(item);

            if (index > -1) {
                
                state.cartCount -=  item.quantity;
                state.cart.splice(index, 1);
            }
        },

        reloadCart(state) {

            axios.post('/ajax/reload-cart').then(response => { 

                response.data.forEach(function(item, i, products) {

                    item.totalPrice = item.price * item.quantity
                }); 
                
                this.state.cart = response.data; 
            })
        },

        cartCount(state) {

            axios.post('/ajax/cart-count').then(response => { 

                this.state.cartCount = response.data
            })
        }
    },
};

export default store;