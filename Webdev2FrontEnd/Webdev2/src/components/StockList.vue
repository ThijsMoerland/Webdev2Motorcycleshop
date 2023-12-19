<template>
    <h1 class="pt-5">Stock list</h1>
    <div class="row">
        <stock-item v-for="stock in stocks" :key="stock.name" :name="stock.name" :currency="stock.currency" :price="stock.price" :previousPrice="stock.previousPrice"></stock-item>
    </div>
</template>

<script>
import StockItem from './StockItem.vue';

export default {
    name: "StockList",
    components: {
        StockItem,
    },
    data() {
        return {
            stocks: [
                { name: "BMW", price: 61.05, previousPrice: 0, currency: "€" },
                { name: "Kawasaki", price: 146.49, previousPrice: 0, currency: "$" },
                { name: "AMD", price: 76.5, previousPrice: 0, currency: "$" },
                { name: "Gazprom", price: 4.583, previousPrice: 0, currency: "$" },
            ],
        };
    },
    methods: {
        updatePrices() {
            this.stocks.forEach((stock) => {
                stock.previousPrice = stock.price;
                stock.price += (Math.random() - 0.5) * 2;
                if (stock.price < 0) {
                    stock.price = 0;
                }
            });
        },
    },  
    mounted() {
        setInterval(() => {
            this.updatePrices();
        }, 5000);
    },
};
</script>

<style scoped>
</style>

