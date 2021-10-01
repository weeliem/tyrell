<template>
    <div>
        <div class="font-weight-bold mb-1">Player {{ index }}</div> <span v-if="cardObjects[index-1] == undefined">- nil</span>

        <div v-if="cardObjects[index-1] != undefined && cardObjects[index-1].length > 0" :class="{ 'card-container': cardMode }">
            <!-- Display poker card view if card mode checkbox checked -->
            <template v-if="cardMode">
                <div v-for="card in cardObjects[index-1]" :key="card.id" class="card" :class="suitColor[card.suit]">
                    <card-component :card="card"></card-component>
                </div>
            </template>

            <!-- Display poker card view if card mode checkbox unchecked -->
            <template v-if="!cardMode">
                <span v-for="card in cardObjects[index-1]" :key="card.id" class="text" :class="suitColor[card.suit]">
                    <text-component :card="card"></text-component>
                </span>
            </template>
        </div>
    </div>
</template>

<script>
    import CardComponent from './CardComponent';
    import TextComponent from './TextComponent';

    export default {
        props: {
            cardObjects: {},
            index: {},
            cardMode: {},
            suitColor: {}
        },
        components: { CardComponent,TextComponent }
    }
</script>
