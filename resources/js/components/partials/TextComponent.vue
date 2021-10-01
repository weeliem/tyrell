<template>
    <span class="card-number">{{ card.suitChar }}-{{ card.rank }} </span> 
</template>

<script>
    export default {
        props: {
            card: {}
        }
    }
</script>
