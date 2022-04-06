<template>
    <div class="container">
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex align-items-baseline justify-content-around">
            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
            <div class="text-center">
                <button class="btn btn-outline-dark mt-auto" @click="addToCart" v-text="buttonText"></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userId' , 'productId' , 'inCart'],

        data: function () {
            return {
                status: this.inCart,
            };
        },

        methods: {
            addToCart() {
            // axios is a api calling library to access the server side code
            // post is a post method 
            // then inside the post write the route of the method u want to toggle
            // to pass a variable from the server side to the vue page it needs to be passed as a prop inside vue
            // in the props area call the item with camelCase but in the server page call it with kabab-case
            // then check the response
            // response is the return value of the route with a method that u called

            axios
                .post("/addtocart/" + this.productId)
                .then((response) => {
                    console.log(response.data);
                    // this updates the UI lively
                    // change the status of the object from false to true
                    this.status = !this.status;
                })
                .catch((errors) => {
                    if (errors.response.status == 401) {
                        window.location = "/login";
                    }
                });
            },
        },

        computed : {
            buttonText() {
                return this.status ? "Added to cart" : "Add to cart";
            },
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
