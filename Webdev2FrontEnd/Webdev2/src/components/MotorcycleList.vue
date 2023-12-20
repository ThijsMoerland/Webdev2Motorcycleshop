<template>
    <h1 class="pt-5">Motorcycles</h1>
    <div class="row">
        <MotorcycleItem v-for="motorcycle in motorcycles" :key="motorcycle.name" :name="motorcycle.name" :currency="motorcycle.currency" :price="motorcycle.price" :previousPrice="motorcycle.previousPrice" @buy="buyItem"></MotorcycleItem>
    </div>
</template>

<script>
import MotorcycleItem from './MotorcycleItem.vue';

export default {
    name: "MotorcycleList",
    components: {
        MotorcycleItem,
    },
    data() {
        return {
            motorcycles: [
                { name: "BMW", price: 61.05, previousPrice: 0, currency: "€" },
                { name: "Kawasaki", price: 146.49, previousPrice: 0, currency: "$" },
                { name: "Yamaha", price: 76.5, previousPrice: 0, currency: "$" },
                { name: "Suzuki", price: 4.583, previousPrice: 0, currency: "$" },
            ],
        };
    },
    methods: {
        buyItem(name, amount, price, currency) {
            if(amount > 0){
                alert(name+': '+amount+'     '+currency+amount*price.toFixed(2));//here
            }
        },
        updatePrices() {
            this.motorcycles.forEach((motorcycles) => {
                motorcycles.previousPrice = motorcycles.price;
                motorcycles.price += (Math.random() - 0.5) * 2;
                if (motorcycles.price < 0) {
                    motorcycles.price = 0;
                }
            });
        },
    },  
    mounted() {
        setInterval(() => {
            this.updatePrices();
        }, 2500);
    },
};
</script>

<style scoped>
</style>

