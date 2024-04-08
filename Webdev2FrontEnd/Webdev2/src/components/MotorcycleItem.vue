<template>
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mt-4">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">{{ brand }} {{ type }}</h5>
                <p class="card-text mb-1">Construction date: {{ constructionYear }}</p>
                <p class="card-text mb-1">Power: {{ power }}KW</p>
                <p class="card-text mb-1">Mass: {{ mass }}KG</p>
                <p class="card-text mb-1">engine: {{ engine }}CC</p>
                <p class="card-text mb-1">With: {{ accessories }}</p>
                <img :src="imgUrl" alt="Motorcycle Image" class="img-fluid img-thumbnail rounded">
                <span
                    :class="{
                        down: price < previousPrice,
                        up: price > previousPrice,
                    }"
                >
                    &euro; {{ price }}
                </span>
                <button class="btn btn-primary" @click="$emit('buy', id)">Buy</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MotorcycleItem",
    props: {
        id: Number,
        brand: String,
        type: String,
        price: Number,
        constructionYear: Number,
        power: Number,
        mass: Number,
        engine: String,
        accessories: String,
        imgUrl: String,
        sold: Boolean
    },
    data() {
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