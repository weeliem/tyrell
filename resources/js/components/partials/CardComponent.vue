<template>
    <div>
        <span class="card-suit card-suit-top">{{ card.suit }}</span>
        <span class="card-number">{{ card.rank }} </span>
        <span class="card-suit card-suit-bottom">{{ card.suit }}</span>
    </div>
</template>

<script>
    export default {
        props: {
            card: {}
        }
    }
</script>
