<template>
    <div class="col-md-4 mt-4">
        <div class="card">
            <div class="card-body">
                <td>{{ name }}</td>
                <span
                    :class="{
                        down: price < previousPrice,
                        up: price > previousPrice,
                    }"
                >
                    {{ currency }} {{ price.toFixed(2) }}
                </span>
                <input type="number" name="amount" id="amount" class="form-control" placeholder="amount" v-model="amount">
                <button class="btn btn-primary" @click="$emit('buy', name, amount, price, currency)">Buy</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MotorcycleItem",
    props: {
        name: String,
        currency: String,
        price: Number,
        previousPrice: Number,
    }
}
</script>

<style scoped>
.up {
    color: green;
}
.down {
    color: red;
}
</style>